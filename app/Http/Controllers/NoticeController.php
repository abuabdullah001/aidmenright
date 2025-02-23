<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewnotice = Notice::all();
        return view('admin/pages/notice/indexnotice', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/pages/notice/addnotice');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $store=new Notice();
      $store->title=$request->title;
      $store->descriptino=$request->descriptino;
      $store->save();
      return redirect('Notice');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    // public function edit($notice)
    // {
    //   $editview=Notice::find($notice);
    //   // dd($editview);
    //   return view('admin/pages/notice/editnotice', get_defined_vars());
    // }

    public function edit($id)
    {
      $editview = Notice::where('id', $id)->first();
      return view('admin/pages/notice/editnotice',['editview'=> $editview]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */


    // public function update(Request $request)
    // {
    //   $update=Notice::find($request->id);
    // //   dd($update);
    // $update->title=$request->title;
    // $update->descriptino=$request->descriptino;
    // $update->save();

    // return redirect('Notice');
    // }


    public function update(Request $request)
      {
        // dd($request);
          $update = Notice::find($request->id);
          $update->title = $request->title;
          $update->descriptino = $request->descriptino;  // Corrected typo here
          $update->save();

          return redirect()->back()->with('message', 'Update Successfully');
      }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    // public function details($id) {
    //     $notice = Notice::all();
    //     return view('frontend.notice_details', compact('notice'));
    // }

    public function show($id) {
        $notice = Notice::all(); // Fetch a single notice by ID
        return view('frontend.pages.notice_show', compact('notice')); // Return the correct variable
    }
    
    public function details($id) {
        $notice = Notice::findOrFail($id); // Fetch a single notice by ID
        return view('frontend.notice_details', compact('notice')); // Return the correct variable
    }


    public function destroy($notice)
    {
        Notice::where('id',$notice)->delete();
        return back()->with('destroy','Notice Delete Succesfully');
    }
    public function status($id,$status)
    {
    //   dd($id,$status);
       $activation="";
       if($status == 0){
        $activation=1;
       }elseif($status == 1){
        $activation=0;
       }
     $statuschange=Notice::find($id);
     $statuschange->status= $activation;
     $statuschange->save();
     return back()->with('status','Status update Successfully');

    }
}
