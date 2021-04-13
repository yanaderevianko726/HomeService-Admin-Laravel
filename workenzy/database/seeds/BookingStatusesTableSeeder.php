<?php
/*
 * File name: BookingStatusesTableSeeder.php
 * Last modified: 2021.03.02 at 14:35:42
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Seeder;

class BookingStatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('booking_statuses')->delete();

        DB::table('booking_statuses')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'status' => 'Received',
                    'order' => 1,
                    'created_at' => '2021-01-25 19:25:46',
                    'updated_at' => '2021-01-29 17:56:35',
                ),
            1 =>
                array(
                    'id' => 2,
                    'status' => 'In Progress',
                    'order' => 40,
                    'created_at' => '2021-01-25 19:26:02',
                    'updated_at' => '2021-02-16 21:56:52',
                ),
            2 =>
                array(
                    'id' => 3,
                    'status' => 'On the Way',
                    'order' => 20,
                    'created_at' => '2021-01-28 07:47:23',
                    'updated_at' => '2021-02-16 12:10:13',
                ),
            3 =>
                array(
                    'id' => 4,
                    'status' => 'Accepted',
                    'order' => 10,
                    'created_at' => '2021-02-16 12:09:29',
                    'updated_at' => '2021-02-16 12:10:06',
                ),
            4 =>
                array(
                    'id' => 5,
                    'status' => 'Ready',
                    'order' => 30,
                    'created_at' => '2021-02-16 12:11:50',
                    'updated_at' => '2021-02-16 21:56:42',
                ),
            5 =>
                array(
                    'id' => 6,
                    'status' => 'Done',
                    'order' => 50,
                    'created_at' => '2021-02-16 21:57:02',
                    'updated_at' => '2021-02-16 21:57:02',
                ),
            6 =>
                array(
                    'id' => 7,
                    'status' => 'Failed',
                    'order' => 60,
                    'created_at' => '2021-02-16 21:58:36',
                    'updated_at' => '2021-02-16 21:58:36',
                ),
        ));


    }
}
