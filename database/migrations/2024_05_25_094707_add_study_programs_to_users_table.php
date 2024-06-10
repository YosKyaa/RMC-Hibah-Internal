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
            $table->unsignedBigInteger('departments_id')->nullable();
            $table->foreign('departments_id')->references('id')->on('departments')->onDelete('cascade');
            $table->unsignedBigInteger('study_program_id')->nullable();
            $table->foreign('study_program_id')->references('id')->on('study_programs')->nullable()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
