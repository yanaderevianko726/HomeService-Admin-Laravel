<?php
/**
 * File name: AdminsCriteria.php
 * Last modified: 2021.01.02 at 19:09:35
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Criteria\Users;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class AdminsCriteria.
 *
 * @package namespace App\Criteria\Users;
 */
class AdminsCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->whereHas("roles", function($q){ $q->where("name", "admin"); });
    }
}
