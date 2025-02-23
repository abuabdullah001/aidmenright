<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MannagementMember extends Model
{
    use HasFactory;

    // Define the fillable fields
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'dob',
        'blood_group',
        'image',
        'designation'
         // Include image field
    ];
}
