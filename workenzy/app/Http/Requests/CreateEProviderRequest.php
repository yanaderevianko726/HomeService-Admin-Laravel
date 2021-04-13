<?php
/*
 * File name: CreateEProviderRequest.php
 * Last modified: 2021.01.17 at 17:04:33
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Requests;

use App\Models\EProvider;
use Illuminate\Foundation\Http\FormRequest;

class CreateEProviderRequest extends FormRequest
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
        return EProvider::$rules;
    }
}
