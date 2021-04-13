<?php
/*
 * File name: 2021_01_25_212252_create_bookings_table.php
 * Last modified: 2021.01.29 at 22:33:58
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->json('e_provider');
            $table->json('e_service');
            $table->json('options')->nullable();
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->integer('booking_status_id')->nullable()->unsigned();
            $table->json('address');
            $table->integer('payment_id')->nullable()->unsigned();
            $table->json('coupon')->nullable();
            $table->json('taxes')->nullable();
            $table->dateTime('booking_at')->nullable();
            $table->dateTime('start_at')->nullable();
            $table->dateTime('ends_at')->nullable();
            $table->text('hint')->nullable();
            $table->boolean('cancel')->nullable()->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('booking_status_id')->references('id')->on('booking_statuses')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('set null')->onUpdate('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bookings');
    }
}
