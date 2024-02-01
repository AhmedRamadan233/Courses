<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class SlideShow extends Model
{
    use HasFactory;
    protected $with = ['images'];
    protected $fillable = ['title', 'description', 'price'];




    public function images(): MorphMany
    {
        return $this->morphMany(\App\Models\Image::class, 'imageable');
    }
    
}
