<?php
/*
 * File name: EServiceCast.php
 * Last modified: 2021.01.29 at 22:23:21
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Casts;

use App\Models\EService;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;

/**
 * Class EServiceCast
 * @package App\Casts
 */
class EServiceCast implements CastsAttributes
{

    /**
     * @inheritDoc
     */
    public function get($model, string $key, $value, array $attributes): EService
    {
        $decodedValue = json_decode($value, true);
        $eService = EService::find($decodedValue['id']);
        // service exist in database
        if (!empty($eService)) {
            return $eService;
        }
        // if not exist the clone will loaded
        // create new service based on values stored on database
        $eService = new EService($decodedValue);
        // push id attribute fillable array
        array_push($eService->fillable, 'id');
        // assign the id to service object
        $eService->id = $decodedValue['id'];
        return $eService;
    }

    /**
     * @inheritDoc
     */
    public function set($model, string $key, $value, array $attributes): array
    {
        if (!$value instanceof EService) {
            throw new InvalidArgumentException('The given value is not an EService instance.');
        }

        return [
            'e_service' => json_encode(
                [
                    'id' => $value['id'],
                    'name' => $value['name'],
                    'price' => $value['price'],
                    'discount_price' => $value['discount_price'],
                    'price_unit' => $value['price_unit'],
                    'duration' => $value['duration'],
                ]
            )
        ];
    }
}
