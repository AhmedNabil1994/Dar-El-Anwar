<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ProfitController extends Controller
{
    //
    public function index(Request $request)
    {
        $branch = $request->branch_id;
        $date_to = $request->date_to;
        $date_from = $request->date_from;
        $data['income_transactions'] = Transaction::query()->orderBy('id','DESC')->where('transaction_type','income');
        $data['expense_transactions'] = Transaction::query()->orderBy('id','DESC')->where('transaction_type','expense');
        if($branch)
        {
            $data['income_transactions']->where('branch_id',$branch);
            $data['expense_transactions']->where('branch_id',$branch);
        }
        if($date_from || $date_to)
        {
            $data['income_transactions']->whereBetween('date',[$date_from,$date_to]);
            $data['expense_transactions']->whereBetween('date',[$date_from,$date_to]);
        }
        $data['income_transactions'] = $data['income_transactions']->paginate(25);
        $data['expense_transactions'] = $data['expense_transactions']->paginate(25);

        $data['incomes'] = Transaction::where('transaction_type','income')->sum('amount');
        $data['expenses'] = Transaction::where('transaction_type','expense')->sum('amount');
        $data['profit'] = $data['incomes'] + $data['expenses'];
        $data['book_sales'] = Transaction::where('transaction_type','income')
                            ->where('product_type','book')->sum('amount');
        $data['subscription_income'] = Transaction::where('transaction_type','income')
            ->where('product_type','subscription')->sum('amount');
        $data['canteen_purchases'] = Transaction::where('transaction_type','expense')
            ->where('product_type','canteen')->sum('amount');

        $data['branches'] = Branch::where('status',1)->get();
        return view('admin.balance.profit.index',$data);
    }

    public function income(Request $request)
    {
        $branch = $request->branch_id;
        $data['transactions'] = Transaction::where('transaction_type','income')->get();
        return view('admin.balance.profit.index',$data);
    }
}
