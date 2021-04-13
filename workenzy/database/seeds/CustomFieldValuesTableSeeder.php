<?php
/*
 * File name: CustomFieldValuesTableSeeder.php
 * Last modified: 2021.03.01 at 21:18:18
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Seeder;

class CustomFieldValuesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('custom_field_values')->delete();

        DB::table('custom_field_values')->insert(array(
            0 =>
                array(
                    'id' => 30,
                    'value' => 'Explicabo. Eum provi.&nbsp;',
                    'view' => 'Explicabo. Eum provi.&nbsp;',
                    'custom_field_id' => 5,
                    'customizable_type' => 'App\\Models\\User',
                    'customizable_id' => 2,
                    'created_at' => '2019-09-06 21:52:30',
                    'updated_at' => '2021-02-02 11:32:57',
                ),
            1 =>
                array(
                    'id' => 31,
                    'value' => 'Modi est libero qui',
                    'view' => 'Modi est libero qui',
                    'custom_field_id' => 6,
                    'customizable_type' => 'App\\Models\\User',
                    'customizable_id' => 2,
                    'created_at' => '2019-09-06 21:52:30',
                    'updated_at' => '2021-02-02 11:32:57',
                ),
            2 =>
                array(
                    'id' => 33,
                    'value' => 'Consequatur error ip.&nbsp;',
                    'view' => 'Consequatur error ip.&nbsp;',
                    'custom_field_id' => 5,
                    'customizable_type' => 'App\\Models\\User',
                    'customizable_id' => 1,
                    'created_at' => '2019-09-06 21:53:58',
                    'updated_at' => '2021-02-02 11:32:01',
                ),
            3 =>
                array(
                    'id' => 34,
                    'value' => 'Qui vero ratione vel',
                    'view' => 'Qui vero ratione vel',
                    'custom_field_id' => 6,
                    'customizable_type' => 'App\\Models\\User',
                    'customizable_id' => 1,
                    'created_at' => '2019-09-06 21:53:58',
                    'updated_at' => '2021-02-02 11:32:01',
                ),
            4 =>
                array(
                    'id' => 36,
                    'value' => 'Dolor optio, error e',
                    'view' => 'Dolor optio, error e',
                    'custom_field_id' => 5,
                    'customizable_type' => 'App\\Models\\User',
                    'customizable_id' => 3,
                    'created_at' => '2019-10-15 17:21:32',
                    'updated_at' => '2021-02-02 11:33:23',
                ),
            5 =>
                array(
                    'id' => 37,
                    'value' => 'Voluptatibus ad ipsu',
                    'view' => 'Voluptatibus ad ipsu',
                    'custom_field_id' => 6,
                    'customizable_type' => 'App\\Models\\User',
                    'customizable_id' => 3,
                    'created_at' => '2019-10-15 17:21:32',
                    'updated_at' => '2021-02-02 11:33:23',
                ),
            6 =>
                array(
                    'id' => 39,
                    'value' => 'Faucibus ornare suspendisse sed nisi lacus sed. Pellentesque sit amet porttitor eget dolor morbi non arcu. Eu scelerisque felis imperdiet proin fermentum leo vel orci porta',
                    'view' => 'Faucibus ornare suspendisse sed nisi lacus sed. Pellentesque sit amet porttitor eget dolor morbi non arcu. Eu scelerisque felis imperdiet proin fermentum leo vel orci porta',
                    'custom_field_id' => 5,
                    'customizable_type' => 'App\\Models\\User',
                    'customizable_id' => 4,
                    'created_at' => '2019-10-16 19:31:46',
                    'updated_at' => '2019-10-16 19:31:46',
                ),
            7 =>
                array(
                    'id' => 40,
                    'value' => 'Sequi molestiae ipsa1',
                    'view' => 'Sequi molestiae ipsa1',
                    'custom_field_id' => 6,
                    'customizable_type' => 'App\\Models\\User',
                    'customizable_id' => 4,
                    'created_at' => '2019-10-16 19:31:46',
                    'updated_at' => '2021-02-21 23:32:10',
                ),
            8 =>
                array(
                    'id' => 42,
                    'value' => 'Omnis fugiat et cons.',
                    'view' => 'Omnis fugiat et cons.',
                    'custom_field_id' => 5,
                    'customizable_type' => 'App\\Models\\User',
                    'customizable_id' => 5,
                    'created_at' => '2019-12-15 18:49:44',
                    'updated_at' => '2021-02-02 11:29:47',
                ),
            9 =>
                array(
                    'id' => 43,
                    'value' => 'Consequatur delenit',
                    'view' => 'Consequatur delenit',
                    'custom_field_id' => 6,
                    'customizable_type' => 'App\\Models\\User',
                    'customizable_id' => 5,
                    'created_at' => '2019-12-15 18:49:44',
                    'updated_at' => '2021-02-02 11:29:47',
                ),
            10 =>
                array(
                    'id' => 45,
                    'value' => '<p>Short bio for this driver</p>',
                    'view' => 'Short bio for this driver',
                    'custom_field_id' => 5,
                    'customizable_type' => 'App\\Models\\User',
                    'customizable_id' => 6,
                    'created_at' => '2020-03-29 17:28:05',
                    'updated_at' => '2020-03-29 17:28:05',
                ),
            11 =>
                array(
                    'id' => 46,
                    'value' => '4722 Villa Drive',
                    'view' => '4722 Villa Drive',
                    'custom_field_id' => 6,
                    'customizable_type' => 'App\\Models\\User',
                    'customizable_id' => 6,
                    'created_at' => '2020-03-29 17:28:05',
                    'updated_at' => '2020-03-29 17:28:05',
                ),
            12 =>
                array(
                    'id' => 48,
                    'value' => 'Voluptatem. Omnis op.',
                    'view' => 'Voluptatem. Omnis op.',
                    'custom_field_id' => 5,
                    'customizable_type' => 'App\\Models\\User',
                    'customizable_id' => 7,
                    'created_at' => '2021-01-17 16:13:24',
                    'updated_at' => '2021-02-02 11:31:36',
                ),
            13 =>
                array(
                    'id' => 49,
                    'value' => 'Perspiciatis aut ei',
                    'view' => 'Perspiciatis aut ei',
                    'custom_field_id' => 6,
                    'customizable_type' => 'App\\Models\\User',
                    'customizable_id' => 7,
                    'created_at' => '2021-01-17 16:13:24',
                    'updated_at' => '2021-02-02 11:31:36',
                ),
            14 =>
                array(
                    'id' => 51,
                    'value' => 'sdfsdf56',
                    'view' => 'sdfsdf56',
                    'custom_field_id' => 5,
                    'customizable_type' => 'App\\Models\\User',
                    'customizable_id' => 8,
                    'created_at' => '2021-02-10 11:31:12',
                    'updated_at' => '2021-02-19 14:09:37',
                ),
            15 =>
                array(
                    'id' => 52,
                    'value' => 'Adressttt',
                    'view' => 'Adressttt',
                    'custom_field_id' => 6,
                    'customizable_type' => 'App\\Models\\User',
                    'customizable_id' => 8,
                    'created_at' => '2021-02-10 11:31:12',
                    'updated_at' => '2021-02-19 13:57:27',
                ),
        ));


    }
}
