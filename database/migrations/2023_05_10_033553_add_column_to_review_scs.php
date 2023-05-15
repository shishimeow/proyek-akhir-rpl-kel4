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
            $table->bigInteger('courses_id')->unique;
            $table->bigInteger('user_id')->unique;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('review_scs', function (Blueprint $table) {
            $table->dropColumn('courses_id');
            $table->dropColumn('user_id');
        });
    }
};
