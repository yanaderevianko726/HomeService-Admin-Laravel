<?php
/*
 * File name: AddressCast.php
 * Last modified: 2021.02.16 at 22:08:33
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Casts;

use App\Models\Address as AddressModel;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;

/**
 * Class AddressCast
 * @package App\Casts
 */
class AddressCast implements CastsAttributes
{

    /**
     * @inheritDoc
     */
    public function get($model, string $key, $value, array $attributes): AddressModel
    {
        if (!empty($value)) {
            $decodedValue = json_decode($value, true);
            $address = new AddressModel($decodedValue);
            array_push($address->fillable, 'id');
            $address->id = $decodedValue['id'];
            return $address;
        }
        return new AddressModel();
    }

    /**
     * @inheritDoc
     */
    public function set($model, string $key, $value, array $attributes): array
    {
        if (!$value instanceof AddressModel) {
            throw new InvalidArgumentException('The given value is not an Address instance.');
        }

        return ['address' => json_encode([
            'id' => $value['id'],
            'description' => $value['description'],
            'address' => $value['address'],
            'latitude' => $value['latitude'],
            'longitude' => $value['longitude'],
        ])];
    }
}
