<?php
/*
 * File name: 2021_01_22_200807_create_options_table.php
 * Last modified: 2021.01.22 at 21:08:07
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOptionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 127);
            $table->text('description');
            $table->double('price', 10, 2)->default(0);
            $table->integer('e_service_id')->unsigned();
            $table->integer('option_group_id')->unsigned();
            $table->timestamps();
            $table->foreign('e_service_id')->references('id')->on('e_services')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('option_group_id')->references('id')->on('option_groups')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('options');
    }
}
