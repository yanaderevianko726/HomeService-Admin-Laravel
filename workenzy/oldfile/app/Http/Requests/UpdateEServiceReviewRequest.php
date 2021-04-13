<?php
/*
 * File name: UpdateEServiceReviewRequest.php
 * Last modified: 2021.01.23 at 21:01:17
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Requests;

use App\Models\EServiceReview;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEServiceReviewRequest extends FormRequest
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
        return EServiceReview::$rules;
    }
}
