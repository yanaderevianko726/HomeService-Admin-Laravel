<?php
/*
 * File name: 2021_01_13_200249_create_addresses_table.php
 * Last modified: 2021.02.28 at 14:45:20
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description', 255)->nullable();
            $table->string('address', 255);
            $table->double('latitude', 20, 17)->default(0);
            $table->double('longitude', 20, 17)->default(0);
            $table->boolean('default')->nullable()->default(0);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('addresses');
    }
}
