<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebGallery extends Model
{
    use HasFactory;

    protected $fillable=['media_category_id'];

    public function mediaCategory(){
        return $this->belongsTo(MediaCategory::class);
    }
}
