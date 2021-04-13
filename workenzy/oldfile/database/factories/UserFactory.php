<?php
/*
 * File name: UserFactory.php
 * Last modified: 2021.01.11 at 22:34:18
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

/** @var Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->define(User::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
    ];
});

$factory->state(User::class, 'register', function (Faker $faker) {
    return [
        'name' => $faker->name,
        'password' => '123456', // 123456
        'password_confirmation' => '123456', // 123456
    ];
});

$factory->state(User::class, 'login', function (Faker $faker) {
    return [
        'password' => '123456', // 123456
    ];
});
