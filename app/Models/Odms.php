<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odms extends Model
{
    use HasFactory;
    protected $fillable=['image','title','descrition'];
}
