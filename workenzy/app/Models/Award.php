<?php
/*
 * File name: Award.php
 * Last modified: 2021.02.18 at 20:40:48
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Award
 * @package App\Models
 * @version January 12, 2021, 10:59 am UTC
 *
 * @property EProvider eProvider
 * @property string id
 * @property string title
 * @property string description
 * @property integer e_provider_id
 */
class Award extends Model
{

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|max:127',
        'e_provider_id' => 'required|exists:e_providers,id'
    ];
    public $table = 'awards';
    public $fillable = [
        'title',
        'description',
        'e_provider_id'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'e_provider_id' => 'integer'
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
     * @return BelongsTo
     **/
    public function eProvider()
    {
        return $this->belongsTo(EProvider::class, 'e_provider_id', 'id');
    }

}
