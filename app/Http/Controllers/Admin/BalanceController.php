<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\FinancialAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    public function openingBalanceForm()
    {
        //
        $data['openingBalances'] = Balance::query()->orderBy('id','DESC')->paginate(25);
        return view('admin.balance.balance_list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOpeningBalance()
    {
        //
        return view('admin.balance.opening_balance');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOpeningBalance(Request $request)
    {
        //
        $balance = Balance::where('date', $request->date)->first();

        if($balance){
            return redirect()->route('balances.createOpeningBalance')->with('error', 'there is opening balance with the same date.');
        }


        $request->validate([
            'date' => 'required|date',
            'opening_balance' => 'required|numeric|min:0',
        ]);

        // Create a new Balance record
        $balance = new Balance();
        $balance->date = $request->input('date');
        $balance->opening_balance = $request->input('opening_balance');
        // You may want to set the closing balance here based on your business logic.

        // Save the record to the database
        $balance->save();

        $data = [
            'trans_no'=>rand(0000,9999),
            'name' => "opening_balance",
            'date' => $request->date,
            'amount' => $request->opening_balance,
            'user_id' => Auth::user()->id,
            'transaction_type' => 'income',
            'last_amount' => 0,
        ];

        FinancialAccount::create($data);
        // Redirect back to the form with a success message
        return redirect()->route('balances.openingBalanceForm')->with('success', 'Opening balance has been saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function show(Balance $balance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function editOpeningBalance(Balance $balance)
    {
        //
        return view('admin.balance.edit_opening_balance',compact('balance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function updateOpeningBalance(Request $request, Balance $balance)
    {
        //




        $request->validate([
            'date' => 'required|date',
            'opening_balance' => 'required|numeric|min:0',
        ]);

        // Create a new Balance record
        $balance->date = $request->input('date');
        $balance->opening_balance = $request->input('opening_balance');
        // You may want to set the closing balance here based on your business logic.

        // Save the record to the database
        $balance->save();

        $data = [
            'trans_no'=>rand(0000,9999),
            'date' => $request->date,
            'amount' => $request->opening_balance,
            'user_id' => Auth::user()->id,
            'transaction_type' => 'income',
            'last_amount' => 0,
        ];

        FinancialAccount::create($data);

        // Redirect back to the form with a success message
        return redirect()->route('balances.openingBalanceForm')->with('success', 'Opening balance has been updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function deleteOpeningBalance(Balance $balance)
    {
        //
        $balance->delete();
        return redirect()->route('balances.openingBalanceForm')->with('success', 'Opening balance has been deleted successfully.');
    }
}
