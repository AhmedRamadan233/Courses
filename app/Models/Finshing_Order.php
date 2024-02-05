<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finshing_Order extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected $fillable = [
        'order_id',
        'user_id',
        'is_finishing_order',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
