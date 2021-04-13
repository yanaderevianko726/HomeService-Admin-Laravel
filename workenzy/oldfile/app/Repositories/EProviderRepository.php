<?php
/*
 * File name: EProviderRepository.php
 * Last modified: 2021.01.17 at 17:04:35
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Repositories;

use App\Models\EProvider;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EProviderRepository
 * @package App\Repositories
 * @version January 13, 2021, 11:11 am UTC
 *
 * @method EProvider findWithoutFail($id, $columns = ['*'])
 * @method EProvider find($id, $columns = ['*'])
 * @method EProvider first($columns = ['*'])
 */
class EProviderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'e_provider_type_id',
        'description',
        'phone_number',
        'mobile_number',
        'availability_range',
        'available',
        'featured'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EProvider::class;
    }
}
