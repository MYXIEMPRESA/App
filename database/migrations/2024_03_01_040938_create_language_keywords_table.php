<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_keywords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('screen_id')->nullable()->comment('screens screenID');
            $table->unsignedBigInteger('keyword_id')->nullable()->comment('app keyword');
            $table->string('keyword_name')->nullable();
            $table->string('keyword_value')->nullable();
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
        Schema::dropIfExists('language_keywords');
    }
}
