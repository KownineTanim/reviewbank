<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('highlighted_title')->nullable();
            $table->string('heading')->nullable();
            $table->string('summary')->nullable();
            $table->string('image', 700)->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->enum('button_target', ['own-site', 'other-site'])->default('own-site');
            $table->dateTime('start_date')->default(date('Y-m-d H:i:s'));
            $table->dateTime('end_date')->default(date('Y-m-d H:i:s'));
            $table->enum('status', ['published', 'unpublished'])->default('published');
            $table->foreignId('created_by')->references('id')->on('users')->onDelete("cascade");
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
