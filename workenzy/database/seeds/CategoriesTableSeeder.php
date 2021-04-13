<?php
/*
 * File name: CategoriesTableSeeder.php
 * Last modified: 2021.03.02 at 14:35:42
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('categories')->delete();

        DB::table('categories')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => 'Car Services',
                    'color' => '#ff9f43',
                    'description' => '<p>Categories for all cars services</p>',
                    'order' => 1,
                    'featured' => 1,
                    'parent_id' => NULL,
                    'created_at' => '2021-01-19 17:01:35',
                    'updated_at' => '2021-01-31 14:19:56',
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => 'Medical Services',
                    'color' => '#0abde3',
                    'description' => '<p>Categories for all Medical Services<br></p>',
                    'order' => 2,
                    'featured' => 1,
                    'parent_id' => NULL,
                    'created_at' => '2021-01-19 18:05:00',
                    'updated_at' => '2021-01-31 13:35:11',
                ),
            2 =>
                array(
                    'id' => 3,
                    'name' => 'Laundry Service',
                    'color' => '#ee5253',
                    'description' => '<p>Category for all Laundry Service</p>',
                    'order' => 3,
                    'featured' => 1,
                    'parent_id' => NULL,
                    'created_at' => '2021-01-31 13:37:04',
                    'updated_at' => '2021-02-02 00:33:10',
                ),
            3 =>
                array(
                    'id' => 4,
                    'name' => 'Beauty & Hair Cuts',
                    'color' => '#10ac84',
                    'description' => '<p>Category for Hair Cuts and Barber</p>',
                    'order' => 4,
                    'featured' => 0,
                    'parent_id' => NULL,
                    'created_at' => '2021-01-31 13:38:37',
                    'updated_at' => '2021-02-23 14:37:09',
                ),
            4 =>
                array(
                    'id' => 5,
                    'name' => 'Washing & Cleaning',
                    'color' => '#5f27cd',
                    'description' => '<p>Category for&nbsp;Washing &amp; Cleaning&nbsp;</p>',
                    'order' => 5,
                    'featured' => 0,
                    'parent_id' => NULL,
                    'created_at' => '2021-01-31 13:42:02',
                    'updated_at' => '2021-01-31 13:42:02',
                ),
            5 =>
                array(
                    'id' => 6,
                    'name' => 'Media & Photography',
                    'color' => '#ff9f43',
                    'description' => '<p>Category for Media & Photography</p>',
                    'order' => 6,
                    'featured' => 0,
                    'parent_id' => NULL,
                    'created_at' => '2021-01-31 13:43:20',
                    'updated_at' => '2021-01-31 14:55:51',
                ),
            6 =>
                array(
                    'id' => 7,
                    'name' => 'Sewer Cleaning',
                    'color' => '#5f27cd',
                    'description' => '<p>Category for Sewer Cleaning<br></p>',
                    'order' => 1,
                    'featured' => 0,
                    'parent_id' => 5,
                    'created_at' => '2021-01-31 14:46:15',
                    'updated_at' => '2021-01-31 14:46:30',
                ),
            7 =>
                array(
                    'id' => 8,
                    'name' => 'Carpet Cleaning',
                    'color' => '#5f27cd',
                    'description' => '<p>Category for Carpet Cleaning<br></p>',
                    'order' => 2,
                    'featured' => 0,
                    'parent_id' => 5,
                    'created_at' => '2021-01-31 14:47:23',
                    'updated_at' => '2021-01-31 14:47:23',
                ),
            8 =>
                array(
                    'id' => 9,
                    'name' => 'Wheel Repair',
                    'color' => '#5f27cd',
                    'description' => '<p>Category for Wheel Repair<br></p>',
                    'order' => 1,
                    'featured' => 0,
                    'parent_id' => 1,
                    'created_at' => '2021-01-31 14:49:40',
                    'updated_at' => '2021-01-31 14:49:40',
                ),
        ));


    }
}
