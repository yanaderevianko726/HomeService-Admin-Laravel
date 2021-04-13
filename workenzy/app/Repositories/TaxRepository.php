<?php
/*
 * File name: TaxRepository.php
 * Last modified: 2021.01.16 at 21:49:02
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Repositories;

use App\Models\Tax;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TaxRepository
 * @package App\Repositories
 * @version January 13, 2021, 11:43 am UTC
 *
 * @method Tax findWithoutFail($id, $columns = ['*'])
 * @method Tax find($id, $columns = ['*'])
 * @method Tax first($columns = ['*'])
 */
class TaxRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'value',
        'type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tax::class;
    }
}
