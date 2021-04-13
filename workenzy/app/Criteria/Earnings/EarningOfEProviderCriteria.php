<?php
/*
 * File name: EarningOfEProviderCriteria.php
 * Last modified: 2021.02.22 at 10:53:38
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Criteria\Earnings;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class EarningOfEProviderCriteriaCriteria.
 *
 * @package namespace App\Criteria\Earnings;
 */
class EarningOfEProviderCriteria implements CriteriaInterface
{
    private $eproviderId;

    /**
     * EarningOfEProviderCriteriaCriteria constructor.
     */
    public function __construct($eproviderId)
    {
        $this->eproviderId = $eproviderId;
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
        return $model->where("e_provider_id", $this->eproviderId);
    }
}
