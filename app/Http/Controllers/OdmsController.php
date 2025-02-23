<?php

namespace App\Http\Controllers;

use App\Models\Odms;
use Illuminate\Http\Request;

class OdmsController extends Controller
{
    public function index(){

        $odmss=Odms::all();

        return view('frontend.pages.odms.index',compact('odmss'));
    }

    public function create(){
        return view('frontend.pages.odms.create');
    }

    public function store(Request $request){

       $odms= new Odms;

       if ($request->hasFile('image')) {
        $img_ext = $request->file('image')->getClientOriginalExtension();
        $filename = 'event-' . time() . '.' . $img_ext;
        $path = $request->file('image')->move(public_path('images/event'), $filename);
        $imagepath = '/images/event/' . $filename;
        $odms->image = $imagepath;
    }
       $odms->title = $request->title;
       $odms->descrition=$request->descrition;
       $odms->save();
       return redirect()->route('odms.index')->with('success', 'ODMS created successfully!');
    }

    public function edit($id){
        $odmss=Odms::findOrFail($id);
        return view('frontend.pages.odms.edit',compact('odmss'));
    }

    public function update(Request $request, $id)
    {
        $odmss = Odms::findOrFail($id);

        if ($request->hasFile('image')) {
            $oldImagePath = $odmss->image;
            $img_ext = $request->file('image')->getClientOriginalExtension();
            $filename = 'event-' . time() . '.' . $img_ext;
            $path = $request->file('image')->move(public_path('images/event'), $filename);
            $imagepath = '/images/event/' . $filename;
            $odmss->image = $imagepath;

            // Delete old image if it exists
            if ($oldImagePath) {
                $fullOldImagePath = public_path($oldImagePath);
                if (file_exists($fullOldImagePath)) {
                    unlink($fullOldImagePath);
                }
            }
        }
        $odmss->title = $request->input('title');
        $odmss->descrition = $request->input('descrition');
        $odmss->update();
        return redirect()->route('odms.index')->with('success', 'ODMS updated successfully!');
    }


    public function delete($id){
      $odmss=Odms::find($id);
      $odmss->delete();

      return redirect()->back()->with('success', 'ODMS created successfully!');
    }

    public Function show(){
        $odms=Odms::first();
        return view('frontend.pages.odms.show',compact('odms'));
    }

}
