<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Doante;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DonateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donates = Doante::orderBy('created_at', 'desc')->get();
        return view('admin.pages.donate.index', get_defined_vars());
    }


    public function donate()
    {
        return view('frontend.pages.donate.index');
    }

    public function donationconfrim(Request $request)
    {
    session()->forget('donation');

    session()->put('donation', $request->donation_amount);

    $donationAmount = session('donation');

    return view('frontend.pages.donate.create', compact('donationAmount'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check if the request contains a password field
        if ($request->has('password')) {
            // Create a new Donate instance
            $donate = new Doante();
            $donate->first_name = $request->first_name;
            $donate->last_name = $request->last_name;
            $donate->email = $request->email;
            $donate->contact_number = $request->number;
            $donate->sponsor_number = $request->sponsor_number;
            $donate->contribution_type = $request->contribution_type;
            $donate->type = 'unpaid';
            $donate->date = now();

            $user = new User;
            $user->email =  $donate->email;
            $user->country =  "BANGLADESH";
            $user->city =  "BANGLADESH";
            $user->name= $request->first_name;
            $user->password = Hash::make($request->password);
            $user->type = 100;
            $user->save();

            
            Billing::create([
                "user_id" => $user->id,
                "amount" => $request->sponsor_number,
                "status" => "not_paid", // Enum: paid / not_paid / partial
                "paid_amount" => 0,
                "partial" => 0,
            ]);


            $donate->user_id = $user->id;

            $donate->save();
    
            // Set success notification
            $notification = [
                'message' => 'Your Donation Data Sent Successfully with Registration!!',
                'alert-type' => 'success'
            ];
        } else {
            // Create a new Donate instance without a password
            $donate = new Doante();
            $donate->first_name = $request->first_name;
            $donate->last_name = $request->last_name;
            $donate->email = $request->email;
            $donate->contact_number = $request->number;
            $donate->sponsor_number = $request->sponsor_number;
            $donate->contribution_type = $request->contribution_type;
            $donate->date = now();
            $donate->save();
    
            // Set success notification
            $notification = [
                'message' => 'Your Donation Data Sent Successfully without Registration!!',
                'alert-type' => 'success'
            ];
        }
    
        // Redirect back with the notification
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donates = Doante::find($id);
        return view('admin.pages.donate.edit', get_defined_vars());
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find the donation
        $donate = Doante::find($id);
    
        // Loop through the submitted statuses and update each billing record
        foreach ($request->status as $billingId => $status) {
            // Find the individual billing record by its ID
            $billing = $donate->billing()->find($billingId);
    
            // If the billing record exists, update its status
            if ($billing) {
                $billing->status = $status;
                $billing->save();
            }
        }
    
        // Redirect back with a success message
        return back()->with('success', 'Updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Doante::findOrFail($id);
        $data->delete();
        return redirect('/all-donate-list')->with('success', 'Delete successfully');
    }
}
