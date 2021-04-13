<?php
/*
 * File name: ExperienceFactory.php
 * Last modified: 2021.01.18 at 15:57:56
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */


use App\Models\EProvider;
use App\Models\Experience;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Experience::class, function (Faker $faker) {
    return [
        'title' => $faker->text(127),
        'description' => $faker->realText(),
        'e_provider_id' => EProvider::all()->random()->id
    ];
});

$factory->state(Experience::class, 'title_more_127_char', function (Faker $faker) {
    return [
        'title' => $faker->paragraph(20),
    ];
});

$factory->state(Experience::class, 'not_exist_e_provider_id', function (Faker $faker) {
    return [
        'e_provider_id' => 500000, // not exist id
    ];
});
