<?php
/*
 * File name: TaxCollectionCast.php
 * Last modified: 2021.02.16 at 22:08:33
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Casts;

use App\Models\Tax;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Collection;
use InvalidArgumentException;

/**
 * Class TaxCollectionCast
 * @package App\Casts
 */
class TaxCollectionCast implements CastsAttributes
{

    /**
     * @inheritDoc
     */
    public function get($model, string $key, $value, array $attributes): array
    {
        if (!empty($value)) {
            $decodedValue = json_decode($value, true);
            return array_map(function ($value) {
                $tax = new Tax($value);
                array_push($tax->fillable, 'id');
                $tax->id = $value['id'];
                return $tax;
            }, $decodedValue);
        }
        return [];
    }

    /**
     * @inheritDoc
     */
    public function set($model, string $key, $value, array $attributes): array
    {
        if (!$value instanceof Collection) {
            throw new InvalidArgumentException('The given value is not an Collection instance.');
        }

        return [
            'taxes' => json_encode($value->map->only(['id', 'name', 'value', 'type']))
        ];
    }
}
