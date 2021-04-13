<?php
/*
 * File name: EProviderUserFactory.php
 * Last modified: 2021.02.01 at 22:38:55
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */


use App\Models\EProvider;
use App\Models\EProviderUser;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(EProviderUser::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomElement([2, 4, 6]),
        'e_provider_id' => EProvider::all()->random()->id
    ];
});
