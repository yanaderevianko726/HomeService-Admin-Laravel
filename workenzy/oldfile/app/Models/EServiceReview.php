<?php
/*
 * File name: EServiceReview.php
 * Last modified: 2021.01.31 at 21:06:59
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class EServiceReview
 * @package App\Models
 * @version January 23, 2021, 7:42 pm UTC
 *
 * @property User user
 * @property EService eService
 * @property string review
 * @property double rate
 * @property integer user_id
 * @property integer e_service_id
 */
class EServiceReview extends Model
{

    public $table = 'e_service_reviews';


    public $fillable = [
        'review',
        'rate',
        'user_id',
        'e_service_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'review' => 'string',
        'rate' => 'double',
        'e_service_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'rate' => 'required|numeric|max:5|min:0',
        'user_id' => 'required|exists:users,id',
        'e_service_id' => 'required|exists:e_services,id'
    ];

    /**
     * New Attributes
     *
     * @var array
     */
    protected $appends = [
        'custom_fields',

    ];

    public function customFieldsValues()
    {
        return $this->morphMany('App\Models\CustomFieldValue', 'customizable');
    }

    public function getCustomFieldsAttribute()
    {
        $hasCustomField = in_array(static::class,setting('custom_field_models',[]));
        if (!$hasCustomField){
            return [];
        }
        $array = $this->customFieldsValues()
            ->join('custom_fields','custom_fields.id','=','custom_field_values.custom_field_id')
            ->where('custom_fields.in_table','=',true)
            ->get()->toArray();

        return convertToAssoc($array,'name');
    }

    /**
     * @return BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return BelongsTo
     **/
    public function eService()
    {
        return $this->belongsTo(EService::class, 'e_service_id', 'id');
    }

}
