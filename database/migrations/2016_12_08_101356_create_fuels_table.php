<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ru', 60);
            $table->string('name_ua', 60);
            $table->string('title_ru');
            $table->string('title_ua');
            $table->text('text_ru');
            $table->text('text_ua');
            $table->double('price');
            $table->string('image');
            $table->boolean('active')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fuels');
    }
}
