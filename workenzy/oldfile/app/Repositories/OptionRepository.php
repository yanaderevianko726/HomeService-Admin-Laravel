<?php
/*
 * File name: OptionRepository.php
 * Last modified: 2021.01.22 at 21:52:25
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Repositories;

use App\Models\Option;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OptionRepository
 * @package App\Repositories
 * @version January 22, 2021, 8:08 pm UTC
 *
 * @method Option findWithoutFail($id, $columns = ['*'])
 * @method Option find($id, $columns = ['*'])
 * @method Option first($columns = ['*'])
 */
class OptionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'price',
        'e_service_id',
        'option_group_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Option::class;
    }
}
