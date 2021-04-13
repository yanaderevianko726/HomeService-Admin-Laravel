<?php
/*
 * File name: 2021_01_13_105605_create_e_provider_types_table.php
 * Last modified: 2021.01.17 at 20:24:58
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEProviderTypesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_provider_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 127);
            $table->double('commission', 5, 2)->default(0);
            $table->boolean('disabled')->default(0);
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
        Schema::drop('e_provider_types');
    }
}
