<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\FinancialAccount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinancialAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function treasury(Request $request)
    {
        //
        $data['transactions'] = FinancialAccount::query()->orderBy('id','DESC');
        $data['totalCredit'] =  FinancialAccount::where('transaction_type', 'income')->sum('amount');
        $data['totalDebit'] = FinancialAccount::where('transaction_type', 'expense')->sum('amount');
        $data['closingBalance'] = FinancialAccount::where('date', Carbon::today()->format('Y-m-d'))
                                ->orderBy('id','DESC')->first()?->last_amount;
        $data['openingBalance'] = Balance::where('date',Carbon::today()->format('Y-m-d'))
                                ->first()?->opening_balance;

        $transactions = FinancialAccount::orderBy('date','DESC')->get();
        $data['totalBalanceSoFar'] = 0;

        foreach ($transactions as $transaction) {
            if ($transaction->transaction_type === 'income') {
                $data['totalBalanceSoFar'] += $transaction->amount;
            } elseif ($transaction->transaction_type === 'expense') {
                $data['totalBalanceSoFar'] -= $transaction->amount;
            }
        }
        if($request->fiterByType){
            $data['transactions']->where('transaction_type',$request->fiterByType);
        }
        $data['transactions'] = $data['transactions']->paginate(25);
        return view('admin.finance_accounts.treasury',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createIncomeTransaction()
    {
        //
        return view('admin.finance_accounts.create_income_transaction');
    }

    public function createExpenseTransaction()
    {
        //
        return view('admin.finance_accounts.create_expense_transaction');
    }

    public function storeTransaction(Request $request)
    {
        //
        $last_amount = FinancialAccount::query()
                        ->where('date',Carbon::today()->format('Y-m-d'))
                        ->orderBy('id','DESC')->first()?->amount;
       if($request->transaction_type == 'income')
           $last_amount = $last_amount + $request->amount;
       else
           $last_amount = $last_amount - $request->amount;
        $data = [
            'trans_no'=>rand(0000,9999),
            'date' => $request->date ?? Carbon::now()->format('Y-m-d'),
            'name' => $request->name,
            'amount' => $request->amount,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'transaction_type' => $request->transaction_type,
            'last_amount' => $last_amount,
        ];

        FinancialAccount::create($data);

        return redirect()->route('accounts.treasury');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FinancialAccount  $financialAccount
     * @return \Illuminate\Http\Response
     */
    public function show(FinancialAccount $financialAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FinancialAccount  $financialAccount
     * @return \Illuminate\Http\Response
     */
    public function editIncomeTransaction(FinancialAccount $financialAccount)
    {
        //
        return view('admin.finance_accounts.edit_income_transaction',compact('financialAccount'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FinancialAccount  $financialAccount
     * @return \Illuminate\Http\Response
     */
    public function updateTransaction(Request $request, FinancialAccount $financialAccount)
    {
        //
        $last_amount = 0;
        if($financialAccount->transaction_type == 'income')
            $last_amount = $financialAccount->last_amount - $financialAccount->amount +  $request->amount;
        else
            $last_amount = $financialAccount->last_amount + $financialAccount->amount - $request->amount;
        $data = [
            'trans_no'=>rand(0000,9999),
            'date' => $request->date ?? Carbon::now()->format('Y-m-d'),
            'name' => $request->name,
            'amount' => $request->amount,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'last_amount' => $last_amount,
        ];

        $financialAccount->update($data);

        return redirect()->route('accounts.treasury');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FinancialAccount  $financialAccount
     * @return \Illuminate\Http\Response
     */
    public function deleteTransaction(FinancialAccount $financialAccount)
    {
        //
        $financialAccount->delete();
        return redirect()->route('accounts.treasury')->with('success', 'transaction has been deleted successfully.');

    }
}
