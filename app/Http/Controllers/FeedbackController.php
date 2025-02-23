<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function create(){
        return view('admin.pages.feedback.create');
    }

    public function store(Request $request){
        // dd($request->all());
        $feedback= new Feedback;

        $feedback->name=$request->name;
        $feedback->designation=$request->designation;


        $imageName='';
        if($image=$request->file('image')){
            $imageName=time().'-'.uniqid().'-'.$image->getClientOriginalExtension();
            $image->move(public_path('images/post'),$imageName);
        }
        $feedback->image =$imageName;
        $feedback->description=$request->description;
        $feedback->save();

        return redirect()->route('feedback.index')->with('success','People feedback created successfully done');
    }

    public function index(){
        $feedbacks=Feedback::all();
        return view('admin.pages.feedback.index',compact('feedbacks'));
    }

    public function edit($id){
        $feedbacks=Feedback::findOrFail($id);
        return view('admin.pages.feedback.edit',compact('feedbacks'));
    }

    public function update(Request $request,$id){
        $feedbacks=Feedback::findOrFail($id);

        $feedbacks->name=$request->name;
        $feedbacks->designation=$request->designation;
        $imageName='';
        if($image=$request->file('image')){
            $imageName=time().'-'.uniqid().'-'.$image->getClientOriginalExtension();
            $image->move(public_path('images/post'),$imageName);
        }
        else{
            $imageName = $feedbacks->image;
        }

        $feedbacks->image =$imageName;
        $feedbacks->description=$request->description;
        $feedbacks->save();
        return redirect()->route('feedback.index')->with('success','Feedback updated successfully done');
    }


    public function delete($id){
        $var=Feedback::findOrFail($id);
        $var->delete();
        return redirect()->route('feedback.index')->with('success','Feedback successfully done');
    }

}
