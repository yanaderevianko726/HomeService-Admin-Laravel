<?php /*
 * File name: FaqCategoryFactory.php
 * Last modified: 2021.01.11 at 22:36:57
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

/** @noinspection PhpUnusedLocalVariableInspection */

use App\Models\FaqCategory;
use Illuminate\Database\Eloquent\Factory;

global $i;
$i = 0;

/** @var Factory $factory */
$factory->define(FaqCategory::class, function () use ($i) {
    $names = ['Service', 'Payment', 'Support', 'Providers', 'Misc'];
    return [
        'name' => $names[$i++],
    ];
});
