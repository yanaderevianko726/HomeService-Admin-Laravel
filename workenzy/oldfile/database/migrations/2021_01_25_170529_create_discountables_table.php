<?php
/*
 * File name: 2021_01_25_170529_create_discountables_table.php
 * Last modified: 2021.01.25 at 17:10:05
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiscountablesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discountables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('coupon_id')->unsigned();
            $table->string('discountable_type', 127);
            $table->integer('discountable_id');
            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('discountables');
    }
}
