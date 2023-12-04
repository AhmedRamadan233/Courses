<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'slug',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function products(){
        return $this->hasMany(Product::class , 'section_id' , 'id');
    }

    public function quizzes(){
        return $this->hasMany(Quiz::class , 'section_id' , 'id');
    }
}
