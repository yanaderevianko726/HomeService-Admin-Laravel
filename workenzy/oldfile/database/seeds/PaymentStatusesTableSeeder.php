<?php
/*
 * File name: PaymentStatusesTableSeeder.php
 * Last modified: 2021.03.02 at 14:35:42
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Seeder;

class PaymentStatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('payment_statuses')->delete();

        DB::table('payment_statuses')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'status' => 'Pending',
                    'order' => 1,
                    'created_at' => '2021-01-17 15:28:28',
                    'updated_at' => '2021-02-17 21:55:15',
                ),
            1 =>
                array(
                    'id' => 2,
                    'status' => 'Paid',
                    'order' => 10,
                    'created_at' => '2021-01-11 23:19:49',
                    'updated_at' => '2021-02-17 21:55:53',
                ),
            2 =>
                array(
                    'id' => 3,
                    'status' => 'Failed',
                    'order' => 20,
                    'created_at' => '2021-01-17 14:05:04',
                    'updated_at' => '2021-02-17 21:56:32',
                ),
            3 =>
                array(
                    'id' => 4,
                    'status' => 'Refunded',
                    'order' => 40,
                    'created_at' => '2021-02-17 21:58:14',
                    'updated_at' => '2021-02-17 21:58:14',
                ),
        ));


    }
}
