<?php

namespace App\Http\Controllers;

use App\Models\champaign;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ChampaignController extends Controller
{
    public function index()
    {
        $champaigns = champaign::orderBy('oderby', 'asc')->get(); // Fixed 'oderby' to 'order_by'
        return view('admin.pages.champaign.index', get_defined_vars());
    }

    public function create()
    {
        return view('admin.pages.champaign.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "type" => "required",
            "order_by" => "required",
            "description" => "required",
            "name" => "required",
            "image" => "required",
        ]);

        $champaign = new champaign(); // Instantiate champaign model
        $champaign->type = $request->type;
        $champaign->oderby = $request->order_by; // Fixed spelling
        $champaign->name = $request->name;
        $champaign->slug = Str::slug($request->name, '-');

        if ($request->hasFile('image')) {
            $img_ext = $request->file('image')->getClientOriginalExtension();
            $filename = 'champaign-' . time() . '.' . $img_ext;
            $path = $request->file('image')->move(public_path('images/champaign'), $filename);
            $imagepath = '/images/champaign/' . $filename;
            $champaign->image = $imagepath;
        }

        $champaign->desc = $request->description;
        $champaign->meta = $request->meta;
        $champaign->save();

        return redirect('/all-champaign-list')->with('success', 'Data stored successfully');
    }

    public function edit($id)
    {
        $champaign = champaign::findOrFail($id); // Changed to champaign
        return view('admin.pages.champaign.edit', get_defined_vars());
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "type" => "required",
            "order_by" => "required",
            "description" => "required",
            "name" => "required",
        ]);

        $champaign = champaign::find($id); // Changed to champaign

        $champaign->type = $request->type;
        $champaign->oderby = $request->order_by; // Fixed spelling
        $champaign->name = $request->name;
        $champaign->slug = Str::slug($request->name, '-');

        if ($request->hasFile('image')) {
            $oldImagePath = $champaign->image;
            $img_ext = $request->file('image')->getClientOriginalExtension();
            $filename = 'champaign-' . time() . '.' . $img_ext;
            $path = $request->file('image')->move(public_path('images/champaign'), $filename);
            $imagepath = '/images/champaign/' . $filename;
            $champaign->image = $imagepath;

            // Delete old image if it exists
            if ($oldImagePath) {
                $fullOldImagePath = public_path($oldImagePath);
                if (file_exists($fullOldImagePath)) {
                    unlink($fullOldImagePath);
                }
            }
        }

        $champaign->desc = $request->description;
        $champaign->meta = $request->meta;
        $champaign->save();

        return redirect('/all-champaign-list')->with('success', 'Data updated successfully');
    }

    public function destroy($id)
    {
        $champaign = champaign::find($id); // Changed to champaign
        $champaign->delete();
        $path = public_path($champaign->image);
        if (file_exists($path)) {
            @unlink($path);
        }
        return redirect()->back()->with('success', 'Data deleted successfully');
    }
}
