<?php
/**
 * File name: 2018_07_24_211327_create_custom_field_values_table.php
 * Last modified: 2019.08.27 at 15:37:12
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomFieldValuesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_field_values', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('value')->nullable();
            $table->longText('view')->nullable();
            $table->integer('custom_field_id')->unsigned();
            $table->string('customizable_type', 127);
            $table->integer('customizable_id');
            $table->timestamps();
            $table->foreign('custom_field_id')->references('id')->on('custom_fields')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('custom_field_values');
    }
}
