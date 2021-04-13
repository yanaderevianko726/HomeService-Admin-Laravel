<?php
/*
 * File name: DashboardController.php
 * Last modified: 2021.02.22 at 14:52:03
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers;

use App\Repositories\BookingRepository;
use App\Repositories\EarningRepository;
use App\Repositories\EProviderRepository;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\View\View;

class DashboardController extends Controller
{

    /** @var  BookingRepository */
    private $bookingRepository;


    /**
     * @var UserRepository
     */
    private $userRepository;

    /** @var  EProviderRepository */
    private $eProviderRepository;
    /** @var  EarningRepository */
    private $earningRepository;

    public function __construct(BookingRepository $bookingRepo, UserRepository $userRepo, EarningRepository $earningRepository, EProviderRepository $eProviderRepo)
    {
        parent::__construct();
        $this->bookingRepository = $bookingRepo;
        $this->userRepository = $userRepo;
        $this->eProviderRepository = $eProviderRepo;
        $this->earningRepository = $earningRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $bookingsCount = $this->bookingRepository->count();
        $membersCount = $this->userRepository->count();
        $eprovidersCount = $this->eProviderRepository->count();
        $eProviders = $this->eProviderRepository->limit(4)->get();
        $earning = $this->earningRepository->all()->sum('total_earning');
        $ajaxEarningUrl = route('payments.byMonth', ['api_token' => auth()->user()->api_token]);
//        dd($ajaxEarningUrl);
        return view('dashboard.index')
            ->with("ajaxEarningUrl", $ajaxEarningUrl)
            ->with("bookingsCount", $bookingsCount)
            ->with("eProvidersCount", $eprovidersCount)
            ->with("eProviders", $eProviders)
            ->with("membersCount", $membersCount)
            ->with("earning", $earning);
    }
}
