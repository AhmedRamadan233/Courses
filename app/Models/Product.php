<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class Product extends Model
{
    use HasFactory;

    protected $table="products";
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'video',
        'status',
        'description',
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
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id') ->withDefault([ 'name'=> '-']);
    }
    
}
