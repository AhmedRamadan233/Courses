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
            $table->string('facebook_link')->nullable();
            $table->string('github_link')->nullable();
            $table->string('gmail_link')->nullable();
            $table->string('whatsapp_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('tiktok_link')->nullable();
            $table->text('descriptions')->nullable();
            $table->string('app_store_iphone_link')->nullable();
            $table->string('app_store_android_link')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
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
