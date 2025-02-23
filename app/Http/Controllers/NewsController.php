<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('oderby', 'asc')->get(); // Fixed 'oderby' to 'order_by'
        return view('admin.pages.news.index', get_defined_vars());
    }

    public function create()
    {
        return view('admin.pages.news.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "order_by" => "required",
            "description" => "required",
            "name" => "required",
            "image" => "required",
        ]);

        $news = new News(); // Instantiate news model
        $news->oderby = $request->order_by; // Fixed spelling
        $news->name = $request->name;
        $news->slug = Str::slug($request->name, '-');

        if ($request->hasFile('image')) {
            $img_ext = $request->file('image')->getClientOriginalExtension();
            $filename = 'news-' . time() . '.' . $img_ext;
            $path = $request->file('image')->move(public_path('images/news'), $filename);
            $imagepath = '/images/news/' . $filename;
            $news->image = $imagepath;
        }

        $news->desc = $request->description;
        $news->meta = $request->meta;
        $news->save();

        return redirect('/all-news-list')->with('success', 'Data stored successfully');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id); // Changed to news
        return view('admin.pages.news.edit', get_defined_vars());
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "order_by" => "required",
            "description" => "required",
            "name" => "required",
        ]);

        $news = News::find($id); // Changed to news

        $news->oderby = $request->order_by; // Fixed spelling
        $news->name = $request->name;
        $news->slug = Str::slug($request->name, '-');

        if ($request->hasFile('image')) {
            $oldImagePath = $news->image;
            $img_ext = $request->file('image')->getClientOriginalExtension();
            $filename = 'news-' . time() . '.' . $img_ext;
            $path = $request->file('image')->move(public_path('images/news'), $filename);
            $imagepath = '/images/news/' . $filename;
            $news->image = $imagepath;

            // Delete old image if it exists
            if ($oldImagePath) {
                $fullOldImagePath = public_path($oldImagePath);
                if (file_exists($fullOldImagePath)) {
                    unlink($fullOldImagePath);
                }
            }
        }

        $news->desc = $request->description;
        $news->meta = $request->meta;
        $news->save();

        return redirect('/all-news-list')->with('success', 'Data updated successfully');
    }

    public function destroy($id)
    {
        $news = News::find($id); // Changed to news
        $news->delete();
        $path = public_path($news->image);
        if (file_exists($path)) {
            @unlink($path);
        }
        return redirect()->back()->with('success', 'Data deleted successfully');
    }
}
