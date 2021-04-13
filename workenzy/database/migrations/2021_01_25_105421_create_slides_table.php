<?php
/*
 * File name: 2021_01_25_105421_create_slides_table.php
 * Last modified: 2021.01.25 at 11:57:05
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSlidesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order')->unsigned()->default(0)->nullable();
            $table->string('text', 50)->nullable();
            $table->string('button', 50)->nullable();
            $table->string('text_position', 50)->default('start')->nullable();
            $table->string('text_color', 36)->nullable();
            $table->string('button_color', 36)->nullable();
            $table->string('background_color', 36)->nullable();
            $table->string('indicator_color', 36)->nullable();
            $table->string('image_fit', 50)->default('cover')->nullable();
            $table->integer('e_service_id')->unsigned()->nullable();
            $table->integer('e_provider_id')->unsigned()->nullable();
            $table->boolean('enabled')->default(1)->nullable();
            $table->timestamps();
            $table->foreign('e_service_id')->references('id')->on('e_services')->onDelete('set null')->onUpdate('set null');
            $table->foreign('e_provider_id')->references('id')->on('e_providers')->onDelete('set null')->onUpdate('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('slides');
    }
}
