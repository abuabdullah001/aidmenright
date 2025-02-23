<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaCategory extends Model
{
    use HasFactory;
    protected $fillable=['name'];


    public function galleries()
{
    return $this->hasMany(Gallery::class, 'media_category_id'); // Adjust 'category_id' if necessary
}
}
