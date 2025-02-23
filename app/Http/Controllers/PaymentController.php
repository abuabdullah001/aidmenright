<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Admin;
use App\Models\User;
use App\Models\Payment;
use App\Models\Incentive;
use App\Models\AccountHead;
use App\Models\memberCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public function pyament()
    {
        $userid = Auth()->user()->id;

        $paymentapply = DB::table('payments')->orWhere('member_id', $userid)->count();

        $payment = DB::table('users')
            ->join('member_categories', 'users.membercategory_id', '=', 'member_categories.id')
            ->where('users.id', $userid)
            ->select('users.reference', 'users.payment', 'users.membercategory_id', 'member_categories.*')
            ->first();

        $paymethod = AccountHead::where('status', 1)->get();

        return view('admin.pages.pyament', get_defined_vars());
    }

    public function list_payment()
    {

        $userid = auth()->user()->id;
        // dd($userid);
        $allPayments = DB::table('payments')
            ->where('member_id', $userid)
            ->get();


        return view('admin.pages.allpayment', get_defined_vars());
    }

    public function payment_store(Request $request)
    {
        $userid = auth()->user()->id;
        // $this->validate($request, [
        //     'date' => 'required',
        //     'type' => 'required',
        //     'payment_type' => 'required',
        //     'from_number' => 'required',
        //     'to_number' => 'required',
        //     'amount' => 'required',
        //     'trnxid' => 'required',
        // ]);

        $payment = new Payment();
        $payment->member_id = $userid;
        $payment->payment_method = $request->payment_method;
        $payment->amount = $request->amount;
        $payment->note = $request->note;
        $payment->tx_id = $request->tx_id;

        if ($request->hasfile('tx_image')) {
            $file = $request->file('tx_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $fileName);
            $payment->tx_image = $fileName;
        }
        $payment->save();
        return redirect()->back()->with('success', 'Your Transaction Successfully Complete !!');
    }


    function viewpayment($id)
    {
        // $getid = Payment::where('id', $id)->pluck('member_id')->first();
        // $userDetails = User::find($getid);

        // $paymentDetails = Payment::find($id);
        // return view('admin/pages/paymentdetails', get_defined_vars());
    }

    public function paymentRequest()
    {
        $payments = Payment::all();
        return view('admin.pages.paymentRequest', get_defined_vars());
    }

    public function status(Payment $payment)
    {
        // dd($payment);
        $payment->update(['status' => 'Approved']);
        return redirect()->back()->with('msg', 'Request Approved');
    }
}
