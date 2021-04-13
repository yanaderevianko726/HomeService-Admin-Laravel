<?php
/*
 * File name: Slide.php
 * Last modified: 2021.01.31 at 10:37:17
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

/**
 * Class Slide
 * @package App\Models
 * @version January 25, 2021, 10:54 am UTC
 *
 * @property EService eService
 * @property EProvider eProvider
 * @property integer order
 * @property string text
 * @property string button
 * @property string text_position
 * @property string text_color
 * @property string button_color
 * @property string background_color
 * @property string indicator_color
 * @property string image_fit
 * @property integer e_service_id
 * @property integer e_provider_id
 * @property boolean enabled
 */
class Slide extends Model implements HasMedia
{
    use HasMediaTrait {
        getFirstMediaUrl as protected getFirstMediaUrlTrait;
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'text' => 'max:50',
        'button' => 'max:50',
        'text_position' => 'required',
        'text_color' => 'max:36',
        'button_color' => 'max:36',
        'background_color' => 'max:36',
        'indicator_color' => 'max:36',
        'image_fit' => 'required'
    ];
    public $table = 'slides';
    public $fillable = [
        'order',
        'text',
        'button',
        'text_position',
        'text_color',
        'button_color',
        'background_color',
        'indicator_color',
        'image_fit',
        'e_service_id',
        'e_provider_id',
        'enabled'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'order' => 'integer',
        'text' => 'string',
        'button' => 'string',
        'text_position' => 'string',
        'text_color' => 'string',
        'button_color' => 'string',
        'background_color' => 'string',
        'indicator_color' => 'string',
        'image' => 'string',
        'image_fit' => 'string',
        'e_service_id' => 'integer',
        'e_provider_id' => 'integer',
        'enabled' => 'boolean'
    ];
    /**
     * New Attributes
     *
     * @var array
     */
    protected $appends = [
        'custom_fields',
        'has_media',
    ];

    protected $hidden = [
        "created_at",
        "updated_at",
    ];

    /**
     * @param Media|null $media
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_CROP, 200, 200)
            ->sharpen(10);

        $this->addMediaConversion('icon')
            ->fit(Manipulations::FIT_CROP, 100, 100)
            ->sharpen(10);
    }

    /**
     * to generate media url in case of fallback will
     * return the file type icon
     * @param string $conversion
     * @return string url
     */
    public function getFirstMediaUrl($collectionName = 'default', $conversion = '')
    {
        $url = $this->getFirstMediaUrlTrait($collectionName);
        $array = explode('.', $url);
        $extension = strtolower(end($array));
        if (in_array($extension, config('medialibrary.extensions_has_thumb'))) {
            return asset($this->getFirstMediaUrlTrait($collectionName, $conversion));
        } else {
            return asset(config('medialibrary.icons_folder') . '/' . $extension . '.png');
        }
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
    public function eService()
    {
        return $this->belongsTo(EService::class, 'e_service_id', 'id');
    }

    /**
     * @return BelongsTo
     **/
    public function eProvider()
    {
        return $this->belongsTo(EProvider::class, 'e_provider_id', 'id');
    }

    /**
     * Add Media to api results
     * @return bool
     */
    public function getHasMediaAttribute()
    {
        return $this->hasMedia('image');
    }

}
