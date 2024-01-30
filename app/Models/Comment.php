<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    protected $fillable = [
        'parent_id',
        'user_id',
        'category_id',
        'comment',
    ];
    public function parent()
    {
        return $this->belongsToMany(Comment::class, 'parent_id' , 'id');
    }
    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
