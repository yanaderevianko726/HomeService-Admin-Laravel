<?php
/*
 * File name: SlideFactory.php
 * Last modified: 2021.01.25 at 11:59:39
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

/** @var Factory $factory */

use App\Models\EProvider;
use App\Models\EService;
use App\Models\Slide;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Slide::class, function (Faker $faker) {
    $eService = $faker->boolean;
    $array = [
        'order' => $faker->numberBetween(0, 5),
        'text' => $faker->sentence(4),
        'button' => $faker->randomElement(['Discover It', 'Book Now', 'Get Discount']),
        'text_position' => $faker->randomElement(['start', 'end', 'center']),
        'text_color' => '#25d366',
        'button_color' => '#25d366',
        'background_color' => '#ccccdd',
        'indicator_color' => '#25d366',
        'image_fit' => 'cover',
        'e_service_id' => $eService ? EService::all()->random()->id : null,
        'e_provider_id' => !$eService ? EProvider::all()->random()->id : null,
        'enabled' => $faker->boolean,
    ];

    return $array;
});
