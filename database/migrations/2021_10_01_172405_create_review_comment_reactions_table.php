<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewCommentReactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_comment_reactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comment_id')->references('id')->on('review_comments')->onDelete("cascade");
            $table->foreignId('reacted_by')->references('id')->on('users')->onDelete("cascade");
            $table->enum('reaction_type', ['like', 'dislike']);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_comment_reactions');
    }
}
