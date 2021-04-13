<?php
/**
 * File name: Discountable.php
 * Last modified: 2021.01.03 at 12:13:27
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class CustomFieldValue
 * @package App\Models
 * @version July 24, 2018, 9:13 pm UTC
 *
 * @property CustomField customField
 * @property string value
 * @property integer coupon_id
 * @property string discountable_type
 * @property integer discountable_id
 */
class Discountable extends Model
{

    public $table = 'discountables';
    public $timestamps = false;


    public $fillable = [
        'coupon_id',
        'discountable_type',
        'discountable_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'coupon_id' => 'integer',
        'discountable_type' => 'string',
        'discountable_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'coupon_id' => 'required|exists:coupon,id',
        'discountable_type' => 'required',
        'discountable_id' => 'required'
    ];

    /**
     * New Attributes
     *
     * @var array
     */
    protected $appends = [
        
    ];

    /**
     * @return BelongsTo
     **/
    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id', 'id');
    }

    public function discountable()
    {
        return $this->morphTo();
    }
}
