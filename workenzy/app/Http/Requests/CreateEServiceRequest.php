<?php
/*
 * File name: CreateEServiceRequest.php
 * Last modified: 2021.01.22 at 11:37:48
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Requests;

use App\Models\EService;
use Illuminate\Foundation\Http\FormRequest;

class CreateEServiceRequest extends FormRequest
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
        return EService::$rules;
    }
}
