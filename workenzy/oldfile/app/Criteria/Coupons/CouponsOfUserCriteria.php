<?php
/*
 * File name: CouponsOfUserCriteria.php
 * Last modified: 2021.01.25 at 19:19:41
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Criteria\Coupons;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class CouponsOfUserCriteria.
 *
 * @package namespace App\Criteria\Coupons;
 */
class CouponsOfUserCriteria implements CriteriaInterface
{
    /**
     * @var int
     */
    private $userId;

    /**
     * CouponsOfUserCriteria constructor.
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
        if (auth()->user()->hasRole('admin')) {
            return $model;
        }elseif (auth()->user()->hasRole('provider')){
            $eProviders = $model->join("discountables", "discountables.coupon_id", "=", "coupons.id")
                ->join("e_provider_users", "e_provider_users.e_provider_id", "=", "discountables.discountable_id")
                ->where('discountable_type', 'App\\Models\\EProvider')
                ->where("e_provider_users.user_id", $this->userId)
                ->select("coupons.*");

            return $model->join("discountables", "discountables.coupon_id", "=", "coupons.id")
                ->join("e_services", "e_services.id", "=", "discountables.discountable_id")
                ->where('discountable_type', 'App\\Models\\EService')
                ->join("e_provider_users", "e_provider_users.e_provider_id", "=", "e_services.e_provider_id")
                ->where("e_provider_users.user_id", $this->userId)
                ->select("coupons.*")
                ->union($eProviders);
        }else{
            return $model;
        }

    }
}
