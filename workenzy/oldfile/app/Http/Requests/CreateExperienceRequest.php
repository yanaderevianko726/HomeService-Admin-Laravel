<?php
/*
 * File name: CreateExperienceRequest.php
 * Last modified: 2021.01.16 at 21:48:45
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Requests;

use App\Models\Experience;
use Illuminate\Foundation\Http\FormRequest;

class CreateExperienceRequest extends FormRequest
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
        return Experience::$rules;
    }
}
