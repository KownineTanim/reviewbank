<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('token')->unique()->nullable();
            $table->string('name');
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete("cascade");
            $table->enum('status', ['active', 'pending', 'inactive', 'deleted'])->default('active');
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
        Schema::dropIfExists('sub_categories');
    }
}
