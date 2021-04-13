<?php
/*
 * File name: BookingsOfProviderCriteria.php
 * Last modified: 2021.02.22 at 14:52:03
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Criteria\Bookings;

use Illuminate\Support\Facades\DB;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class BookingsOfProviderCriteria.
 *
 * @package namespace App\Criteria\Bookings;
 */
class BookingsOfProviderCriteria implements CriteriaInterface
{
    /**
     * @var int
     */
    private $eProviderId;

    /**
     * BookingsOfProviderCriteria constructor.
     */
    public function __construct($eProviderId)
    {
        $this->eProviderId = $eProviderId;
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
        $eProviderId = DB::raw("json_extract(e_provider, '$.id')");
        return $model->where($eProviderId, $this->eProviderId)
            ->where('payment_status_id', '2')
            ->groupBy('bookings.id')
            ->select('bookings.*');

    }
}
