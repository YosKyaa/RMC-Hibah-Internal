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
        Schema::create('data', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');

            $table->string('research_title');

            $table->string('research_team')->foreign('users_id')->references('id')->on('users')->nullable();

            $table->unsignedBigInteger('field_focus_research_id');
            $table->foreign('field_focus_research_id')->references('id')->on('field_focus_research');

            $table->unsignedBigInteger('tkt_types_id');
            $table->foreign('tkt_types_id')->references('id')->on('tkt_types');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
