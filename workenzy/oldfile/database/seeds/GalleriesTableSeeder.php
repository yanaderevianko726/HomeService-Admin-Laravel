<?php
/*
 * File name: GalleriesTableSeeder.php
 * Last modified: 2021.03.01 at 21:23:22
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GalleriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('galleries')->delete();
        factory(Gallery::class, 20)->create();
    }
}
