<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
class Category extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'slug', 'description', 'status'];
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id' , 'id')
            ->withDefault([ 'name'=> '-']);
    }

    public function children()
    {
        return $this->belongsTo(Category::class, 'parent_id' , 'id')->withDefault('Main Category');
    }

    public function scopeFilter(EloquentBuilder $builder, $filters)
    {

        $status = $filters['status'] ?? null;
        if ($status) {
            $builder->where('status', '=', $status);
        }

    }
}
