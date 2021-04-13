<?php
/*
 * File name: EProviderType.php
 * Last modified: 2021.02.08 at 08:58:32
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Models;

use Eloquent as Model;

/**
 * Class EProviderType
 * @package App\Models
 * @version January 13, 2021, 10:56 am UTC
 *
 * @property string name
 * @property double commission
 * @property boolean disabled
 */
class EProviderType extends Model
{

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:127',
        'commission' => 'required|numeric|max:100|min:0'
    ];
    public $table = 'e_provider_types';
    public $fillable = [
        'name',
        'commission',
        'disabled'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'commission' => 'double',
        'disabled' => 'boolean'
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


}
