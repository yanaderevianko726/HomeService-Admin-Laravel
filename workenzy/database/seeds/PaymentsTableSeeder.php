<?php
/*
 * File name: PaymentsTableSeeder.php
 * Last modified: 2021.03.01 at 21:35:31
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->delete();
    }
}
