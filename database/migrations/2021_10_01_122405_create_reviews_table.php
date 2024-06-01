<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('token')->unique();
            $table->foreignId('product_id')->references('id')->on('products')->onDelete("cascade");
            $table->foreignId('posted_by')->references('id')->on('users')->onDelete("cascade");
            $table->double('price_rating', 8, 1)->default(0);
            $table->double('quality_rating', 8, 1)->default(0);
            $table->double('design_rating', 8, 1)->default(0);
            $table->double('durability_rating', 8, 1)->default(0);
            $table->double('service_rating', 8, 1)->default(0);
            $table->longText('description')->nullable();
            $table->text('rejected_reason')->nullable();
            $table->enum('status', ['active', 'inactive', 'pending', 'draft', 'deleted', 'rejected', 'guest-pending'])->default('active');
            $table->foreignId('approved_by')->nullable()->references('id')->on('users')->onDelete("cascade");
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
        Schema::dropIfExists('reviews');
    }
}
