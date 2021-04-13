<?php
/*
 * File name: EServiceCategoyFactory.php
 * Last modified: 2021.03.02 at 14:35:34
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */


use App\Models\Category;
use App\Models\EProvider;
use App\Models\EServiceCategory;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(EServiceCategory::class, function (Faker $faker) {
    return [
        'category_id' => Category::all()->random()->id,
        'e_service_id' => EProvider::all()->random()->id
    ];
});
