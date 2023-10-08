<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Department;
use App\Models\Product;
use App\Models\Stoke;
use App\Models\StoreTransaction;
use App\Models\Transaction;
use App\Models\Upload;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function indexMovement(Request $request)
    {
        $date_to = $request->dateTo;
        $date_from = $request->dateFrom;
        $data['products'] = Product::where('status',1)->get();
        $data['productMovements'] = StoreTransaction::query()->orderBy('id','DESC');
        if($date_to || $date_from)
        {
            $data['productMovements']->whereBetween('created_at',[$date_from,$date_to]);
        }

        if ($request->has('movement_type')) {
            $data['productMovements']->where('movement_type', $request->input('movement_type'));
        }

        if ($request->has('product_name')) {
            $data['productMovements']->where('product_id', 'like', '%' . $request->input('product_name') . '%');
        }

        $data['productMovements'] = $data['productMovements']->paginate(25);
        return view('admin.stores.sotre_transaction.index',$data);
    }

    public function deleteMovement(StoreTransaction $movement)
    {
        $movement->delete();
        return redirect()->back()->with('error','Movement Deleted Successfully!');
    }

    public function createMovement(StoreTransaction $movement)
    {
        $data['products'] = Product::where('status',1)->get();
        return view('admin.stores.sotre_transaction.create',$data);
    }

    public function storeMovement(Request $request)
    {
        // Validate the incoming request data
        $product = Product::find($request->input('product_id'));


        if($request->input('movement_type') == 'expense')
        {
            if($product->quantity < $request->input('quantity'))
            {
                return redirect()->back()->with('error','the quantity in store is '.$product->quantity);
            }

            $final_quantity = $product->quantity -  $request->input('quantity');
        }
        else
        {
            $final_quantity = $product->quantity + $request->input('quantity');
        }

        $product->update(['quantity' => $final_quantity]);

        // Create a new product movement record
        $movement = new StoreTransaction;
        $movement->permission_number = rand(0000,9999);
        $movement->movement_type = $request->input('movement_type');
        $movement->product_id = $request->input('product_id');
        $movement->quantity = $request->input('quantity');
        $movement->price = $product->price * $request->input('quantity');
        $movement->supplier = $request->input('supplier');
        $movement->receiver = $request->input('receiver');
        $movement->balance_after_movement = $product->quantity;
        $movement->current_balance = $product->quantity;
        $movement->notes = $request->input('notes');

        // Save the record to the database
        $movement->save();

        // Redirect back with a success message
        return redirect()->route('stores.movement.index')->with('success', 'تم تسجيل الحركة بنجاح.');
    }

    public function create(Request $request)
    {
        $data['departs'] = Department::where('status',1)->get();
        return view('admin.stores.create',$data);
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token','image']);
        $data['user_id'] = Auth::user()->id;
        $product = Product::create($data);
        if($request->hasFile('image'))
        {
            $upload = new Upload;
            $upload->file_original_name = null;
            $arr = explode('.', $request->file('image')->getClientOriginalName());

            for($i=0; $i < count($arr)-1; $i++){
                if($i == 0){
                    $upload->file_original_name .= $arr[$i];
                }
                else{
                    $upload->file_original_name .= ".".$arr[$i];
                }
            }

            $upload->file_name = $request->file('image')->store('uploads/products','public');

            $upload->user_id = $product->id;
            $upload->extension = $request->file('image')->getClientOriginalExtension();
            $upload->type = 'image';
            $upload->file_size = $request->file('image')->getSize();
            $upload->save();

            $product->update([
                'image' => $upload->id,
            ]);
        }


        return redirect()->route('stores.index');
    }

    public function indexProducts(Request $request)
    {
        $date_to = $request->dateTo;
        $date_from = $request->dateFrom;
        $data['products'] = Product::where('status',1)->get();
        $data['productReports'] = Product::query()->with('transactions')->orderBy('id','DESC');

        $data['products_filter'] = Product::where('status',1)->get();
        $data['departs'] = Department::where('status',1)->get();

        $data['productReports'] = $data['productReports']->paginate(25);
        return view('admin.stores.products.index',$data);
    }

    public function invoicePurchasedProduct(Request $request)
    {
        $data['products'] = Product::where('status',1)->get();
        return view('admin.stores.products.inovices.purchases',$data);
    }
    public function invoiceSalesProduct(Request $request)
    {
        $data['products'] = Product::where('status',1)->get();
        return view('admin.stores.products.inovices.sales',$data);
    }

    public function storeInvoicePurchasedProduct(Request $request)
    {

        // Create a new PurchaseInvoice instance and fill it with the form data

        $total = [];
        foreach($request['product_ids'] as $key => $product_id)
        {
            array_push($total,$request['quantity'][$key]*$request['price'][$key]);
            $stoke = Stoke::where('product_id',$product_id)
                ->where('store_id',$request['store_id'])->first();
            Stoke::create([
                'supplier' => $request['supplier_name'],
                'store_id' => $request['store_id'],
                'product_id' => $product_id,
                'price' => $request['price'][$key],
                'quantity' => $stoke?->quantity + $request['quantity'][$key],
                'total' => $request['quantity'][$key]*$request['price'][$key],
                'receiver' => $request['receiver'],
                'description' => $request['description'][$key],
                'branch_id' =>  Auth::user()->branch_id,
                'trans_type' => 'expense',
                'created_at' =>  $request['purchase_date'],
            ]);
        }
        $total = array_sum($total);

        $last_amount = Transaction::orderBy('id','DESC')->first()->last_amount;


        Transaction::create([
            'transaction_type' => 'expense',
            'trans_no' => rand(0000,9999),
            'branch_id' => Auth::user()->branch_id,
            'date' => Carbon::now(),
            'account' => $request['supplier_name'],
            'last_amount' => $last_amount,
            'amount' => -$total,
            'user_id' => Auth::user()->id,
            'description' => 'شراء منتجات',
            'name' => 'شراء منتجات',
            'created_at'=> $request['date'],
            'product_id' => json_encode($request['product_ids']),
            'model_id' => $request['store_id']
        ]);


        // Redirect to a success page or perform any other necessary actions
        return redirect()->back()->with('success', 'تم إنشاء فاتورة المشتريات بنجاح.');
    }
    public function storeInvoiceSalesProduct(Request $request)
    {

        // Create a new PurchaseInvoice instance and fill it with the form data
        $student = Student::where('code',$request->client_code)->first();

        $total = [];

        foreach($request['product_ids'] as $key => $product_id) {
            $stoke = Stoke::orderBy('id','DESC')->where('product_id',$product_id)
                ->where('store_id',$request['store_id'])->first();

            if ($stoke?->quantity < $request['quantity'][$key]) {
                return redirect()->back()->with('error', 'لم يتم إنشاء فاتورة مبيعات.');
            }
        }
        foreach($request['product_ids'] as $key => $product_id)
        {
            array_push($total,$request['quantity'][$key]*$request['price'][$key]);

                $stock = Stoke::create([
                    'supplier' => $request['supplier_name'],
                    'store_id' => $request['store_id'],
                    'product_id' => $product_id,
                    'price' => $request['price'][$key],
                    'quantity' => $stoke?->quantity  - $request['quantity'][$key],
                    'total' => $request['quantity'][$key]*$request['price'][$key],
                    'client_type' => $request->client_type,
                    'client_name' => $student->name ?? $request->client_name,
                    'client_code' => $student->code ?? $request->client_code,
                    'description' => $request['description'][$key],
                    'branch_id' =>  Auth::user()->branch_id,
                    'trans_type' => 'income',
                    'created_at' =>  $request['purchase_date'],
                ]);
        }

        $total = array_sum($total);

        $last_amount = Transaction::orderBy('id','DESC')->first()->last_amount;

        Transaction::create([
            'transaction_type' => 'income',
            'trans_no' => rand(0000,9999),
            'branch_id' => Auth::user()->branch_id,
            'date' => Carbon::now(),
            'account' => $student->name ?? $request->client_name,
            'last_amount' => $last_amount,
            'amount' => $total,
            'user_id' => Auth::user()->id,
            'description' => 'بيع منتجات',
            'name' => 'بيع منتجات',
            'created_at'=> $request['date'],
            'product_id' => json_encode($request['product_ids']),
            'model_id' => $request['store_id']
        ]);

        // Redirect to a success page or perform any other necessary actions
        return redirect()->back()->with('success', 'تم إنشاء فاتورة مبيعات بنجاح.');
    }


}
