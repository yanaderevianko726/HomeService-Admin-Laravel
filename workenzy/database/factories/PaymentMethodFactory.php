<?php
/*
 * File name: PaymentMethodFactory.php
 * Last modified: 2021.01.17 at 16:47:43
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */


use App\Models\PaymentMethod;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(PaymentMethod::class, function (Faker $faker) {
    return [
        'name' => $faker->text(48),
        'description' => $faker->sentence(5),
        'route' => $faker->randomElement(['/PayPal', '/RazorPay', '/CashOnDelivery', '/Strip']),
        'order' => $faker->numberBetween(1, 10),
        'default' => $faker->boolean(),
        'enabled' => $faker->boolean(),
    ];
});

$factory->state(PaymentMethod::class, 'name_more_127_char', function (Faker $faker) {
    return [
        'name' => $faker->paragraph(20),
    ];
});

$factory->state(PaymentMethod::class, 'description_more_127_char', function (Faker $faker) {
    return [
        'description' => $faker->paragraph(20),
    ];
});

$factory->state(PaymentMethod::class, 'route_more_127_char', function (Faker $faker) {
    return [
        'route' => $faker->paragraph(20),
    ];
});

$factory->state(PaymentMethod::class, 'order_negative', function (Faker $faker) {
    return [
        'order' => -1,
    ];
});
