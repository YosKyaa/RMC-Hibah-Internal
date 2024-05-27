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
        Schema::create('proposal_teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proposals_id');
            $table->foreign('proposals_id')->references('id')->on('proposals');

            $table->unsignedBigInteger('researcher_id');
            $table->foreign('researcher_id')->references('id')->on('users')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposal_teams');
    }
};
