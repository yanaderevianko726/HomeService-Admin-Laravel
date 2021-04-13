<?php
/*
 * File name: EProviderTypeFactory.php
 * Last modified: 2021.01.17 at 20:27:18
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */


use App\Models\EProviderType;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(EProviderType::class, function (Faker $faker) {
    return [
        'name' => $faker->text(48),
        'commission' => $faker->randomFloat(2, 5, 50),
        'disabled' => $faker->boolean(),
    ];
});

$factory->state(EProviderType::class, 'name_more_127_char', function (Faker $faker) {
    return [
        'name' => $faker->paragraph(20),
    ];
});

$factory->state(EProviderType::class, 'commission_more_100', function (Faker $faker) {
    return [
        'commission' => 101,
    ];
});

$factory->state(EProviderType::class, 'commission_less_0', function (Faker $faker) {
    return [
        'commission' => -1,
    ];
});
