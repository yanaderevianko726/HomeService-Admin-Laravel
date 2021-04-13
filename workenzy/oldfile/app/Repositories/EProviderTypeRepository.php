<?php
/*
 * File name: EProviderTypeRepository.php
 * Last modified: 2021.01.16 at 21:41:16
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Repositories;

use App\Models\EProviderType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EProviderTypeRepository
 * @package App\Repositories
 * @version January 13, 2021, 10:56 am UTC
 *
 * @method EProviderType findWithoutFail($id, $columns = ['*'])
 * @method EProviderType find($id, $columns = ['*'])
 * @method EProviderType first($columns = ['*'])
 */
class EProviderTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'commission',
        'disabled'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EProviderType::class;
    }
}
