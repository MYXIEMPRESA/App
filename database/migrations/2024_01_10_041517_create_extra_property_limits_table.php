<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraPropertyLimitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_property_limits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('limit')->nullable();
            $table->double('price')->nullable();
            $table->string('type')->nullable()->comment('all, add_property, view_property, advertisement_property');
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
        Schema::dropIfExists('extra_property_limits');
    }
}
