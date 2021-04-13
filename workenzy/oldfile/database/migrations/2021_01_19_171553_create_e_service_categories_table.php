<?php
/*
 * File name: 2021_01_19_171553_create_e_service_categories_table.php
 * Last modified: 2021.01.22 at 11:37:49
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEServiceCategoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_service_categories', function (Blueprint $table) {
            $table->integer('e_service_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->primary(['e_service_id', 'category_id']);
            $table->foreign('e_service_id')->references('id')->on('e_services')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('e_service_categories');
    }
}
