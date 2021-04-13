<?php
/*
 * File name: EServiceCategoriesTableSeeder.php
 * Last modified: 2021.03.02 at 14:35:42
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use App\Models\EServiceCategory;
use Illuminate\Database\Seeder;

class EServiceCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('e_service_categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        try {
            factory(EServiceCategory::class, 10)->create();
        } catch (Exception $e) {
        }
        try {
            factory(EServiceCategory::class, 10)->create();
        } catch (Exception $e) {
        }
        try {
            factory(EServiceCategory::class, 10)->create();
        } catch (Exception $e) {
        }


    }
}
