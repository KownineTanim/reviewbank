<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_keywords', function (Blueprint $table) {
            $table->id();
            $table->foreignId('review_id')->references('id')->on('reviews')->onDelete("cascade");
            $table->foreignId('keyword_id')->references('id')->on('keywords')->onDelete("cascade");
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
        Schema::dropIfExists('review_keywords');
    }
}
