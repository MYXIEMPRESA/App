<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->double('total_amount')->nullable()->default('0');
            $table->string('payment_type')->nullable()->default('cash');
            $table->string('txn_id')->nullable();
            $table->json('transaction_detail')->nullable();
            $table->string('payment_status')->nullable()->comment('pending, paid, failed')->default('pending');
            $table->datetime('subscription_start_date')->nullable();
            $table->datetime('subscription_end_date')->nullable();
            $table->string('status')->nullable()->comment('active, inactive');
            $table->json('package_data')->nullable();
            $table->string('callback')->nullable();
            $table->datetime('cancel_date')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
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
        Schema::dropIfExists('subscriptions');
    }
}
