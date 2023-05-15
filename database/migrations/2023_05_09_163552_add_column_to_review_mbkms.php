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
        Schema::table('review_mbkms', function (Blueprint $table) {
            $table->text('rev_mbkm');
            $table->string('mbkm_id')->unique;
            $table->double('rating')->nullable;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('review_mbkms', function (Blueprint $table) {
            $table->dropColumn('rev_mbkm');
            $table->dropColumn('mbkm_id');
            $table->dropColumn('rating');
        });
    }
};
