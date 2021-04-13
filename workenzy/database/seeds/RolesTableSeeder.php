<?php
/*
 * File name: RolesTableSeeder.php
 * Last modified: 2021.03.01 at 21:37:06
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('roles')->delete();

        DB::table('roles')->insert(array(
            0 =>
                array(
                    'id' => 2,
                    'name' => 'admin',
                    'guard_name' => 'web',
                    'default' => 0,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            1 =>
                array(
                    'id' => 3,
                    'name' => 'provider',
                    'guard_name' => 'web',
                    'default' => 0,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            2 =>
                array(
                    'id' => 4,
                    'name' => 'customer',
                    'guard_name' => 'web',
                    'default' => 1,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
        ));


    }
}
