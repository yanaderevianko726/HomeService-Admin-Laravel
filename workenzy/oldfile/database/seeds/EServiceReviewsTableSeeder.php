<?php
/*
 * File name: EServiceReviewsTableSeeder.php
 * Last modified: 2021.02.02 at 10:59:31
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use App\Models\EServiceReview;
use Illuminate\Database\Seeder;

class EServiceReviewsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('e_service_reviews')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(EServiceReview::class, 100)->create();

    }
}
