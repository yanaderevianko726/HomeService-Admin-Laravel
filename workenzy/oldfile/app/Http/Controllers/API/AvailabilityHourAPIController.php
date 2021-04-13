<?php
/*
 * File name: AvailabilityHourAPIController.php
 * Last modified: 2021.01.16 at 21:43:36
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\AvailabilityHour;
use App\Repositories\AvailabilityHourRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class AvailabilityHourController
 * @package App\Http\Controllers\API
 */
class AvailabilityHourAPIController extends Controller
{
    /** @var  AvailabilityHourRepository */
    private $availabilityHourRepository;

    public function __construct(AvailabilityHourRepository $availabilityHourRepo)
    {
        $this->availabilityHourRepository = $availabilityHourRepo;
    }

    /**
     * Display a listing of the AvailabilityHour.
     * GET|HEAD /availabilityHours
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $this->availabilityHourRepository->pushCriteria(new RequestCriteria($request));
            $this->availabilityHourRepository->pushCriteria(new LimitOffsetCriteria($request));
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $availabilityHours = $this->availabilityHourRepository->all();

        return $this->sendResponse($availabilityHours->toArray(), 'Availability Hours retrieved successfully');
    }

    /**
     * Display the specified AvailabilityHour.
     * GET|HEAD /availabilityHours/{id}
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show($id)
    {
        /** @var AvailabilityHour $availabilityHour */
        if (!empty($this->availabilityHourRepository)) {
            $availabilityHour = $this->availabilityHourRepository->findWithoutFail($id);
        }

        if (empty($availabilityHour)) {
            return $this->sendError('Availability Hour not found');
        }

        return $this->sendResponse($availabilityHour->toArray(), 'Availability Hour retrieved successfully');
    }
}
