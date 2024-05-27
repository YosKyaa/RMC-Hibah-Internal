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
        Schema::create('research_themes', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->unsignedBigInteger('research_category_id');
            $table->foreign('research_category_id')->references('id')->on('research_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_themes');
    }
};
