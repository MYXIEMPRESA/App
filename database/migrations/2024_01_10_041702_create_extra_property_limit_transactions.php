<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraPropertyLimitTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_property_limit_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('extra_property_limit_id')->nullable();
            $table->unsignedBigInteger('subscription_id')->nullable();
            $table->double('amount')->nullable();
            $table->string('extra_property_type')->nullable()->comment('all,add_property, view_property, advertisement_property');
            $table->unsignedBigInteger('limit')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_status')->nullable()->comment('pending, paid , failed');
            $table->string('txn_id')->nullable();
            $table->string('status')->nullable()->comment('active, inactive');
            $table->json('extra_property_limit_data')->nullable();
            $table->text('other_transaction_detail')->nullable();
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
        Schema::dropIfExists('extra_property_limit_transactions');
    }
}
