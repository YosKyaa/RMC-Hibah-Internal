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
        $table->foreign('departments_id')->references('id')->on('departments');

        $table->unsignedBigInteger('study_programs_id')->nullable();
        $table->foreign('study_programs_id')->references('id')->on('study_programs');
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
