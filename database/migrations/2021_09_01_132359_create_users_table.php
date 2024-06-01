<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('user_name')->unique()->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('bio')->nullable();
            $table->date('dob')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('verification_token', 500)->nullable();
            $table->foreignId('active_role_id')->references('id')->on('roles');
            $table->rememberToken();
            $table->string('profile_photo')->nullable();
            $table->enum('gender', ['male', 'female', 'others', 'unknown'])->nullable()->default('unknown');
            $table->string('mobile_primary')->nullable()->unique();
            $table->enum('status', ['active', 'inactive', 'invalid', 'deleted', 'guest-reviewed'])->default('invalid');
            $table->enum('is_verified', ['true', 'false'])->default('false');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
