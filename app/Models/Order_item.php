<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;
    protected $table = 'order_items';

    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'order_id',
        'category_id',
        'category_name',
        'price',
        'options',
    ];

    protected $casts = [
        'options' => 'json',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
