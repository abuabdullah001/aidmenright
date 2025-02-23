<?php

namespace App\Http\Controllers;

use App\Models\ReportAdd;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class ReportAddController extends Controller
{
    public function create(){
        return view('admin.pages.reportadd.create');
    }
    public function index(){
        $repos=ReportAdd::all();
        Return view('admin.pages.reportadd.index',compact('repos'));
    }

    public function store(Request $request){
        $repo= new ReportAdd();

        $repo->name= $request->name;
        $repo->description=$request->description;

        if ($request->hasFile('image')) {
            $img_ext = $request->file('image')->getClientOriginalExtension();
            $filename = 'event-' . time() . '.' . $img_ext;
            $path = $request->file('image')->move(public_path('images/event'), $filename);
            $imagepath = '/images/event/' . $filename;
            $repo->image = $imagepath;
        }

        if ($request->hasFile('pdf')) {
            $img_ext = $request->file('pdf')->getClientOriginalExtension();
            $filename = 'event-' . time() . '.' . $img_ext;
            $path = $request->file('pdf')->move(public_path('images/event'), $filename);
            $imagepath = '/images/event/' . $filename;
            $repo->pdf = $imagepath;
        }

        $repo->save();
    }

    public function edit($id){
        $repo=ReportAdd::findOrFail($id);
        return view('admin.pages.reportadd.edit',compact('repo'));
    }

    public function update(Request $request,$id){
        $repo= ReportAdd::findOrFail($id);

        $repo->name=$request->name;
        $repo->description=$request->description;

        if ($request->hasFile('image')) {
            $oldImagePath = $repo->image;
            $img_ext = $request->file('image')->getClientOriginalExtension();
            $filename = 'event-' . time() . '.' . $img_ext;
            $path = $request->file('image')->move(public_path('images/event'), $filename);
            $imagepath = '/images/event/' . $filename;
            $repo->image = $imagepath;

            // Delete old image if it exists
            if ($oldImagePath) {
                $fullOldImagePath = public_path($oldImagePath);
                if (file_exists($fullOldImagePath)) {
                    unlink($fullOldImagePath);
                }
            }
        }


        if ($request->hasFile('pdf')) {
            $oldImagePath = $repo->pdf;
            $img_ext = $request->file('pdf')->getClientOriginalExtension();
            $filename = 'event-' . time() . '.' . $img_ext;
            $path = $request->file('pdf')->move(public_path('images/event'), $filename);
            $imagepath = '/images/event/' . $filename;
            $repo->pdf = $imagepath;

            // Delete old image if it exists
            if ($oldImagePath) {
                $fullOldImagePath = public_path($oldImagePath);
                if (file_exists($fullOldImagePath)) {
                    unlink($fullOldImagePath);
                }
            }
        }
        $repo->save();

        return redirect()->route('repo.index')->with('success','Report update successfully done');
    }

    public function delete($id){
        $repo=ReportAdd::findOrFail($id);
        $repo->delete();
        return redirect()->route('repo.index')->with('success','Report deleted successfully done');
    }

    public function view($id){
        $repo=ReportAdd::findOrFail($id);
        return view('admin.pages.reportadd.view',compact('repo'));
    }
}
