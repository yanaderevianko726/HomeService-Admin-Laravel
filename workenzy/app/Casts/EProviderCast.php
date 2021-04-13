<?php
/*
 * File name: EProviderCast.php
 * Last modified: 2021.01.29 at 22:24:14
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Casts;

use App\Models\EProvider;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;

/**
 * Class EProviderCast
 * @package App\Casts
 */
class EProviderCast implements CastsAttributes
{

    /**
     * @inheritDoc
     */
    public function get($model, string $key, $value, array $attributes): EProvider
    {
        $decodedValue = json_decode($value, true);
        $eProvider = EProvider::find($decodedValue['id']);
        // provider exist in database
        if (!empty($eProvider)) {
            return $eProvider;
        }
        // if not exist the clone will loaded
        // create new provider based on values stored on database
        $eProvider = new EProvider($decodedValue);
        // push id attribute fillable array
        array_push($eProvider->fillable, 'id');
        // assign the id to provider object
        $eProvider->id = $decodedValue['id'];
        return $eProvider;
    }

    /**
     * @inheritDoc
     */
    public function set($model, string $key, $value, array $attributes): array
    {
        if (!$value instanceof EProvider) {
            throw new InvalidArgumentException('The given value is not an EProvider instance.');
        }

        return [
            'e_provider' => json_encode([
                'id' => $value['id'],
                'name' => $value['name'],
                'phone_number' => $value['phone_number'],
                'mobile_number' => $value['mobile_number'],
            ])
        ];
    }
}
