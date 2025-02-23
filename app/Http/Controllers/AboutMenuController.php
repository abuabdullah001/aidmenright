<?php

namespace App\Http\Controllers;

use App\Models\AboutMenu;
use App\Models\Category;
use App\Models\MannagementMember;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AboutMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fontview($id)
    {
        $pagename = $id;
        $viewpageedit = DB::table('about_menus')->where('menu', $id)->orderBy('orderNo', 'asc')->get();
        //    dd($viewpageedit);
        return view('frontend/pages/adoutpage/aboutindex', get_defined_vars());
    }


    public function management()
    {
        $mannagements = MannagementMember::orderby('id','desc')->get();

        return view('admin.pages.mannagement_member', compact('mannagements'));
    }
    public function editmanagement($id)
    {
        $mannagements = MannagementMember::find($id);

        return view('admin.pages.mannagement_member_edit',compact('mannagements'));
    }
    public function storemannagement(Request $request)
    {

        $member = MannagementMember::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'designation' => $request->input('designation'),
            'image' => imageUpload($request, 'image'), // Assuming this function handles the upload
            'address' => $request->input('address'),
            'dob' => $request->input('dob'),
            'blood_group' => $request->input('blood_group'),
        ]);
        return view('admin.pages.helpera');
    }

    public function destroymanangemnt($id)
    {
        $mannagements = MannagementMember::find($id);

        $mannagements->delete();

        return redirect()->back();
    }

    public function manangemntupdate(Request $request, $id)
    {

        $record = MannagementMember::findOrFail($id);

        $record->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'image' => imageUpload($request, 'image'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'designation' => $request->input('designation'),
            'dob' => $request->input('dob'),
            'blood_group' => $request->input('blood_group'),
        ]);

        // Redirect or return a response
        return redirect()->route('MannagementMember.all')->with('success', 'Record updated successfully.');
    }


    public function index()
    {
        $viewpage = DB::table('categories')
            ->join('about_menus', 'about_menus.menu', '=', 'categories.id')
            ->where('type', 'about')
            
            ->get();
        // dd($viewpage);
        return view('admin/pages/aboutmenu/indexabout', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Category = DB::table('categories')->where('type', 'about')->get();
        // dd($Category);
        return view('admin/pages/aboutmenu/addabout', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {


        $aboutMenu = new AboutMenu();
        $aboutMenu->menu = $request->menu_id;
        $aboutMenu->title = $request->title;
        $aboutMenu->content = $request->aboutecontent;

        $imagepath = '' ;
        if ($request->hasFile('image')) {
            $img_ext = $request->file('image')->getClientOriginalExtension();
            $filename = 'event-' . time() . '.' . $img_ext;
            $path = $request->file('image')->move(public_path('images/event'), $filename);
            $imagepath = '/images/event/' . $filename;
        }
        $aboutMenu->image = $imagepath;

        $aboutMenu->orderNo = $request->order_no;
        $aboutMenu->save();
        return redirect('All-Content');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutMenu  $aboutMenu
     * @return \Illuminate\Http\Response
     */
    public function show(AboutMenu $aboutMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutMenu  $aboutMenu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);

        $menupage = DB::table('categories')->where('type', 'About')->get();
        $editpagemenu = AboutMenu::find($id);

        // dd($editpage);
        return view('admin/pages/aboutmenu/editabout', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutMenu  $aboutMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)

    {
        $updateaboute = AboutMenu::find($request->id);
        $updateaboute->menu = $request->editmenu_id;
        $updateaboute->content = $request->aboutedit;
        $updateaboute->title = $request->title;

        if ($request->hasFile('image')) {
            $oldImagePath = $updateaboute->image;
            $img_ext = $request->file('image')->getClientOriginalExtension();
            $filename = 'event-' . time() . '.' . $img_ext;
            $path = $request->file('image')->move(public_path('images/event'), $filename);
            $imagepath = '/images/event/' . $filename;
            $updateaboute->image = $imagepath;

            // Delete old image if it exists
            if ($oldImagePath) {
                $fullOldImagePath = public_path($oldImagePath);
                if (file_exists($fullOldImagePath)) {
                    unlink($fullOldImagePath);
                }
            }
        }
        $updateaboute->orderNo = $request->order_no;
        $updateaboute->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutMenu  $aboutMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AboutMenu::where('id', $id)->delete();
        return back();
    }

}
