<?php
/*
 * File name: Faq.php
 * Last modified: 2021.02.10 at 18:13:48
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Faq
 * @package App\Models
 * @version August 29, 2019, 9:39 pm UTC
 *
 * @property FaqCategory faqCategory
 * @property string question
 * @property string answer
 * @property integer faq_category_id
 */
class Faq extends Model
{

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'question' => 'required',
        'answer' => 'required',
        'faq_category_id' => 'required|exists:faq_categories,id'
    ];
    public $table = 'faqs';
    public $fillable = [
        'question',
        'answer',
        'faq_category_id'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'question' => 'string',
        'answer' => 'string',
        'faq_category_id' => 'integer'
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
        "custom_fields",
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
    public function faqCategory()
    {
        return $this->belongsTo(FaqCategory::class, 'faq_category_id', 'id');
    }

}
