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
        Schema::create('finshing__orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')
                ->cascadeOnDelete();
            $table->foreignId('user_id')
            ->nullable()
            ->constrained('users')
            ->nullOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();

            $table->boolean('is_finishing_order')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finshing__orders');
    }
};
