<?php
/**
 * File name: 2019_10_22_144652_create_currencies_table.php
 * Last modified: 2020.05.07 at 10:43:32
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCurrenciesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 127);
            $table->string('symbol', 63);
            $table->string('code', 5);
            $table->unsignedTinyInteger('decimal_digits')->nullable();
            $table->unsignedTinyInteger('rounding')->nullable();
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
        Schema::drop('currencies');
    }
}
