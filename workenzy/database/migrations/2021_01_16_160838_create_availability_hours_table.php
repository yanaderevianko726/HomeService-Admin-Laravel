<?php
/*
 * File name: 2021_01_16_160838_create_availability_hours_table.php
 * Last modified: 2021.01.16 at 17:09:51
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAvailabilityHoursTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availability_hours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('day', 16)->default('monday');
            $table->string('start_at', 16)->nullable();
            $table->string('end_at', 16)->nullable();
            $table->string('data', 255)->nullable();
            $table->integer('e_provider_id')->unsigned();
            $table->foreign('e_provider_id')->references('id')->on('e_providers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('availability_hours');
    }
}
