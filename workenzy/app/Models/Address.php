<?php
/*
 * File name: Address.php
 * Last modified: 2021.02.16 at 10:52:09
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Models;

use App\Casts\AddressCast;
use Eloquent as Model;
use Illuminate\Contracts\Database\Eloquent\Castable;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Contracts\Database\Eloquent\CastsInboundAttributes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Address
 * @package App\Models
 * @version January 13, 2021, 8:02 pm UTC
 *
 * @property User user
 * @property integer id
 * @property string description
 * @property string address
 * @property double latitude
 * @property double longitude
 * @property boolean default
 * @property integer user_id
 */
class Address extends Model implements Castable
{

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'description' => 'max:255',
        'address' => 'required|max:255',
        'latitude' => 'required|numeric|min:-200|max:200',
        'longitude' => 'required|numeric|min:-200|max:200',
    ];
    public $table = 'addresses';
    public $fillable = [
        'description',
        'address',
        'latitude',
        'longitude',
        'default',
        'user_id'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'description' => 'string',
        'address' => 'string',
        'latitude' => 'double',
        'longitude' => 'double',
        'default' => 'boolean',
        'user_id' => 'integer'
    ];
    /**
     * New Attributes
     *
     * @var array
     */
    protected $appends = [
        'custom_fields',
    ];

    protected $hidden = [
        "created_at",
        "updated_at",
    ];

    /**
     * @return CastsAttributes|CastsInboundAttributes|string
     */
    public static function castUsing()
    {
        return AddressCast::class;
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

    /**
     * @return BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
