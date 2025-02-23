<?php

namespace App\Http\Controllers;

use App\Models\Manual;
use Illuminate\Http\Request;
use App\Models\EventAmount;

class ManualController extends Controller
{
    public function create(){
        return view('frontend.pages.manual.create');
    }
    public function store(Request $request){

        $manual=new Manual;

        $manual->name=$request->name;
        $manual->phone=$request->phone;
        $manual->email=$request->email;
        $manual->address=$request->address;
        $manual->payment_method=$request->payment_method;
        $manual->amount=$request->amount;
        $manual->event_id=$request->event_name;
        if ($request->hasFile('payment_proof')) {
            $img_ext = $request->file('payment_proof')->getClientOriginalExtension();
            $filename = 'event-' . time() . '.' . $img_ext;
            $destinationPath = public_path('images/event');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $request->file('payment_proof')->move($destinationPath, $filename);
            $imagepath = 'images/event/' . $filename;
            $manual->payment_proof = $imagepath;
        }

        $manual->transaction_info=$request->transaction_info;
        $manual->event_type=$request->event_type;

        $manual->save();
        return redirect()->route('manual.create')->with('success','payment sucessgully done');
    }


    public function index(){
        $manuals=Manual::all();
        return view('admin.manual.index',compact('manuals'));
    }
    
    public function index2(Request $request){
        $manuals=Manual::all();
        return view('helpers3',compact('manuals'));
    }
    

    public function edit($id){
        $manuals=Manual::findOrFail($id);
        return view('admin.manual.edit',compact('manuals'));
    }

    public function update(Request $request, $id){
        $manuals=Manual::findOrFail($id);

        $manuals->name=$request->name;
        $manuals->email=$request->email;
        $manuals->address=$request->address;
        $manuals->phone=$request->phone;
        $manuals->payment_method=$request->payment_method;
        $manuals->amount=$manuals->amount;
        $manuals->event_type=$request->event_type;
        $manuals->transaction_info=$request->transaction_info;


        if ($request->hasFile('payment_proof')) {
            if ($manuals->payment_proof && file_exists(public_path($manuals->payment_proof))) {
                unlink(public_path($manuals->payment_proof));
            }
            $img_ext = $request->file('payment_proof')->getClientOriginalExtension();
            $filename = 'event-' . time() . '.' . $img_ext;
            $destinationPath = public_path('images/event');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $request->file('payment_proof')->move($destinationPath, $filename);
            $manuals->payment_proof = 'images/event/' . $filename;
        }

        $manuals->update();
        return redirect()->route('manual.index')->with('success', 'Manual payment updated successfully.');
    }
    public function delete($id){
        $delete=Manual::findOrFail($id);
        $delete->delete();
        return redirect()->route('manual.index')->with('success','Payable amount deleted');
    }
}
