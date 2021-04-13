<?php
/*
 * File name: 2021_01_25_170522_create_coupons_table.php
 * Last modified: 2021.01.25 at 17:10:05
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 50)->unique();
            $table->double('discount', 8, 2)->default(0);
            $table->string('discount_type', 50)->default('percent');
            $table->text('description')->nullable();
            $table->dateTime('expires_at')->nullable();
            $table->boolean('enabled')->default(0);
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
        Schema::drop('coupons');
    }
}
