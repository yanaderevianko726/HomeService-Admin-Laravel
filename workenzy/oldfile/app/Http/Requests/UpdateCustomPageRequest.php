<?php
/*
 * File name: UpdateCustomPageRequest.php
 * Last modified: 2021.02.27 at 20:34:32
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Requests;

use App\Models\CustomPage;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomPageRequest extends FormRequest
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
        return CustomPage::$rules;
    }
}
