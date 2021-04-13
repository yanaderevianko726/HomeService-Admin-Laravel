<?php
/*
 * File name: EProvidersPayoutsTableSeeder.php
 * Last modified: 2021.03.01 at 21:22:30
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Seeder;

class EProvidersPayoutsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('e_provider_payouts')->delete();
    }
}
