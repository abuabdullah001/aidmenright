<?php

namespace App\Http\Controllers;

use App\Models\FrontEnd;
use App\Models\Rules;
use App\Models\Job;
use App\Models\User;
use App\Models\Apply;
use App\Models\champaign;
use App\Models\Champain;
use App\Models\Event;
use App\Models\EventAmount;
use App\Models\JobCategory;
use App\Models\MediaCategory;
use App\Models\MemberShow;
use App\Models\News;
use App\Models\Notice;
use App\Models\Privacy;
use App\Models\Volunteer;
use App\Models\WebGallery;
use App\Models\webVideo;
use App\Models\Project;
use App\Models\Serve;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Gallery;
use App\Models\Blog;
use PhpParser\Node\Expr\FuncCall;

//namespace App\Http\Controllers\Auth;

class FrontEndController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function seekerlogin(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        $urlid = $request->post('urlid');
        if (Auth::attempt($credentials)) {
            return redirect('jobView/' . $urlid);
        } else {
            return redirect('jobView/' . $urlid);
        }
    }
    public function createPrivacyPolicy()
    {
        // Retrieve privacy policy if it exists
        $privacy = Privacy::where('type', 'privacy_policy')->get(); // Use first() instead of get() to get a single entry

        return view('admin.pages.policy.privacy-policy', compact('privacy'));
    }

    public function editPrivacyPolicy(Request $request, $id)
    {


        $privacy = Privacy::findOrFail($id);
        $privacy->desc = $request->input('description');
        $privacy->type = 'privacy_policy';
        $privacy->save();

        return redirect()->back()->with('success', 'Privacy policy updated successfully!');
    }
    public function editReturnPolicy(Request $request, $id)
    {

        $privacy = Privacy::findOrFail($id);
        $privacy->desc = $request->input('description');
        $privacy->type = 'return_policy';
        $privacy->save();

        return redirect()->back()->with('success', 'Return policy updated successfully!');
    }
    public function editTermsCondition(Request $request, $id)
    {
        $privacy = Privacy::findOrFail($id);
        $privacy->desc = $request->input('description');
        $privacy->type = 'terms_conditions';
        $privacy->save();

        return redirect()->back()->with('success', 'Terms and  Condtion updated successfully!');
    }

    // Create Return Policy
    public function createReturnPolicy()
    {
        $refund = Privacy::where('type', 'return_policy')->get(); // Use first() instead of get() to get a single entry
        return view('admin.pages.policy.refund-policy', compact('refund'));
    }

    // Create Terms & Condition
    public function createTermsCondition()
    {
        // Assuming there's a model for terms and conditions
        $terms = Privacy::where('type','terms_conditions')->get();

        return view('admin.pages.policy.terms-condtion', compact('terms'));
    }

    public function index()
    {
        $image = WebGallery::where('status', 1)->orderBy('id', 'desc')->take(4)->get();
        $video = webVideo::where('status', 1)->orderBy('id', 'desc')->take(10)->get();
        // dd($video);
        $notice = Notice::all();
        $slidersImages = DB::table('sliders')
            ->select('*')
            ->where('status', 1)->where('type', 1)
            ->get();
        //         dd($slidersImages);
        return view('frontend.pages.home', get_defined_vars());
    }

    public function principle()
    {
        return view('frontend.pages.principles', get_defined_vars());
    }

    public function constitution()
    {
        return view('frontend.pages.constitution', get_defined_vars());
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $events = Event::where('name', 'LIKE', "%{$query}%")->get();
        $projects = Project::where('name', 'LIKE', "%{$query}%")->get();
        $champagnes = champaign::where('name', 'LIKE', "%{$query}%")->get();
        $news = News::where('name', 'LIKE', "%{$query}%")->get();
        return view('frontend.pages.search', get_defined_vars());
    }

    public function contact()
    {
        return view('frontend.pages.contact', get_defined_vars());
    }

    public function store(Request $request)
    {
        // Validate the request data
        sendEmail($request->email,$request->message,$request->name,$request->phone);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
    //saiful code
    public function memberList()
    {
        // $userDetails
        //     = DB::table('member_show')
        //     ->join('users', 'users.id', '=', 'member_show.member_id')
        //     ->join('payments', 'payments.member_id', '=', 'member_show.member_id')
        //     // ->join('member_categories', 'member_categories.id', '=', 'users.membercategory_id')
        //     ->get(
        //         [
        //             'member_show.*',
        //             'users.id_number',
        //             'users.name',
        //             'users.email',
        //             'users.phone',
        //             'users.blood',
        //             'users.reference',
        //             'users.payment',
        //             // 'users.membercategory_id',
        //             // 'member_categories.title',
        //         ]
        //     );

        $userDetails = MemberShow::all();

        // dd($userDetails);

        return view('frontend.pages.memberList', get_defined_vars());
    }

    public function gallery()
    {

        $galleriImages = DB::table('web_galleries')
            ->join('categories', 'categories.id', '=', 'web_galleries.category')
            ->where('type', 'Gallery')
            ->get();
        // dd( $galleriImages);
        return view('frontend.pages.gallery', get_defined_vars());
    }

    public function OurRules()
    {
        $rulesdetails = DB::table('rules')->first();
        return view('frontend.pages.OurRules', get_defined_vars());
    }

    public function alljob($id)
    {
        $allJobs = DB::table('jobs')
            ->select('jobs.*', 'users.image', 'users.url', 'users.address')
            ->join('users', 'users.id', '=', 'jobs.user_id')
            ->where('jobs.status', 1)
            ->where('jobs.job_type', $id)
            ->get();

        $categorys = JobCategory::where('type', 'job')->get();
        return view('frontend.pages.job', get_defined_vars());
    }
    public function viewcategory()
    {

        $categories = JobCategory::where('type', 'job')->get();

        $length = ceil($categories->count() / 3);
        $chunked = $categories->chunk($length);
        // dd(get_defined_vars());

        // $categories


        return view('frontend.pages.jobcategory', get_defined_vars());
    }

    public function sponsor_child()
    {
        return view('frontend.pages.sponsor-child', get_defined_vars());
    }

    public function sponserlist(){
        return view('admin.pages.sponsar.index');
    }
    public function paid_list(){
        return view('admin.pages.sponsar.paid-list');
    }
    public function deu_list(){
        return view('admin.pages.sponsar.deu-list');
    }

    public function jobView(Request $request, $id)
    {
        if (Auth::check()) {
            $userid = auth()->user()->id;
        } else {
            $userid = 0;
        }
        $JobDetails = DB::table('jobs')
            ->select('jobs.*', 'users.image', 'users.url', 'users.address', 'users.name as comName', 'users.id as comId')
            ->join('users', 'users.id', '=', 'jobs.user_id')
            ->where('jobs.id', $id)
            ->first();

        $applicationinfo = Apply::where([
            'user_id' => $userid,
            'job_id' => $id,
        ])->first();
        // dd($id);
        $urlid = $id;
        return view('frontend.pages.jobView', get_defined_vars());
    }

    public function showproject($slug)
    {

        $project = Project::where('slug', $slug)->first();

        $projects = Project::where('type', 'current')
            ->where('id', '!=', $project->id)
            ->get();
        return view('frontend.pages.project_view', get_defined_vars());
    }

    public function shownews($slug)
    {
        $project = News::where('slug', $slug)->first();

        return view('frontend.pages.news-view', get_defined_vars());
        //
    }

    public function show(FrontEnd $frontEnd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FrontEnd  $frontEnd
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontEnd $frontEnd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FrontEnd  $frontEnd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrontEnd $frontEnd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FrontEnd  $frontEnd
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontEnd $frontEnd)
    {
        //
    }
    public function blood_view()
    {
        return view('frontend.pages.blood');
    }

    public function sponsor()
    {
        return view('frontend.pages.sponsor');
    }
    public function volunteer()
    {
        $volunteer = Volunteer::all();
        return view('frontend.pages.volunteer', get_defined_vars());
    }
    public function waiting()
    {
        return view('frontend.pages.waiting');
    }

    public function donateForm()
    {
        return view('frontend.pages.donate-form');
    }

    public function vision()
    {
        return view('frontend.pages.vision');
    }

    public function executiveCouncil()
    {
        return view('frontend.pages.executive-council');
    }

    // public function program()
    // {
    //     return view('frontend.pages.program');
    // }
    public function project()
    {
        $projects = Project::where('type', 'current')->get();
        return view('frontend.pages.project', get_defined_vars());
    }

    public function showProgram()
    {
        return view('frontend.pages.program');
    }

    public function news()
    {

        $news = News::orderBy('oderby', 'asc')->get(); // Fixed 'oderby' to 'order_by'
        return view('frontend.pages.news', get_defined_vars());
    }


    public function Event()
    {

        $projects = Event::where('type', 'current')->get();
        return view('frontend.pages.event', get_defined_vars());
    }

    public function showProgramEvent()
    {
        return view('frontend.pages.program');
    }

    public function newsEvent()
    {
        return view('frontend.pages.news');
    }
    public function showprojectevent($slug)
    {
        $project = Event::where('slug', $slug)->first();
        $projects = Event::where('type', 'current')
            ->where('id', '!=', $project->id)
            ->get();
        return view('frontend.pages.event_view', get_defined_vars());
    }
    public function champaign()
    {

        $projects = champaign::where('type', 'current')->get();
        return view('frontend.pages.champaign', get_defined_vars());
    }

    public function showchampaignprogram()
    {
        return view('frontend.pages.program');
    }

    public function newschampaign()
    {
        return view('frontend.pages.news');
    }
    public function showProgramchampaign($slug)
    {
        $project = champaign::where('slug', $slug)->first();

        $projects = champaign::where('type', 'current')
            ->where('id', '!=', $project->id)
            ->get();
        return view('frontend.pages.champaign_view', get_defined_vars());
    }


    public function serve_create(){
        return view('admin.pages.serve.create');
       }

       public function serve_index(){
        $serves=Serve::all();
        return view('admin.pages.serve.index',compact('serves'));
       }

       public function serve_store( Request $request){
        $serve=New Serve();
        $imageName = '';
        if ($image = $request->file('image')) {
            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imagePath = '/images/' . $imageName;
        }

        $serve->title=$request->title;
        $serve->description=$request->description;
        $serve->order_by=$request->order_by;
        $serve->image=$imagePath;
         $serve->save();

        return redirect('/serve/index')->with('success', 'Serve stored successfully');

       }



    //    paid amount

    public function eventAmountcreate(){

       return view('frontend.pages.eventAmount.create');
    }


    public function eventAmountstore(Request $request)
    {
        // dd($request->all());
        $eventAmounts = new EventAmount();

        if (auth()->check()) {
            $eventAmounts->user_id = auth()->id();
            $eventAmounts->name = auth()->user()->name;
            $eventAmounts->phone = auth()->user()->phone;
        } else {
            $eventAmounts->user_id = null;
            $eventAmounts->name = $request->input('name');
            $eventAmounts->phone = $request->input('phone');
        }


        $eventAmounts->paid_amount = $request->input('paid_amount');
        $eventAmounts->event_id = $request->input('event_id');
        $eventAmounts->save();

        return redirect()->back()->with('success', 'Donation recorded successfully!');
    }



    public function eventAmountindex(){
        $eventAmountss=EventAmount::all();
        return view('frontend.pages.eventAmount.index',compact('eventAmountss'));
    }

    public function eventAmountedit($id){
        $eventss=EventAmount::findOrFail($id);
        return view('frontend.pages.eventAmount.edit',compact('eventss'));
    }

    public function eventAmountupdate(Request $request,$id){
       $eventss=EventAmount::findOrFail($id);

       $eventss->name=$request->name;
       $eventss->phone=$request->phone;
       $eventss->paid_amount=$request->paid_amount;
       $eventss->save();

       return redirect()->route('eventAmount.index')->with('success','Event amount update successfully');

    }

    public function eventAmountdelete($id){

            $var=EventAmount::find($id);
            $var->delete();
            return redirect()->back()->with('success', 'Event donation deleted successfully.');

    }


    // mediaCategory
    public function mediaCategoryCreate(){
        return view('frontend.pages.mediaCategory.create');
    }

    public function mediaCategoryStore(Request $request){
      $mediaCategory=new MediaCategory;

      $mediaCategory->name=$request->name;
      $mediaCategory->save();

      return redirect()->route('mediaCategory.index')->with('success', 'Media Category added successfully!');

    }

    public function mediaCategoryIndex(){
        $mediaCategories=MediaCategory::all();
        return view('frontend.pages.mediaCategory.index',compact('mediaCategories'));
    }

    public function mediaCategoryEdit($id){

        $mediaCategories=MediaCategory::findOrFail($id);
        return view('frontend.pages.mediaCategory.edit',compact('mediaCategories'));
    }

    public function mediaCategoryUpdate(Request $request, $id){
        $mediaCategory=MediaCategory::findOrFail($id);

        $mediaCategory->name=$request->name;
        $mediaCategory->save();

        return redirect()->route('mediaCategory.index')->with('success','Media category update sucessfully');

    }

    public function mediaCategoryDelete($id){
        $var=MediaCategory::find($id);
        $var->delete();

        return redirect()->back()->with('success','Media Category deleted successfully');
    }

    public function showGallery()
    {
        $mediaCategories = MediaCategory::with('galleries')->get(); // Categories with images
        $allImages = Gallery::all(); // All gallery images

        return view('frontend.gallery', compact('mediaCategories', 'allImages'));
    }


    public Function blog_details($id){
        $blog=Blog::findOrFail($id);
        return view('frontend.blog_details',compact('blog'));
    }

    public Function blog_show(){
        $blogs=Blog::all();
        return view('frontend.pages.blog',compact('blogs'));
    }

    public function response(){
        return view('frontend.pages.response');
    }



}
