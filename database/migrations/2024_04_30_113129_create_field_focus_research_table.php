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
        Schema::create('field_focus_research', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->unique();
            $table->unsignedBigInteger('category_research_id');
            $table->foreign('category_research_id')->references('id')->on('category_research');
            $table->string('research_theme');
            $table->string('research_topic');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('field_fokus_research');
    }
};
