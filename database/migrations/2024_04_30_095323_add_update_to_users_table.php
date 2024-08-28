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
        Schema::table('users', function (Blueprint $table) {
            $table->string('front_title')->nullable();
            $table->string('back_title')->nullable();
            $table->string('nidn')->unique()->nullable();
            $table->string('image')->unique()->nullable();
            $table->string('username')->after('name')->nullable();
            $table->string('schoolar')->after('username')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('font_title');
            $table->dropColumn('back_title');
            $table->dropColumn('study_program');
            $table->dropColumn('nidn');
            $table->dropColumn('image');
            $table->dropColumn('username');
        });
    }
};
