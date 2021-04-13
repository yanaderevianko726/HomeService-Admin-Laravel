<?php
/*
 * File name: OptionGroupRepository.php
 * Last modified: 2021.01.22 at 21:03:48
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Repositories;

use App\Models\OptionGroup;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OptionGroupRepository
 * @package App\Repositories
 * @version January 22, 2021, 7:45 pm UTC
 *
 * @method OptionGroup findWithoutFail($id, $columns = ['*'])
 * @method OptionGroup find($id, $columns = ['*'])
 * @method OptionGroup first($columns = ['*'])
 */
class OptionGroupRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'allow_multiple'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return OptionGroup::class;
    }
}
