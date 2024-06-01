<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('token')->unique();
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete("cascade");
            $table->foreignId('subcategory_id')->references('id')->on('sub_categories')->onDelete("cascade");
            $table->foreignId('brand_id')->references('id')->on('brands')->onDelete("cascade");
            $table->string('name')->nullable();
            $table->string('thumbnail', 700)->nullable();
            $table->text('description')->nullable();
            $table->foreignId('created_by')->references('id')->on('users')->onDelete("cascade");
            $table->enum('status', ['active', 'pending', 'inactive', 'deleted'])->default('active');
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
        Schema::dropIfExists('products');
    }
}
