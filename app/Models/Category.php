<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
class Category extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'parent_id',
        'slug',
        'description',
        'price',
        'video',
        'status',
    ];
    public function scopeFilter(EloquentBuilder $builder, $filters)
    {
        $name = $filters['name'] ?? null;

        $status = $filters['status'] ?? null;

        if ($name) {
            $builder->where('name', 'LIKE', "%$name%");
        }
        if ($status) {
            $builder->where('status', '=', $status);
        }

    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id' , 'id')->withDefault(['name' => 'Main Category']);
            
    }

    public function children()
    {
        return $this->belongsTo(Category::class, 'parent_id' , 'id');
    }
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }
    public function products(){
        return $this->hasMany(Product::class , 'category_id' , 'id');
    }

}
