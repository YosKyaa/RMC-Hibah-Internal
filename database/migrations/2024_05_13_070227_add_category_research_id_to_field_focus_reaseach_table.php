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
        Schema::table('field_focus_research', function (Blueprint $table) {
            $table->unsignedBigInteger('category_research_id')->after('research_topic');
            $table->foreign('category_research_id')->references('id')->on('category_research')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('field_focus_research', function (Blueprint $table) {
            //
        });
    }
};
