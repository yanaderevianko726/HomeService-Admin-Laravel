<?php
/**
 * File name: FaqFactory.php
 * Last modified: 2021.01.03 at 22:27:45
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */


use App\Models\Faq;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Faq::class, function (Faker $faker) {
    return [
        'question' => $faker->text(100),
        'answer' => $faker->realText(),
        'faq_category_id' => $faker->numberBetween(1, 4)
    ];
});
