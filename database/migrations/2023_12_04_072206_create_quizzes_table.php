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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->nullable()->constrained('sections')->nullOnDelete(); 
            $table->string('name');
            $table->enum('status' , ['active','inactive','archive'])->default('active');
            $table->integer('timer')->default(0); // Added timer column with default value 0

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
