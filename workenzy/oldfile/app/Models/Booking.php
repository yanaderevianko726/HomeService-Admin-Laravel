<?php
/*
 * File name: Booking.php
 * Last modified: 2021.02.19 at 16:26:54
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Models;

use App\Casts\OptionCollectionCast;
use App\Casts\TaxCollectionCast;
use Carbon\Carbon;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Date;

/**
 * Class Booking
 * @package App\Models
 * @version January 25, 2021, 9:22 pm UTC
 *
 * @property int id
 * @property User user
 * @property BookingStatus bookingStatus
 * @property Payment payment
 * @property EProvider e_provider
 * @property EService e_service
 * @property Option[] options
 * @property integer user_id
 * @property integer address_id
 * @property integer booking_status_id
 * @property integer payment_status_id
 * @property Address address
 * @property integer payment_id
 * @property double duration
 * @property Coupon coupon
 * @property Tax[] taxes
 * @property Date booking_at
 * @property Date start_at
 * @property Date ends_at
 * @property string hint
 * @property boolean cancel
 */
class Booking extends Model
{

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required|exists:users,id',
        'booking_status_id' => 'required|exists:booking_statuses,id',
        'payment_id' => 'nullable|exists:payments,id'
    ];
    public $table = 'bookings';
    public $fillable = [
        'e_provider',
        'e_service',
        'options',
        'user_id',
        'booking_status_id',
        'address',
        'payment_id',
        'coupon',
        'taxes',
        'booking_at',
        'start_at',
        'ends_at',
        'hint',
        'cancel'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'e_provider' => EProvider::class,
        'e_service' => EService::class,
        'options' => OptionCollectionCast::class,
        'address' => Address::class,
        'coupon' => Coupon::class,
        'taxes' => TaxCollectionCast::class,
        'booking_status_id' => 'integer',
        'payment_id' => 'integer',
        'duration' => 'double',
        'user_id' => 'integer',
        'booking_at' => 'datetime:Y-m-d\TH:i:s.uP',
        'start_at' => 'datetime:Y-m-d\TH:i:s.uP',
        'ends_at' => 'datetime:Y-m-d\TH:i:s.uP',
        'hint' => 'string',
        'cancel' => 'boolean'
    ];
    /**
     * New Attributes
     *
     * @var array
     */
    protected $appends = [
        'custom_fields',
        'duration'
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

    public function getDurationAttribute(): float
    {
        return $this->getDurationInHours();
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
    public function bookingStatus()
    {
        return $this->belongsTo(BookingStatus::class, 'booking_status_id', 'id');
    }

    /**
     * @return BelongsTo
     **/
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }

    public function getTotal(): float
    {
        $total = $this->getSubtotal();
        $total += $this->getTaxesValue();
        $total += $this->getCouponValue();
        return $total;
    }

    public function getTaxesValue(): float
    {
        $total = $this->getSubtotal();
        $taxValue = 0;
        foreach ($this->taxes as $tax) {
            if ($tax->type == 'percent') {
                $taxValue += ($total * $tax->value / 100);
            } else {
                $taxValue += $tax->value;
            }
        }
        return $taxValue;
    }

    public function getCouponValue(): float
    {
        $total = $this->getSubtotal();
        if (empty($this->coupon)) {
            return 0;
        } else {
            if ($this->coupon->discount_type == 'percent') {
                return -($total * $this->coupon->discount / 100);
            } else {
                return -$this->coupon->discount;
            }
        }
    }

    public function getSubtotal(): float
    {
        if ($this->e_service->price_unit == 'fixed') {
            $total = $this->e_service->getPrice();
        } else {
            $total = $this->e_service->getPrice() * $this->getDurationInHours();
        }
        foreach ($this->options as $option) {
            $total += $option->price;
        }
        return $total;
    }

    public function getDurationInHours(): float
    {
        if ($this->start_at) {
            if ($this->ends_at) {
                $endAt = new Carbon($this->ends_at);
            } else {
                $endAt = (new Carbon())->now();
            }
            $startAt = new Carbon($this->start_at);
            $hours = $endAt->diffInSeconds($startAt) / 60 / 60;
            $hours = round($hours, 2);
        } else {
            $hours = 0;
        }
        return $hours;
    }

}
