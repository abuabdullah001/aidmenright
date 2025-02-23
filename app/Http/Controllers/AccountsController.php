<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\CityTranslation;
use App\Models\State;

class AccountsController extends Controller
{
    public function __construct() {
        // Staff Permission Check
        // $this->middleware(['permission:manage_shipping_cities'])->only('index','create','destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $accountslastData = Accounts::latest('id')->first();
        $accounts = Accounts::orderBy('status', 'desc')->paginate(15);
        if ($accountslastData) :
            $AccountData = $accountslastData->id + 1;
        else :
            $AccountData = 1;
        endif;
        $accountCode = 'CA' . str_pad($AccountData, 5, "0", STR_PAD_LEFT);
        return view('admin.pages.account.index', compact('accounts','accountCode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $account = new Accounts();
        $account->accountCode = $request->accountCode;
        $account->account_name = $request->account_name;
        $account->save();


        return back()->with('success', 'Account Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(Request $request, $id)
     {
         $account = Accounts::find($id);
         return view('admin.pages.account.edit', compact('account'));
     }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $account = Accounts::findOrFail($id);
        $account->accountCode = $request->accountCode;
        $account->account_name = $request->account_name;
        $account->save();

        return back()->with('success', 'Account Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Accounts::destroy($id);

        return back()->with('success', 'Account deleted Successfully!');
    }

    public function updateStatus(Request $request){
        $city = City::findOrFail($request->id);
        $city->status = $request->status;
        $city->save();

        return 1;
    }
}
