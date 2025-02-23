<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function create(){
        $blogs=Blog::all();
        return view('frontend.pages.blogs.create',compact('blogs'));
    }

    public function store(Request $request){

        // dd($request->all());
        $blog=new Blog();

        $blog->name=$request->name;
        $blog->date = date('Y-m-d', strtotime($request->date));

        if ($request->hasFile('image')) {
            $img_ext = $request->file('image')->getClientOriginalExtension();
            $filename = 'odms-' . time() . '.' . $img_ext;
            $path = $request->file('image')->move(public_path('images/event'), $filename);
            $imagepath = '/images/event/' . $filename;
            $blog->image = $imagepath;
        }
        $blog->title=$request->title;
        $blog->description=$request->description;
        $blog->save();

        return redirect()->route('blog.index')->with('success', 'Blog added successfully!');
    }
    public function index(){
        $blogs=Blog::all();
        return view('admin.pages.blog.index',compact('blogs'));
    }

    public function edit($id){
        $blogs=Blog::findOrFail($id);
        return view('frontend.pages.blogs.edit',compact('blogs'));
    }

    public function update(Request $request, $id){
        $blogs=Blog::findOrFail($id);

        $blogs->name=$request->name;
        $blogs->date = date('Y-m-d', strtotime($request->date));

        $imageName='';
        if($image=$request->file('image')){
            $imageName=time().'-'.uniqid().'-'.$image->getClientOriginalExtension();
            $image->move(public_path('images/post'),$imageName);
        }else{
         $blogs->image=$imageName;
        }
        $blogs->image =$imageName;

        $blogs->title=$request->title;
        $blogs->description=$request->description;
        $blogs->save();

        return redirect()->route('blog.index')->with('success','Blog update successfully done');
    }


    public function delete($id){
        $var=Blog::findOrFail($id);
        $var->delete();

        return redirect()->back()->with('success','Blog deleted successfully');

    }
}
