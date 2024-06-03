<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('duration_unit')->nullable();
            $table->unsignedBigInteger('duration')->nullable();
            $table->double('price')->nullable();
            $table->unsignedBigInteger('property')->nullable()->default('0');
            $table->unsignedBigInteger('add_property')->nullable()->default('0');
            $table->unsignedBigInteger('advertisement')->nullable()->default('0');
            $table->unsignedBigInteger('property_limit')->nullable();
            $table->unsignedBigInteger('add_property_limit')->nullable();
            $table->unsignedBigInteger('advertisement_limit')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('packages');
    }
}
