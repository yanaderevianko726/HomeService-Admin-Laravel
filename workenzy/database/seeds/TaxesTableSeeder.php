<?php
/*
 * File name: TaxesTableSeeder.php
 * Last modified: 2021.03.02 at 14:35:42
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Seeder;

class TaxesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('taxes')->delete();

        DB::table('taxes')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => 'Tax 20',
                    'value' => 20.0,
                    'type' => 'percent',
                    'created_at' => '2021-01-15 11:12:13',
                    'updated_at' => '2021-02-01 21:23:01',
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => 'Tax 10',
                    'value' => 10.0,
                    'type' => 'percent',
                    'created_at' => '2021-01-15 11:19:30',
                    'updated_at' => '2021-01-15 11:19:30',
                ),
            2 =>
                array(
                    'id' => 3,
                    'name' => 'Maintenance',
                    'value' => 2.0,
                    'type' => 'fixed',
                    'created_at' => '2021-01-18 20:48:29',
                    'updated_at' => '2021-02-01 21:25:13',
                ),
            3 =>
                array(
                    'id' => 4,
                    'name' => 'Tools Fee',
                    'value' => 5.0,
                    'type' => 'fixed',
                    'created_at' => '2021-02-01 21:24:12',
                    'updated_at' => '2021-02-01 21:24:12',
                ),
        ));


    }
}
