<?php
/*
 * File name: CreateTaxRequest.php
 * Last modified: 2021.01.16 at 21:49:01
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Requests;

use App\Models\Tax;
use Illuminate\Foundation\Http\FormRequest;

class CreateTaxRequest extends FormRequest
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
        return Tax::$rules;
    }
}
