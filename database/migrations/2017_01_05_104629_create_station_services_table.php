<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_service', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('station_id')->unsigned()->index();
            //$table->foreign('station_id')->references('id')->on('stations');
            $table->integer('service_id')->unsigned()->index();
            //$table->foreign('service_id')->references('id')->on('services');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('station_services');
    }
}
