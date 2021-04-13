<?php
/*
 * File name: Favorite.php
 * Last modified: 2021.01.23 at 12:12:03
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Favorite
 * @package App\Models
 * @version January 22, 2021, 8:58 pm UTC
 *
 * @property EService eService
 * @property Collection option
 * @property User user
 * @property integer e_service_id
 * @property bigInteger user_id
 */
class Favorite extends Model
{

    public $table = 'favorites';



    public $fillable = [
        'e_service_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'e_service_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'e_service_id' => 'required|exists:e_services,id',
        'user_id' => 'required|exists:users,id'
    ];

    /**
     * New Attributes
     *
     * @var array
     */
    protected $appends = [
        'custom_fields',
        'options'
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
    public function eService()
    {
        return $this->belongsTo(EService::class, 'e_service_id', 'id');
    }

    /**
     * @return BelongsToMany
     **/
    public function options()
    {
        return $this->belongsToMany(Option::class, 'favorite_options');
    }

    /**
     * @return BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
        /**
    * @return Collection
    */
    public function getOptionsAttribute()
    {
        return $this->options()->get(['options.id', 'options.name']);
    }
}
