<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id')->nullable();
            $table->foreign('language_id')->references('id')->on('language_default_lists')->onDelete('cascade');
            $table->string('language_name')->nullable();
            $table->string('language_code')->nullable();
            $table->string('country_code')->nullable();
            $table->string('language_flag')->nullable();
            $table->tinyInteger('is_rtl')->nullable()->default('0');
            $table->tinyInteger('is_default')->default(0)->comment('0-no, 1-yes')->nullable();
            $table->tinyInteger('status')->nullable()->default('0');
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
        Schema::dropIfExists('language_tables');
    }
}
