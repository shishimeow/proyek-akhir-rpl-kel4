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
        Schema::create('support_courses', function (Blueprint $table) {
            $table->id();
            $table->string('courses_id', 10)->unique();
            $table->string('courses_name', 100)->unique();
            $table->foreignId('faculty_id');
            $table->string('course_credits', 10);
            $table->string('date', 30);
            $table->text('desc');
            $table->double('rating')->nullable();
            $table->string('picture')->nullable();
            $table->string('slug')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_courses');
    }
};
