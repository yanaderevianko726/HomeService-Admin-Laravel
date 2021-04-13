<?php
/**
 * File name: CategoryFactory.php
 * Last modified: 2021.01.06 at 17:33:39
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */


use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Medical Services', 'Car Services', 'Laundry', 'Barber', 'Washing Dishes', 'Photography']),
        'description' => $faker->sentences(5, true),
    ];
});
