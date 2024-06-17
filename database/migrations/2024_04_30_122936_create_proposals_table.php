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
            $table->foreign('users_id')->references('id')->on('users');//Created User

            $table->unsignedBigInteger('research_types_id');
            $table->foreign('research_types_id')->references('id')->on('research_types');

            $table->unsignedBigInteger('research_topics_id');
            $table->foreign('research_topics_id')->references('id')->on('research_topics');

            $table->string('research_title');

            $table->unsignedBigInteger('tkt_types_id');
            $table->foreign('tkt_types_id')->references('id')->on('tkt_types');

            $table->unsignedBigInteger('main_research_targets_id');
            $table->foreign('main_research_targets_id')->references('id')->on('main_research_targets');

            $table->unsignedBigInteger('reviewer_id')->nullable();
            $table->foreign('reviewer_id')->references('id')->on('users');

            $table->text('notes')->nullable();

            $table->uuid('status_id')->nullable();
            $table->foreign('status_id')->references('id')->on('statuses')->nullable()->onDelete('cascade');

            $table->text('review_notes')->nullable();

            $table->text('account_bank_detail')->nullable()->comment('Bank details for payment');

            $table->date('review_date_start')->nullable();

            $table->date('review_date_end')->nullable();

            $table->date('presentation_date')->nullable();

            $table->boolean('approval_reviewer')->nullable();

            $table->text('approval_reviewer_notes')->nullable();

            $table->boolean('approval_vice_rector_1')->nullable();

            $table->boolean('approval_vice_rector_2')->nullable();

            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');





            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
