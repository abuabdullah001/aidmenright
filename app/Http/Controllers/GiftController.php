<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    public function index()
    {
        $gifts = Gift::all();
        return view('admin.pages.gift.index', compact('gifts'));
    }

    public function create()
    {
        return view('admin.pages.gift.create');
    }

    public function store(Request $request)
    {


        $gift = new Gift();
        $gift->name = $request->name;
        $gift->price = $request->price;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = 'gift_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = '/uploads/file/' . $fileName;
            $file->move(public_path('/uploads/file/'), $fileName);
            $gift->image = $filePath; // Save the file path to the database
        }

        $gift->quanity = $request->quanity;
        $gift->save();

        return redirect()->route('gifts.index')->with('success', 'Gift created successfully.');
    }

    public function show(Gift $gift)
    {
        return view('admin.pages.gift.show', compact('gift'));
    }

    public function edit(Gift $gift)
    {
        return view('admin.pages.gift.edit', compact('gift'));
    }

    public function update(Request $request, Gift $gift)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gift->name = $request->name;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = 'gift_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = '/uploads/file/' . $fileName;
            $file->move(public_path('/uploads/file/'), $fileName);
            $gift->image = $filePath; // Save the file path to the database
        }

        $gift->quanity = $request->quanity;
        $gift->price = $request->price;
        $gift->save();

        return redirect()->route('gifts.index')->with('success', 'Gift updated successfully.');
    }

    public function destroy(Gift $gift)
    {
        $gift->delete();
        return redirect()->route('gifts.index')->with('success', 'Gift deleted successfully.');
    }
}
