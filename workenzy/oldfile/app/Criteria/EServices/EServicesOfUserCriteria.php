<?php
/*
 * File name: EServicesOfUserCriteria.php
 * Last modified: 2021.02.22 at 10:53:38
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Criteria\EServices;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class EServicesOfUserCriteria.
 *
 * @package namespace App\Criteria\EServices;
 */
class EServicesOfUserCriteria implements CriteriaInterface
{
    /**
     * @var int
     */
    private $userId;

    /**
     * EServicesOfUserCriteria constructor.
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

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
        if (empty($this->userId) || auth()->user()->hasRole('admin')) {
            return $model;
        } elseif (auth()->user()->hasRole('provider')) {
            return $model->join('e_provider_users', 'e_provider_users.e_provider_id', '=', 'e_services.e_provider_id')
                ->groupBy('e_services.id')
                ->where('e_provider_users.user_id', $this->userId)
                ->select('e_services.*');
        } else {
            return $model;
        }
    }
}
