<?php
/*
 * File name: AvailabilityHourRepository.php
 * Last modified: 2021.01.16 at 21:43:36
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Repositories;

use App\Models\AvailabilityHour;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AvailabilityHourRepository
 * @package App\Repositories
 * @version January 16, 2021, 4:08 pm UTC
 *
 * @method AvailabilityHour findWithoutFail($id, $columns = ['*'])
 * @method AvailabilityHour find($id, $columns = ['*'])
 * @method AvailabilityHour first($columns = ['*'])
 */
class AvailabilityHourRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'day',
        'start_at',
        'end_at',
        'data',
        'e_provider_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AvailabilityHour::class;
    }
}
