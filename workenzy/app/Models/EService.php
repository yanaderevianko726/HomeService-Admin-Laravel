<?php
/*
 * File name: EService.php
 * Last modified: 2021.02.11 at 15:47:36
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Models;

use App\Casts\EServiceCast;
use Eloquent as Model;
use Illuminate\Contracts\Database\Eloquent\Castable;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Contracts\Database\Eloquent\CastsInboundAttributes;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

/**
 * Class EService
 * @package App\Models
 * @version January 19, 2021, 1:59 pm UTC
 *
 * @property Collection category
 * @property EProvider eProvider
 * @property Collection Option
 * @property Collection EServicesReview
 * @property string name
 * @property integer id
 * @property double price
 * @property double discount_price
 * @property string price_unit
 * @property string duration
 * @property string description
 * @property boolean featured
 * @property boolean available
 * @property integer e_provider_id
 */
class EService extends Model implements HasMedia, Castable
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
        'name' => 'required|max:127',
        'price' => 'required|numeric|min:0|max:99999999,99',
        'discount_price' => 'nullable|numeric|min:0|max:99999999,99',
        'price_unit' => ["required", "regex:/^(hourly|fixed)$/i"],
        'duration' => 'required_if:price_unit,fixed',
        'description' => 'required',
        'e_provider_id' => 'required|exists:e_providers,id'
    ];
    public $table = 'e_services';
    public $fillable = [
        'name',
        'price',
        'discount_price',
        'price_unit',
        'duration',
        'description',
        'featured',
        'available',
        'e_provider_id'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'image' => 'string',
        'price' => 'double',
        'discount_price' => 'double',
        'price_unit' => 'string',
        'duration' => 'string',
        'description' => 'string',
        'featured' => 'boolean',
        'available' => 'boolean',
        'e_provider_id' => 'integer',
        'rate' => 'double',
        'total_reviews' => 'integer'
    ];
    /**
     * New Attributes
     *
     * @var array
     */
    protected $appends = [
        'custom_fields',
        'has_media',
        'available',
        'total_reviews',
        'is_favorite',
        'rate'
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
        return EServiceCast::class;
    }

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
     * Add Media to api results
     * @return bool
     */
    public function getHasMediaAttribute(): bool
    {
        return $this->hasMedia('image');
    }

    /**
     * Check if is a favorite for current user
     * @return bool
     */
    public function getIsFavoriteAttribute(): bool
    {
        return $this->favorites()->count() > 0;
    }

    /**
     * Add Total Reviews to api results
     * @return int
     */
    public function getTotalReviewsAttribute(): int
    {
        return $this->eServiceReviews()->count();
    }

    /**
     * @return HasMany
     **/
    public function eServiceReviews()
    {
        return $this->hasMany(EServiceReview::class, 'e_service_id');
    }

    /**
     * Add Rate to api results
     * @return float
     */
    public function getRateAttribute(): float
    {
        return (float)$this->eServiceReviews()->avg('rate');
    }

    /**
     * EService available when
     * This EService is marked as available
     * and his
     * Provider is ready so he is accepted by admin and marked as available and is open now
     */
    public function getAvailableAttribute(): bool
    {
        return isset($this->attributes['available']) && $this->attributes['available'] && $this->eProvider->accepted;
    }

    /**
     * @return BelongsTo
     **/
    public function eProvider()
    {
        return $this->belongsTo(EProvider::class, 'e_provider_id', 'id');
    }

    /**
     * @return HasMany
     **/
    public function options()
    {
        return $this->hasMany(Option::class, 'e_service_id');
    }

    /**
     * @return BelongsToMany
     **/
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'e_service_categories');
    }

    /**
     * @return HasMany
     **/
    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'e_service_id')->where('favorites.user_id', auth()->id());
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->discount_price > 0 ? $this->discount_price : $this->price;
    }

    /**
     * @return bool
     */
    public function hasDiscount(): bool
    {
        return $this->discount_price > 0;
    }

    public function discountables()
    {
        return $this->morphMany('App\Models\Discountable', 'discountable');
    }
}
