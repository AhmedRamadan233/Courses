<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->cascadeOnDelete();
            $table->string('facebook_link');
            $table->string('twitter_link');
            $table->string('gmail_link');
            $table->string('whatsapp_link');
            $table->string('youtube_link');
            $table->string('tiktok_link');
            $table->text('discriptions');
            $table->string('app_store_iphone_link');
            $table->string('app_store_android_link');
            $table->string('phone_number');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
