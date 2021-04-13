<?php
/*
 * File name: BookingStatusRepository.php
 * Last modified: 2021.01.25 at 22:00:21
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Repositories;

use App\Models\BookingStatus;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BookingStatusRepository
 * @package App\Repositories
 * @version January 25, 2021, 7:18 pm UTC
 *
 * @method BookingStatus findWithoutFail($id, $columns = ['*'])
 * @method BookingStatus find($id, $columns = ['*'])
 * @method BookingStatus first($columns = ['*'])
 */
class BookingStatusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status',
        'order'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BookingStatus::class;
    }
}
