<?php
/*
 * File name: OptionCollectionCast.php
 * Last modified: 2021.02.16 at 22:08:33
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Casts;

use App\Models\Option;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Collection;
use InvalidArgumentException;

/**
 * Class OptionCollectionCast
 * @package App\Casts
 */
class OptionCollectionCast implements CastsAttributes
{

    /**
     * @inheritDoc
     */
    public function get($model, string $key, $value, array $attributes): array
    {
        if (!empty($value)) {
            $decodedValue = json_decode($value, true);
            return array_map(function ($value) {
                $option = Option::find($value['id']);
                if (!empty($option)) {
                    return $option;
                }
                $option = new Option($value);
                array_push($option->fillable, 'id');
                $option->id = $value['id'];
                return $option;
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
            'options' => json_encode($value->map->only(['id', 'name', 'price']))
        ];
    }
}
