<?php
/*
 * File name: EServicesOfEProviderCriteria.php
 * Last modified: 2021.02.21 at 14:50:32
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Criteria\EServices;


use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class EServicesOfEProviderCriteria.
 *
 * @package namespace App\Criteria\EServices;
 */
class EServicesOfEProviderCriteria implements CriteriaInterface
{
    /**
     * @var int
     */
    private $eproviderId;

    /**
     * EServicesOfEProviderCriteria constructor.
     */
    public function __construct($eproviderId)
    {
        $this->eproviderId = $eproviderId;
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
        return $model->where('e_provider_id', '=', $this->eproviderId);
    }
}
