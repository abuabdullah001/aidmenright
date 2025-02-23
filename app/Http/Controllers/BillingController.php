<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    //
    public function update(Request $request,$id){

        $billing = Billing::find($id);

        $billing->paid_amount = $request->paid_amount;
        $billing->phone_number = $request->phone_number;
        $billing->transaction_id = $request->transaction_id;

        $billing->save();
        return back();


    }
}
