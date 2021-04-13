<?php
/*
 * File name: AcceptedCriteria.php
 * Last modified: 2021.02.05 at 21:04:54
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Criteria\EProviders;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class AcceptedCriteria.
 *
 * @package namespace App\Criteria\EProviders;
 */
class AcceptedCriteria implements CriteriaInterface
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
        return $model->where('e_providers.accepted', '1');
    }
}
