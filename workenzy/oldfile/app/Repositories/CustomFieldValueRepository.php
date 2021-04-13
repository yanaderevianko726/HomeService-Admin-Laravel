<?php
/**
 * File name: CustomFieldValueRepository.php
 * Last modified: 2021.01.03 at 15:29:51
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Repositories;

use App\Models\CustomFieldValue;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CustomFieldValueRepository
 * @package App\Repositories
 * @version July 24, 2018, 9:13 pm UTC
 *
 * @method CustomFieldValue findWithoutFail($id, $columns = ['*'])
 * @method CustomFieldValue find($id, $columns = ['*'])
 * @method CustomFieldValue first($columns = ['*'])
 */
class CustomFieldValueRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'custom_field_id',
        'customizable_type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CustomFieldValue::class;
    }
}
