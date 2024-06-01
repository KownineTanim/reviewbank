<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewProductFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_product_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('review_id')->references('id')->on('reviews')->onDelete("cascade");
            $table->double('size_kb', 8, 1);
            $table->string('url', 500)->nullable();
            $table->string('path', 500)->nullable();
            $table->enum('type', ['jpeg', 'png', 'pdf', 'jpg', 'mp4'])->nullable();
            $table->enum('is_url', ['true', 'false'])->default('false');
            $table->enum('status', ['private', 'public'])->default('private');
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
        Schema::dropIfExists('review_product_files');
    }
}
