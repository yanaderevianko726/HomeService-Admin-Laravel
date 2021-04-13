<?php
/*
 * File name: 2021_01_15_115747_create_e_provider_users_table.php
 * Last modified: 2021.01.17 at 17:04:35
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEProviderUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_provider_users', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->integer('e_provider_id')->unsigned();
            $table->primary(['user_id', 'e_provider_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('e_provider_users');
    }
}
