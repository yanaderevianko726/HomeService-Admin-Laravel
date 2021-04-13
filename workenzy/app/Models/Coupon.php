<?php
/*
 * File name: Coupon.php
 * Last modified: 2021.01.28 at 23:46:25
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Models;

use App\Casts\CouponCast;
use DateTime;
use Eloquent as Model;
use Illuminate\Contracts\Database\Eloquent\Castable;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Contracts\Database\Eloquent\CastsInboundAttributes;

/**
 * Class Coupon
 * @package App\Models
 *
 * @property integer id
 * @property string code
 * @property double discount
 * @property string discount_type
 * @property string description
 * @property DateTime expires_at
 * @property boolean enabled
 */
class Coupon extends Model implements Castable
{

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required|unique:coupons|max:50',
        'discount' => 'required|numeric|min:0',
        'discount_type' => 'required',
        'expires_at' => 'required|date|after_or_equal:tomorrow'
    ];
    public $table = 'coupons';
    public $fillable = [
        'code',
        'discount',
        'discount_type',
        'description',
        'expires_at',
        'enabled'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'code' => 'string',
        'discount' => 'double',
        'discount_type' => 'string',
        'description' => 'string',
        'expires_at' => 'datetime',
        'enabled' => 'boolean'
    ];
    /**
     * New Attributes
     *
     * @var array
     */
    protected $appends = [
        'custom_fields',

    ];

    /**
     * @return CastsAttributes|CastsInboundAttributes|string
     */
    public static function castUsing()
    {
        return CouponCast::class;
    }

    public function getCustomFieldsAttribute()
    {
        $hasCustomField = in_array(static::class, setting('custom_field_models', []));
        if (!$hasCustomField) {
            return [];
        }
        $array = $this->customFieldsValues()
            ->join('custom_fields', 'custom_fields.id', '=', 'custom_field_values.custom_field_id')
            ->where('custom_fields.in_table', '=', true)
            ->get()->toArray();

        return convertToAssoc($array, 'name');
    }

    public function customFieldsValues()
    {
        return $this->morphMany('App\Models\CustomFieldValue', 'customizable');
    }

    public function discountables()
    {
        return $this->hasMany(Discountable::class, 'coupon_id');
    }

}
