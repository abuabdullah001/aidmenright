<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['expensecategorie_id', 'expensesubcategorie_id', 'branch_id', 'chartofaccount_id', 'date', 'amount', 'note'];

    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class, 'expensecategorie_id', 'id');
    }
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function subcategories()
    {
        return $this->belongsTo(ExpenseCategory::class,'sub_category_id');
    }
    public function categories()
    {
        return $this->belongsTo(ExpenseCategory::class,'category_id');
    }
    public function account()
    {
        return $this->belongsTo(Accounts::class,'account_id');
    }
    public function project()
    {
        return $this->belongsTo(Project::class,'projects_id');
    }

    public function champaign()
    {
        return $this->belongsTo(Champaign::class,'champaign_id');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
    public function chartOfaccount()
    {
        return $this->belongsTo(Accounts::class, 'chartofaccount_id', 'id');
    }
}
