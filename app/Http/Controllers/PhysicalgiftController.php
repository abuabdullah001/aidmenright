<?php

namespace App\Http\Controllers;

use App\Models\Physicalgift;
use Illuminate\Http\Request;

class PhysicalgiftController extends Controller
{
    /**
     * Display a listing of the physical gifts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gifts = Physicalgift::all();
        return view('admin.pages.physicalgift.index', compact('gifts'));
    }

    /**
     * Show the form for creating a new physical gift.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.pages.physicalgift');
    }

    /**
     * Store a newly created physical gift in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate incoming request
        // $request->validate([
        //     'name' => 'nullable|string',
        //     'phone' => 'nullable|string',
        //     'address' => 'nullable|string',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'what_will_donate' => 'nullable|string',
        //     'how_he_will_donate' => 'nullable|string',
        //     'comment' => 'nullable|string',
        // ]);

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'image_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $imagePath = '/uploads/file/' . $imageName;
            $image->move(public_path('/uploads/file/'), $imageName);
        }

        $gift = new Physicalgift();
        $gift->name = $request->input('name');
        $gift->phone = $request->input('phone');
        $gift->address = $request->input('address');
        $gift->image = $imagePath;  // Save the image path
        $gift->what_will_donate = $request->input('what_will_donate');
        $gift->how_he_will_donate = $request->input('how_he_will_donate');
        $gift->comment = $request->input('comment');

        $gift->save();

        return redirect()->back()->with('message', 'Physical gift created successfully.');
    }

    /**
     * Display the specified physical gift.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gift = Physicalgift::findOrFail($id);
        return view('frontend.pages.show', compact('gift'));
    }

    /**
     * Show the form for editing the specified physical gift.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gift = Physicalgift::findOrFail($id);
        return view('physicalgifts.edit', compact('gift'));
    }

    /**
     * Update the specified physical gift in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate incoming request
        $request->validate([
            'name' => 'nullable|string',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'what_will_donate' => 'nullable|string',
            'how_he_will_donate' => 'nullable|string',
            'comment' => 'nullable|string',
        ]);

        $gift = Physicalgift::findOrFail($id);

        $imagePath = $gift->image;  // Keep existing image path if no new image is uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'image_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $imagePath = '/uploads/file/' . $imageName;
            $image->move(public_path('/uploads/file/'), $imageName);
        }

        // Update the physical gift object
        $gift->name = $request->input('name');
        $gift->phone = $request->input('phone');
        $gift->address = $request->input('address');
        $gift->image = $imagePath;  // Save the image path (updated or existing)
        $gift->what_will_donate = $request->input('what_will_donate');
        $gift->how_he_will_donate = $request->input('how_he_will_donate');
        $gift->comment = $request->input('comment');

        // Save the updated physical gift to the database
        $gift->save();

        return redirect()->route('physicalgifts.index')->with('success', 'Physical gift updated successfully.');
    }

    /**
     * Remove the specified physical gift from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gift = Physicalgift::findOrFail($id);
        $gift->delete();

        return redirect()->route('physicalgifts.index')->with('success', 'Physical gift deleted successfully.');
    }
}
