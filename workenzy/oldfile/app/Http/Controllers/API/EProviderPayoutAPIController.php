<?php
/*
 * File name: EProviderPayoutAPIController.php
 * Last modified: 2021.01.30 at 16:06:30
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\EProviderPayout;
use App\Repositories\EProviderPayoutRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class EProviderPayoutController
 * @package App\Http\Controllers\API
 */
class EProviderPayoutAPIController extends Controller
{
    /** @var  EProviderPayoutRepository */
    private $eProviderPayoutRepository;

    public function __construct(EProviderPayoutRepository $eProviderPayoutRepo)
    {
        $this->eProviderPayoutRepository = $eProviderPayoutRepo;
    }

    /**
     * Display a listing of the EProviderPayout.
     * GET|HEAD /eProviderPayouts
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $this->eProviderPayoutRepository->pushCriteria(new RequestCriteria($request));
            $this->eProviderPayoutRepository->pushCriteria(new LimitOffsetCriteria($request));
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $eProviderPayouts = $this->eProviderPayoutRepository->all();

        return $this->sendResponse($eProviderPayouts->toArray(), 'E Provider Payouts retrieved successfully');
    }

    /**
     * Display the specified EProviderPayout.
     * GET|HEAD /eProviderPayouts/{id}
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show($id)
    {
        /** @var EProviderPayout $eProviderPayout */
        if (!empty($this->eProviderPayoutRepository)) {
            $eProviderPayout = $this->eProviderPayoutRepository->findWithoutFail($id);
        }

        if (empty($eProviderPayout)) {
            return $this->sendError('E Provider Payout not found');
        }

        return $this->sendResponse($eProviderPayout->toArray(), 'E Provider Payout retrieved successfully');
    }
}
