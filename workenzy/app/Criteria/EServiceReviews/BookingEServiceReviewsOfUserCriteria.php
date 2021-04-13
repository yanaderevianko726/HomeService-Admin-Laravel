<?php
/*
 * File name: BookingEServiceReviewsOfUserCriteria.php
 * Last modified: 2021.02.21 at 14:50:32
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Criteria\EServiceReviews;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class BookingEServiceReviewsOfUserCriteria.
 *
 * @package namespace App\Criteria\EServiceReviews;
 */
class BookingEServiceReviewsOfUserCriteria implements CriteriaInterface
{
    /**
     * @var int
     */
    private $userId;

    /**
     * BookingEServiceReviewsOfUserCriteria constructor.
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
            return $model->select('e_service_reviews.*');
        } else if (auth()->user()->hasRole('provider')) {
            return $model->join("e_services", "e_services.id", "=", "e_service_reviews.e_service_id")
                ->join("e_provider_users", "e_provider_users.e_provider_id", "=", "e_services.e_provider_id")
                ->where('e_provider_users.user_id', $this->userId)
                ->groupBy('e_service_reviews.id')
                ->select('e_service_reviews.*');

        } else if (auth()->user()->hasRole('customer')) {
            return $model->newQuery()->join("e_services", "e_services.id", "=", "e_service_reviews.e_service_id")
                ->join("e_service_bookings", "e_service_bookings.e_service_id", "=", "e_services.id")
                ->join("bookings", "e_service_bookings.booking_id", "=", "bookings.id")
                ->where('bookings.user_id', $this->userId)
                ->groupBy('e_service_reviews.id')
                ->select('e_service_reviews.*');
        } else {
            return $model->select('e_service_reviews.*');
        }
    }
}
