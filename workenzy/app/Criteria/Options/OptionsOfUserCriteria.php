<?php
/*
 * File name: OptionsOfUserCriteria.php
 * Last modified: 2021.01.22 at 21:33:37
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Criteria\Options;

use App\Models\User;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class OptionsOfUserCriteria.
 *
 * @package namespace App\Criteria\Options;
 */
class OptionsOfUserCriteria implements CriteriaInterface
{

    /**
     * @var User
     */
    private $userId;

    /**
     * OptionsOfUserCriteria constructor.
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
        if (auth()->user()->hasRole('admin')) {
            return $model;
        } elseif (auth()->user()->hasRole('provider')) {
            return $model->join('e_services', 'options.e_service_id', '=', 'e_services.id')
                ->join('e_provider_users', 'e_provider_users.e_provider_id', '=', 'e_services.e_provider_id')
                ->groupBy('options.id')
                ->select('options.*')
                ->where('e_provider_users.user_id', $this->userId);
        } else {
            return $model;
        }
    }
}
