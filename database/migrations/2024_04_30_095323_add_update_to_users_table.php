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
            $table->string('font_title')->nullable();
            $table->string('back_title')->nullable();
            $table->string('nidn')->unique()->nullable();
            $table->string('department')->nullable();
            $table->string('study_program')->nullable();
            $table->string('username')->after('name')->nullable();

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
