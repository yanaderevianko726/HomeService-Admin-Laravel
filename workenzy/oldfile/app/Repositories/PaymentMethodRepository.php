<?php
/*
 * File name: PaymentMethodRepository.php
 * Last modified: 2021.01.12 at 00:22:28
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Repositories;

use App\Models\PaymentMethod;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PaymentMethodRepository
 * @package App\Repositories
 * @version January 7, 2021, 4:26 pm UTC
 *
 * @method PaymentMethod findWithoutFail($id, $columns = ['*'])
 * @method PaymentMethod find($id, $columns = ['*'])
 * @method PaymentMethod first($columns = ['*'])
 */
class PaymentMethodRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'route',
        'order',
        'default',
        'enabled'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PaymentMethod::class;
    }
}
