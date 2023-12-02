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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete(); 
            $table->foreignId('section_id')->nullable()->constrained('sections')->nullOnDelete(); 
            $table->string('name')->nullable()->unique();
            $table->string('slug')->nullable();
            $table->string('video')->nullable();
            $table->string('description');
            $table->enum('status' , ['active','inactive','archive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
