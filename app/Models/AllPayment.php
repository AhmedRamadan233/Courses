<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class AllPayment extends Model
{
    use HasFactory;


    protected $with = ['images'];

    protected $fillable = [
        'name',
        'status',
        
    ];

    public function scopeActive(EloquentBuilder $builder, $status = 'active')
    {
        if ($status === 'active') {
            $builder->where('status', '=', $status);
        }
    }
    public function images(): MorphMany
    {
        return $this->morphMany(\App\Models\Image::class, 'imageable');
    }
}
