<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->double('price')->nullable();
            $table->unsignedBigInteger('furnished_type')->default(0)->comment('0-unfurnished, 1-fully, 2-semi')->nullable();
            $table->unsignedBigInteger('saller_type')->default(0)->comment('0-owner, 1-broker, 2-builder')->nullable();
            $table->unsignedBigInteger('property_for')->default(0)->comment('0-rent, 1-sell, 2-pg_co_living')->nullable();
            $table->string('price_duration')->nullable()->comment('daily, monthly, quarterly, yearly');
            $table->double('age_of_property')->nullable();
            $table->double('maintenance')->nullable();
            $table->double('security_deposit')->nullable();
            $table->double('brokerage')->nullable();
            $table->unsignedBigInteger('bhk')->nullable();
            $table->string('sqft')->nullable();
            $table->text('description')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->text('address')->nullable();
            $table->text('video_url')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('premium_property')->default(0)->comment('0-no, 1-yes')->nullable();
            $table->tinyInteger('advertisement_property')->nullable()->comment('null-no, 1-yes');
            $table->datetime('advertisement_property_date')->nullable();
            $table->unsignedBigInteger('added_by')->nullable();
            $table->unsignedBigInteger('total_view')->nullable()->default(0);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('properties');
    }
}
