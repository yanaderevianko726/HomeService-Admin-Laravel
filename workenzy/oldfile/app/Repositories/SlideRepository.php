<?php
/*
 * File name: SlideRepository.php
 * Last modified: 2021.01.25 at 15:38:34
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Repositories;

use App\Models\Slide;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SlideRepository
 * @package App\Repositories
 * @version January 25, 2021, 10:54 am UTC
 *
 * @method Slide findWithoutFail($id, $columns = ['*'])
 * @method Slide find($id, $columns = ['*'])
 * @method Slide first($columns = ['*'])
 */
class SlideRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'order',
        'text',
        'button',
        'text_position',
        'text_color',
        'button_color',
        'background_color',
        'indicator_color',
        'image_fit',
        'e_service_id',
        'e_provider_id',
        'enabled'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Slide::class;
    }
}
