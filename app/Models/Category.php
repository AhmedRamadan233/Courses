<?php

namespace App\Models;

use App\Models\Scopes\QuizScope;
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
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('isBoughtCategories', function ($query) {
            $query->whereNotIn('id', self::isBoughtCategories());
        });
    }

    public static function isBoughtCategories()
    {
        return Finshing_Order::where('is_finishing_order', true)
                    ->where('user_id', auth()->id())
                    ->pluck('category_id')
                    ->toArray();
    }
    public function scopeNewest($query, $limit)
    {
        return $query->orderBy('created_at', 'desc')->take($limit);
    }

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
    public function scopeActive(EloquentBuilder $builder, $status = 'active')
    {
        if ($status === 'active') {
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
    public function sections(){
        return $this->hasMany(Section::class , 'category_id' , 'id');
    }

    public function description()
    {
        return $this->hasMany(Description::class, 'category_id', 'id');
    }
    public function commonQestions()
    {
        return $this->hasMany(CommonQestions::class, 'category_id', 'id');
    }

    public function comments(){
        return $this->hasMany(Comment::class , 'category_id' , 'id');
    }
    public function orderItems()
    {
        return $this->hasMany(Order_item::class);
    }
    public function finishingOrder()
    {
        return $this->hasMany(Finshing_Order::class);
    }

    public function scopePriceRange($query, $minPrice, $maxPrice)
    {
        return $query->whereBetween('price', [$minPrice, $maxPrice]);
    }

}
