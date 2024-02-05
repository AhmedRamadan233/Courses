<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'payment_method',
        'status',
        'payment_status',
        'shipping',
        'tax',
        'discount',
        'total',
    ];
    public function finishingOrder()
    {
        return $this->hasOne(Finshing_Order::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
