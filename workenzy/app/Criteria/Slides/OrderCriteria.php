<?php
/*
 * File name: OrderCriteria.php
 * Last modified: 2021.01.31 at 11:52:00
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Criteria\Slides;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class OrderCriteria.
 *
 * @package namespace App\Criteria\Slides;
 */
class OrderCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->orderBy('slides.order', 'asc');
    }
}
