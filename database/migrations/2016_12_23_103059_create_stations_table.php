<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id')->unsigned()->index();

            $table->string('address_ru');
            $table->string('address_ua');
            $table->double('lat');
            $table->double('lng');
            $table->string('content_ru');
            $table->string('content_ua');
            $table->boolean('active')->nullable();
           // $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stations');
    }
}
