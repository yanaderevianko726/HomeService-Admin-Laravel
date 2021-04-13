<?php
/*
 * File name: CreateBookingRequest.php
 * Last modified: 2021.02.17 at 19:14:24
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Requests;

use App\Models\Booking;
use Illuminate\Support\Facades\Request;

class CreateBookingRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Booking::$rules;
    }
}
