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
            $table->string('font_title');
            $table->string('back_title');
            $table->string('nidn')->unique()->nullable();
            $table->string('department');
            $table->string('study_program');
            $table->string('username');

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
            $table->dropColumn('nidn');
            $table->dropColumn('department');
            $table->dropColumn('study_program');
            $table->dropColumn('username');
        });
    }
};
