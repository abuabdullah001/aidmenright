<?php

namespace App\Http\Controllers;

use App\Models\Support; // Import the Support model
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index()
    {
        $supports = Support::all();

        return view('admin.pages.support.index', compact('supports'));
    }

    public function create()
    {
        return view('frontend.pages.support-us');
    }

    public function store(Request $request)
    {


        $support = new Support();

        // Assign the request data to the model
        $support->name = $request->input('name');
        $support->phone = $request->input('phone');
        $support->email = $request->input('email');
        $support->phone = $request->input('support_number');
        $support->support_type = $request->input('support_type');
        $support->support_reason = $request->input('support_reason');

        $support->save();

        return redirect()->back()->with('message', 'Support request created successfully!');
    }

    // 4. Display the specified support record
    public function show($id)
    {
        // Find the support record by ID
        $support = Support::findOrFail($id);

        // Return the view and pass the support data to it
        return view('frontend.support.show', compact('support'));
    }

    // 5. Show the form for editing the specified support record
    public function edit($id)
    {
        // Find the support record by ID
        $support = Support::findOrFail($id);

        // Return the view and pass the support data to it
        return view('frontend.support.edit', compact('support'));
    }

    // 6. Update the specified support record in the database
    public function update(Request $request, $id)
    {

        // Find the support record by ID
        $support = Support::findOrFail($id);

        // Update the record with the new data
        $support->name = $request->input('name');
        $support->phone = $request->input('phone');
        $support->email = $request->input('email');
        $support->phone = $request->input('support_number');
        $support->support_type = $request->input('support_type');
        $support->support_reason = $request->input('support_reason');

        // Save the updated record
        $support->save();

        return redirect()->back()->with('message', 'Support updated successfully!');
    }

    // 7. Remove the specified support record from the database
    public function destroy($id)
    {
        // Find the support record by ID
        $support = Support::findOrFail($id);

        // Delete the record
        $support->delete();

        // Redirect with a success message
        return redirect()->route('support.index')->with('message', 'Support deleted successfully!');
    }
}
