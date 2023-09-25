<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Withdraw;
use App\Traits\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PayoutController extends Controller
{
    use General;

    public function newWithdraw()
    {
        if (!Auth::user()->can('payout')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'New Withdraw Request';
        $data['navFinanceParentActiveClass'] = 'mm-active';
        $data['navFinanceShowClass'] = 'mm-show';
        $data['subNavFinanceNewWithdrawActiveClass'] = 'mm-active';
        $data['withdraws'] = Withdraw::pending()->orderBy('id', 'DESC')->paginate(20);
        return view('admin.payout.new-withdraw', $data);

    }

    public function completeWithdraw()
    {
        if (!Auth::user()->can('payout')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Complete Withdraw';
        $data['navFinanceParentActiveClass'] = 'mm-active';
        $data['navFinanceShowClass'] = 'mm-show';
        $data['subNavFinanceCompleteWithdrawActiveClass'] = 'mm-active';
        $data['withdraws'] = Withdraw::completed()->orderBy('id', 'DESC')->paginate(20);
        return view('admin.payout.complete-withdraw', $data);
    }

    public function rejectedWithdraw()
    {
        if (!Auth::user()->can('payout')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Rejected Withdraw';
        $data['navFinanceParentActiveClass'] = 'mm-active';
        $data['navFinanceShowClass'] = 'mm-show';
        $data['subNavFinancerejectedWithdrawActiveClass'] = 'mm-active';
        $data['withdraws'] = Withdraw::rejected()->orderBy('id', 'DESC')->paginate(20);
        return view('admin.payout.rejected-withdraw', $data);
    }

    public function changeWithdrawStatus(Request $request)
    {
        if ($request->status == WITHDRAWAL_STATUS_COMPLETE || $request->status == WITHDRAWAL_STATUS_REJECTED)
        {
            $withdraw = Withdraw::whereUuid($request->uuid)->first();
            if (!is_null($withdraw)){
                DB::beginTransaction();
                try {
                    if($request->status == WITHDRAWAL_STATUS_REJECTED){
                        $user = User::find($withdraw->user_id);
                        $user->increment('balance', decimal_to_int($withdraw->amount));
                        createTransaction($user->id,$withdraw->amount,TRANSACTION_WITHDRAWAL_CANCEL,'Withdrawal Cancel ');
                    }
                    $withdraw->status = $request->status;
                    $withdraw->note = $request->note;
                    $withdraw->save();
                    DB::commit();
                    $this->showToastrMessage('success', __('Status has been changed'));
                    return redirect()->back();
                }catch (\Exception $e){
                    DB::rollBack();
                    $this->showToastrMessage('warning', __('Something Went Wrong'));
                    return redirect()->back();
                }
            } else {
                abort(404);
            }

        } else {
            abort(404);
        }

    }
}
