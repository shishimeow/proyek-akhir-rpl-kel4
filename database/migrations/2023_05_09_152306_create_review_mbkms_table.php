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
        Schema::create('review_mbkms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('rev_mbkm');
            $table->foreignId('mbkm_id');
            $table->foreignId('user_id');
            $table->double('rating')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_mbkms');
    }
};
