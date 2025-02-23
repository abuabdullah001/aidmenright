<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\champaign;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\Project;
use App\Models\Transection;

class ExpenseController extends Controller
{
    public function store(Request $request)
    {
        $eventSupport = new Expense();
        $eventSupport->event_id = $request->event_id;
        $eventSupport->champaign_id = $request->champaign_id;
        $eventSupport->category_id = $request->category_id;
        $eventSupport->sub_category_id = $request->sub_category_id;
        $eventSupport->projects_id = $request->projects_id;
        $eventSupport->type = $request->type;
        $eventSupport->account_id = $request->account_id;
        $eventSupport->amount = $request->amount;
        $eventSupport->note = $request->note;
        $eventSupport->save();

        return redirect()->route('event_support.index')->with('success', 'Expense information saved successfully!');
    }
    public function store2(Request $request)
    {
        $eventSupport = new ExpenseCategory();
        $eventSupport->name = $request->name;
        $eventSupport->parent_id = $request->parent_id;
        $eventSupport->save();

        return redirect()->back()->with('success', 'Category created successfully!');
    }
    public function update2(Request $request,$id)
    {
        $eventSupport =  ExpenseCategory::find($id);
        $eventSupport->name = $request->name;
        $eventSupport->parent_id = $request->parent_id;
        $eventSupport->save();

        return redirect('expense/category/list')->with('success', 'Category updated successfully!');
    }

    public function destroy2($id){
        $eventSupport =  ExpenseCategory::find($id);
        $eventSupport->delete();
        return redirect()->back()->with('success', 'Category created successfully!');

    }
    public function create2(){

        return view('admin.pages.expense.category');
    }
    public function index2(){
        $eventSupport =  ExpenseCategory::all();

        return view('admin.pages.expense.category-list',compact('eventSupport'));
    }
    public function edit2($id){
        $expenseCategory =  ExpenseCategory::find($id);

        return view('admin.pages.expense.category-edit',compact('expenseCategory'));
    }

    public function fetchEvents(Request $request)
    {
        $category = $request->category;

        $events = null;
        $champaign = null;
        $projects = null;
        $expensecategory = null;

        if ($category == 'event') {
            $events = Event::all();
        } elseif ($category == 'champaign') {
            $champaign = Champaign::all();
        } elseif ($category == 'project') {
            $projects = Project::all();
        }
        elseif ($category == 'other-expense') {
            $expensecategory = ExpenseCategory::where('parent_id',null)->get();
        };

        return view('helpers', compact('events', 'champaign', 'projects','expensecategory'));
    }
    public function fetchEvents2(Request $request)
    {
        $category = $request->category;


        $expensecategory2 = ExpenseCategory::where('parent_id', $category)->get();


        return view('helpers2', compact('expensecategory2'));
    }


    public function create(){

        return view('admin.pages.expense.create');
    }

public function show($id){
    $eventSupport = Expense::findOrFail($id);
        return view('admin.pages.expense.edit', compact('eventSupport'));
}

    public function edit($id)
    {
        $eventSupport = Expense::findOrFail($id);
        return view('admin.pages.expense.edit', compact('eventSupport'));
    }

    public function update(Request $request, $id)
    {
        $eventSupport = Expense::findOrFail($id);
        $eventSupport->event_id = $request->event_id;
        $eventSupport->type = $request->type;
        $eventSupport->champaign_id = $request->champaign_id;
        $eventSupport->projects_id = $request->projects_id;
        $eventSupport->category_id = $request->category_id;
        $eventSupport->sub_category_id = $request->sub_category_id;
        $eventSupport->account_id = $request->account_id;
        $eventSupport->amount = $request->amount;
        $eventSupport->note = $request->note;
        $eventSupport->save();

        return redirect()->route('event_support.index')->with('success', 'Expense information updated successfully!');
    }

    public function destroy($id)
    {
        $eventSupport = Expense::findOrFail($id);
        $eventSupport->delete();

        return redirect()->back()->with('success', 'Expense information saved successfully!');
    }

    public function index()
    {
        $eventSupports = Expense::all();
        return view('admin.pages.expense.index', compact('eventSupports'));
    }


}
