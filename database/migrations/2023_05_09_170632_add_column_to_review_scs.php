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
        Schema::table('review_scs', function (Blueprint $table) {
            $table->text('rev_sc');
            $table->string('courses_id')->unique;
            $table->double('rating')->nullable;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('review_scs', function (Blueprint $table) {
            $table->dropColumn('rev_sc');
            $table->dropColumn('courses_id');
            $table->dropColumn('rating');
        });
    }
};
