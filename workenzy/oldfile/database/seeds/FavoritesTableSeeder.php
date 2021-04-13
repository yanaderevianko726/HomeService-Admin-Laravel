<?php
/*
 * File name: FavoritesTableSeeder.php
 * Last modified: 2021.03.02 at 14:35:34
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Seeder;

class FavoritesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('favorites')->delete();
    }
}
