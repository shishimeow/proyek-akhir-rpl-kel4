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
        Schema::create('mbkms', function (Blueprint $table) {
            $table->id();
            $table->string('mbkm_name', 40);
            $table->timestamp('periode_begin')->nullable();
            $table->timestamp('periode_end')->nullable();
            $table->string('excerpt', 100);
            $table->string('positions', 200);
            $table->text('benefit');
            $table->text('requirements');
            $table->string('picture')->nullable;
            $table->string('slug')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mbkms');
    }
};
