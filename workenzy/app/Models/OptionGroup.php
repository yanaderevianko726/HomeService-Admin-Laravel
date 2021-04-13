<?php
/*
 * File name: OptionGroup.php
 * Last modified: 2021.02.07 at 17:02:32
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * Class OptionGroup
 * @package App\Models
 * @version January 22, 2021, 7:45 pm UTC
 *
 * @property string name
 * @property Collection options
 * @property boolean allow_multiple
 */
class OptionGroup extends Model
{

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:127'
    ];
    public $table = 'option_groups';
    public $fillable = [
        'name',
        'allow_multiple'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'allow_multiple' => 'boolean'
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

    /**
     * @return HasMany
     **/
    public function options()
    {
        return $this->hasMany(Option::class, 'option_group_id');
    }
}
