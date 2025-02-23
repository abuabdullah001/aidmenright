<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Manual extends Model
{
    use HasFactory;
    protected $fillable=['name','phone','email','address','payment_methood','amount','transaction_info','payment_prrof','event_type'];

    public function event(){
        return $this->belongsTo(Event::class, 'event_id','paid_amount');
    }
 

}
