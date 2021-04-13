<?php
/*
 * File name: DashboardAPIController.php
 * Last modified: 2021.02.21 at 14:56:24
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\API;

use App\Criteria\Bookings\BookingsOfUserCriteria;
use App\Criteria\Earnings\EarningOfUserCriteria;
use App\Criteria\EProviders\EProvidersOfManagerCriteria;
use App\Criteria\EProviders\EProvidersOfUserCriteria;
use App\Criteria\EServices\EServicesOfUserCriteria;
use App\Http\Controllers\Controller;
use App\Repositories\BookingRepository;
use App\Repositories\EarningRepository;
use App\Repositories\EProviderRepository;
use App\Repositories\EServiceRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Repository\Exceptions\RepositoryException;

class DashboardAPIController extends Controller
{
    /** @var  BookingRepository */
    private $bookingRepository;

    /** @var  EProviderRepository */
    private $eproviderRepository;
    /**
     * @var EServiceRepository
     */
    private $eserviceRepository;
    /**
     * @var EarningRepository
     */
    private $earningRepository;

    public function __construct(BookingRepository $bookingRepo, EarningRepository $earningRepository, EProviderRepository $eproviderRepo, EServiceRepository $eserviceRepository)
    {
        parent::__construct();
        $this->bookingRepository = $bookingRepo;
        $this->eproviderRepository = $eproviderRepo;
        $this->eserviceRepository = $eserviceRepository;
        $this->earningRepository = $earningRepository;
    }

    /**
     * Display a listing of the Faq.
     * GET|HEAD /provider/dashboard
     * @param Request $request
     * @return JsonResponse
     */
    public function provider(Request $request): JsonResponse
    {
        $statistics = [];
        try {

            $this->earningRepository->pushCriteria(new EarningOfUserCriteria(auth()->id()));
            $earning['description'] = 'total_earning';
            $earning['value'] = $this->earningRepository->all()->sum('e_provider_earning');
            $statistics[] = $earning;

            $this->bookingRepository->pushCriteria(new BookingsOfUserCriteria(auth()->id()));
            $bookingsCount['description'] = "total_bookings";
            $bookingsCount['value'] = $this->bookingRepository->all('bookings.id')->count();
            $statistics[] = $bookingsCount;

            $this->eproviderRepository->pushCriteria(new EProvidersOfUserCriteria(auth()->id()));
            $eprovidersCount['description'] = "total_e_providers";
            $eprovidersCount['value'] = $this->eproviderRepository->all('e_providers.id')->count();
            $statistics[] = $eprovidersCount;

            $this->eserviceRepository->pushCriteria(new EServicesOfUserCriteria(auth()->id()));
            $eservicesCount['description'] = "total_e_services";
            $eservicesCount['value'] = $this->eserviceRepository->all('e_services.id')->count();
            $statistics[] = $eservicesCount;


        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }

        return $this->sendResponse($statistics, 'Statistics retrieved successfully');
    }
}
