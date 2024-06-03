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
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('contact_number')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('address')->nullable();
            $table->string('user_type')->nullable();
            $table->string('player_id')->nullable();
            $table->rememberToken();
            $table->timestamp('last_notification_seen')->nullable();
            $table->string('status')->default('active');
            $table->string('uid')->nullable();
            $table->string('display_name')->nullable();
            $table->string('login_type')->nullable();
            $table->tinyInteger('is_subscribe')->nullable()->default('0');
            $table->tinyInteger('is_agent')->nullable();
            $table->tinyInteger('is_builder')->nullable();
            $table->string('timezone')->nullable()->default('UTC');
            $table->unsignedBigInteger('view_limit_count')->nullable();
            $table->unsignedBigInteger('add_limit_count')->nullable();
            $table->unsignedBigInteger('advertisement_limit_count')->nullable();
            $table->timestamps();
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
