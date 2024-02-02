<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class GeneralSettings extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id','facebook_link', 'twitter_link', 'gmail_link', 'whatsapp_link', 'youtube_link',
        'tiktok_link', 'descriptions', 'app_store_iphone_link', 'app_store_android_link',
        'phone_number', 'address',
    ];

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
