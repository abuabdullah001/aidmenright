<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewcategory=Category::all();
        return view('admin/pages/categorys/indexcategory',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addcategory= new Category();
        $addcategory->type=$request->type;
        $addcategory->title=$request->title;
        $addcategory->order_by=$request->order_by;
        if ($request->hasFile('image')) {
            $img_ext = $request->file('image')->getClientOriginalExtension();
            $filename = 'event-' . time() . '.' . $img_ext;
            $path = $request->file('image')->move(public_path('images/event'), $filename);
            $imagepath = '/images/event/' . $filename;
            $addcategory->image = $imagepath;
        }
        $addcategory->save();
        return back();
    }
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->type = $request->type;
        $category->title = $request->title;
        $category->order_by = $request->order_by;

        if ($request->hasFile('image')) {
            if (!empty($category->image) && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }

            $img_ext = $request->file('image')->getClientOriginalExtension();
            $filename = 'event-' . time() . '.' . $img_ext;
            $request->file('image')->move(public_path('images/event'), $filename);
            $imagepath = '/images/event/' . $filename;
            $category->image = $imagepath;
        }

        $category->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($idget)
    {
    //    dd($idget);
    Category::find($idget)->delete();
    return back();
    }
}
