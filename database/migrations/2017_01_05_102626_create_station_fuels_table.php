<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationFuelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_fuels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('station_id')->unsigned()->index();
            //$table->foreign('station_id')->references('id')->on('stations');
            $table->integer('fuel_id')->unsigned()->index();
            //$table->foreign('fuel_id')->references('id')->on('fuels');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('station_fuels');
    }
}
