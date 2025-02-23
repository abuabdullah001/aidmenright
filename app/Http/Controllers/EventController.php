<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventAmount;
use App\Models\Manual;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('oderby', 'asc')->get(); // Fixed 'oderby' to 'order_by'
        return view('admin.pages.event.index', get_defined_vars());
    }

    public function create()
    {
        return view('admin.pages.event.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "type" => "required",
            "order_by" => "required",
            "description" => "required",
            "name" => "required",
            "image" => "required",
            "donation_amount"=>"required"
        ]);

        $event = new Event(); // Instantiate Event model
        $event->type = $request->type;
        $event->oderby = $request->order_by; // Fixed spelling
        $event->name = $request->name;
        $event->slug = Str::slug($request->name, '-');

        if ($request->hasFile('image')) {
            $img_ext = $request->file('image')->getClientOriginalExtension();
            $filename = 'event-' . time() . '.' . $img_ext;
            $path = $request->file('image')->move(public_path('images/event'), $filename);
            $imagepath = '/images/event/' . $filename;
            $event->image = $imagepath;
        }
        $event->donation_amount=$request->donation_amount;
        $event->desc = $request->description;
        $event->meta = $request->meta;
        $event->save();

        return redirect('/all-event-list')->with('success', 'Data stored successfully');
    }

    public function updatePaymentStatus(Request $request)
{
    $donation = Manual::findOrFail($request->id); // Fetch donation record
    $donation->payment_status = $request->payment_status;
    if($request->payment_status == 'approved'){
        $event = new EventAmount();
        $event->event_id = $donation->event_id;
        $event->paid_amount = $event->paid_amount +  $donation->amount;
        $event->save();

    } // Update payment status
    $donation->save(); // Save changes

    return response()->json(['success' => true, 'message' => 'Payment status updated successfully.']);
}

    public function edit($id)
    {
        $event = Event::findOrFail($id); // Changed to Event
        return view('admin.pages.event.edit', get_defined_vars());
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "type" => "required",
            "order_by" => "required",
            "description" => "required",
            "name" => "required",
            "donation_amount"=>"required"
        ]);

        $event = Event::find($id); // Changed to Event

        $event->type = $request->type;
        $event->oderby = $request->order_by; // Fixed spelling
        $event->name = $request->name;
        $event->slug = Str::slug($request->name, '-');

        if ($request->hasFile('image')) {
            $oldImagePath = $event->image;
            $img_ext = $request->file('image')->getClientOriginalExtension();
            $filename = 'event-' . time() . '.' . $img_ext;
            $path = $request->file('image')->move(public_path('images/event'), $filename);
            $imagepath = '/images/event/' . $filename;
            $event->image = $imagepath;

            // Delete old image if it exists
            if ($oldImagePath) {
                $fullOldImagePath = public_path($oldImagePath);
                if (file_exists($fullOldImagePath)) {
                    unlink($fullOldImagePath);
                }
            }
        }
        $event->donation_amount=$request->donation_amount;
        $event->desc = $request->description;
        $event->meta = $request->meta;
        $event->save();

        return redirect('/all-event-list')->with('success', 'Data updated successfully');
    }

    public function destroy($id)
    {
        $event = Event::find($id); // Changed to Event
        $event->delete();
        $path = public_path($event->image);
        if (file_exists($path)) {
            @unlink($path);
        }
        return redirect()->back()->with('success', 'Data deleted successfully');
    }




}
