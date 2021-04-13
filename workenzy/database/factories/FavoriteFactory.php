<?php
/**
 * File name: FavoriteFactory.php
 * Last modified: 2021.01.03 at 22:27:45
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */


use App\Models\Favorite;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Favorite::class, function (Faker $faker) {
    return [
        'eservice_id' => $faker->numberBetween(1, 30),
        'user_id' => $faker->numberBetween(1, 6)
    ];
});
