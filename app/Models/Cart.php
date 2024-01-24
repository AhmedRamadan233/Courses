<?php

namespace App\Models;

use App\Observers\CartObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class Cart extends Model
{
    use HasFactory;


    protected $fillable=[
        'cookie_id',
        'user_id',
        'category_id',
        'quantity',
        'options'
    ];

    public function user(){
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Anonymous'
        ]);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }


    protected static function booted(){
        static::observe(CartObserver::class);
        
        static::addGlobalScope('cookie_id' ,function(Builder $builder){
            $builder->where('cookie_id' , '=' , Cart::getCookieId());
        });
    } 
    public static function getCookieId(){
        $cookie_id = Cookie::get('cart_id');
        if(!$cookie_id){
            $cookie_id = Str::uuid();
            Cookie::queue('cart_id', $cookie_id , 30*24*60);
        }

        return $cookie_id;
    }
}
