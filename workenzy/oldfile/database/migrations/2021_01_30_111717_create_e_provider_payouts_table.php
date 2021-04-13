<?php
/*
 * File name: 2021_01_30_111717_create_e_provider_payouts_table.php
 * Last modified: 2021.01.30 at 12:20:40
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEProviderPayoutsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_provider_payouts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('e_provider_id')->unsigned();
            $table->string('method', 127);
            $table->double('amount', 10, 2)->default(0);
            $table->dateTime('paid_date');
            $table->text('note')->nullable();
            $table->timestamps();
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
        Schema::drop('e_provider_payouts');
    }
}
