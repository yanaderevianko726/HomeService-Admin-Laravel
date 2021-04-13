<?php
/*
 * File name: EProviderTypesTableSeeder.php
 * Last modified: 2021.03.02 at 14:35:42
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Seeder;

class EProviderTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('e_provider_types')->delete();

        DB::table('e_provider_types')->insert(array(
            0 =>
                array(
                    'id' => 2,
                    'name' => 'Company',
                    'commission' => 75.0,
                    'disabled' => 0,
                    'created_at' => '2021-01-13 18:05:35',
                    'updated_at' => '2021-02-01 21:22:19',
                ),
            1 =>
                array(
                    'id' => 3,
                    'name' => 'Freelancer',
                    'commission' => 50.0,
                    'disabled' => 0,
                    'created_at' => '2021-01-17 19:27:18',
                    'updated_at' => '2021-02-24 18:57:30',
                ),
        ));


    }
}
