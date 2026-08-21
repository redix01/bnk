<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ATCCodeMail;
use App\Mail\OTPCodeMail;
use App\Mail\TRNCodeMail;
use App\Transactions;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class AdminWithdrawal extends Controller
{

    public function withdrawals()
    {
        $withdrawals = Transactions::all();
        return view('admin.withdrawals', compact('withdrawals'));
    }

    public function delete_tran($id)
    {
        $trans = Transactions::findOrFail($id);
        $trans->delete();
        return redirect()->back()->with('delete', "Transaction Deleted Successfully");
    }

    public function withdrawal_details($id)
    {
        $withdrawal = Transactions::findOrFail($id);
        return view('admin.withdrawal_details', compact('withdrawal'));
    }

    public function admin_atc(Request $request, $id)
    {

        $wit = Transactions::findOrFail($id);
        $user = User::findOrFail($wit->user_id);
        $wit->admin_atc_code = $request->get('admin_atc_code');
        $data = ['user' => $user, 'wit' => $wit];
        Mail::to($user->email)->send(new ATCCodeMail($data));
        $wit->save();
        return redirect()->back()->with('admin_atc_code', "ATC Code Sent Successfully");
    }
    public function admin_otp(Request $request, $id)
    {
        $otp = Transactions::findOrFail($id);
        $user = User::findOrFail($otp->user_id);
        $otp->admin_otp = $request->get('admin_otp');

        $data = ['user' => $user, 'otp' => $otp];
        Mail::to($user->email)->send(new OTPCodeMail($data));
        $otp->save();
        return redirect()->back()->with('admin_otp', "OTP Code Sent Successfully");
    }

    public function admin_trn(Request $request, $id)
    {
        $trn = Transactions::findOrFail($id);
        $user = User::findOrFail($trn->user_id);
        $trn->admin_trn = $request->get('admin_trn');

        $data = ['user' => $user, 'trn' => $trn];
        Mail::to($user->email)->send(new TRNCodeMail($data));
        $trn->save();
        return redirect()->back()->with('admin_trn', "TRN Code Sent Successfully");
    }

}
