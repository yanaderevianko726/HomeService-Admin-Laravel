<?php
/*
 * File name: DistinctCriteria.php
 * Last modified: 2021.02.11 at 09:26:34
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Criteria\Favorites;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class DistinctCriteria.
 *
 * @package namespace App\Criteria\Favorites;
 */
class DistinctCriteria implements CriteriaInterface
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
        return $model->groupBy('e_service_id');
    }
}
