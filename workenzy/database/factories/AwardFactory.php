<?php
/*
 * File name: AwardFactory.php
 * Last modified: 2021.01.17 at 20:46:36
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */


use App\Models\Award;
use App\Models\EProvider;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Award::class, function (Faker $faker) {
    return [
        'title' => $faker->text(100),
        'description' => $faker->realText(),
        'e_provider_id' => EProvider::all()->random()->id
    ];
});

$factory->state(Award::class, 'title_more_127_char', function (Faker $faker) {
    return [
        'title' => $faker->paragraph(20),
    ];
});

$factory->state(Award::class, 'not_exist_e_provider_id', function (Faker $faker) {
    return [
        'e_provider_id' => 500000, // not exist id
    ];
});
