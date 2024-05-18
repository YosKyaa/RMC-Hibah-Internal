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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');

            $table->unsignedBigInteger('research_types_id');
            $table->foreign('research_types_id')->references('id')->on('research_types');

            $table->string('research_title');

            $table->unsignedBigInteger('tkt_types_id');
            $table->foreign('tkt_types_id')->references('id')->on('tkt_types');

            $table->unsignedBigInteger('reviewer_id');
            $table->foreign('reviewer_id')->references('id')->on('users');


            $table->string('document')->nullable();

            $note = $table->text('note')->nullable();

            $table->uuid('status_id');
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
            
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
