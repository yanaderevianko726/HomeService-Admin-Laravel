<?php
/*
 * File name: ExperiencesTableSeeder.php
 * Last modified: 2021.03.01 at 21:41:25
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperiencesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('experiences')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        factory(Experience::class, 50)->create();
    }
}
