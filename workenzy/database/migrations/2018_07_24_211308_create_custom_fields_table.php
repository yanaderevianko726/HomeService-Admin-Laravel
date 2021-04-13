<?php
/**
 * File name: 2018_07_24_211308_create_custom_fields_table.php
 * Last modified: 2019.08.27 at 15:37:12
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomFieldsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 127);
            $table->string('type', 56);
            $table->string('values')->nullable();
            $table->boolean('disabled')->nullable();
            $table->boolean('required')->nullable();
            $table->boolean('in_table')->nullable();
            $table->tinyInteger('bootstrap_column')->nullable();
            $table->tinyInteger('order')->nullable();
            $table->string('custom_field_model', 127);
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
        Schema::drop('custom_fields');
    }
}
