<?php
/*
 * File name: PaymentMethodsTableSeeder.php
 * Last modified: 2021.03.02 at 14:35:42
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Seeder;

class PaymentMethodsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('payment_methods')->delete();

        DB::table('payment_methods')->insert(array(
            0 =>
                array(
                    'id' => 2,
                    'name' => 'RazorPay',
                    'description' => 'Click to pay with RazorPay gateway',
                    'route' => '/RazorPay',
                    'order' => 2,
                    'default' => 0,
                    'enabled' => 1,
                    'created_at' => '2021-01-17 14:33:49',
                    'updated_at' => '2021-02-17 22:37:30',
                ),
            1 =>
                array(
                    'id' => 5,
                    'name' => 'PayPal',
                    'description' => 'Click to pay with your PayPal account',
                    'route' => '/PayPal',
                    'order' => 1,
                    'default' => 0,
                    'enabled' => 1,
                    'created_at' => '2021-01-17 15:46:06',
                    'updated_at' => '2021-02-17 22:38:47',
                ),
            2 =>
                array(
                    'id' => 6,
                    'name' => 'Cash',
                    'description' => 'Click to pay cash when finish',
                    'route' => '/Cash',
                    'order' => 3,
                    'default' => 1,
                    'enabled' => 1,
                    'created_at' => '2021-02-17 22:38:42',
                    'updated_at' => '2021-02-17 22:38:42',
                ),
        ));


    }
}
