<?php
/*
 * File name: OptionFactory.php
 * Last modified: 2021.03.01 at 21:30:17
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */


use App\Models\EService;
use App\Models\Option;
use App\Models\OptionGroup;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Option::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['10m²', '20m', '30m²', '40m']),
        'description' => $faker->sentence(4),
        'price' => $faker->randomFloat(2, 10, 50),
        'e_service_id' => EService::all()->random()->id,
        'option_group_id' => OptionGroup::all()->random()->id,
    ];
});
