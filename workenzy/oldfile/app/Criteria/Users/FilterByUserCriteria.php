<?php
/**
 * File name: FilterByUserCriteria.php
 * Last modified: 2021.01.02 at 19:12:31
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Criteria\Users;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FilterByUserCriteria.
 *
 * @package namespace App\Criteria;
 */
class FilterByUserCriteria implements CriteriaInterface
{
    private $userId;

    /**
     * DriverOfUserCriteria constructor.
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }


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
        return $model->where(["user_id"=>$this->userId]);
    }
}
