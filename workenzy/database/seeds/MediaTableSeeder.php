<?php
/*
 * File name: MediaTableSeeder.php
 * Last modified: 2021.03.01 at 21:23:22
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('media')->delete();
    }
}
