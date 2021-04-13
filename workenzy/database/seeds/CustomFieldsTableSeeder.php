<?php
/*
 * File name: CustomFieldsTableSeeder.php
 * Last modified: 2021.03.02 at 14:35:42
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Seeder;

class CustomFieldsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('custom_fields')->delete();

        DB::table('custom_fields')->insert(array(
            0 =>
                array(
                    'id' => 5,
                    'name' => 'bio',
                    'type' => 'textarea',
                    'values' => NULL,
                    'disabled' => 0,
                    'required' => 0,
                    'in_table' => 0,
                    'bootstrap_column' => 6,
                    'order' => 1,
                    'custom_field_model' => 'App\\Models\\User',
                    'created_at' => '2019-09-06 21:43:58',
                    'updated_at' => '2019-09-06 21:43:58',
                ),
            1 =>
                array(
                    'id' => 6,
                    'name' => 'address',
                    'type' => 'text',
                    'values' => NULL,
                    'disabled' => 0,
                    'required' => 0,
                    'in_table' => 0,
                    'bootstrap_column' => 6,
                    'order' => 3,
                    'custom_field_model' => 'App\\Models\\User',
                    'created_at' => '2019-09-06 21:49:22',
                    'updated_at' => '2019-09-06 21:49:22',
                ),
        ));


    }
}
