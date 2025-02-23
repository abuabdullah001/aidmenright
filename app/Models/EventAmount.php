<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class EventAmount extends Model
{
    use HasFactory;
    protected $fillable=['user_id','name','phone','paid_amount','event_id'];

    public function event() {
        return $this->hasMany(Event::class);
    }
  
}
