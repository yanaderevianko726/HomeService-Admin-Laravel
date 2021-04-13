<?php
/*
 * File name: BookingStatusAPIController.php
 * Last modified: 2021.02.12 at 11:06:02
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\BookingStatus;
use App\Repositories\BookingStatusRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class BookingStatusController
 * @package App\Http\Controllers\API
 */
class BookingStatusAPIController extends Controller
{
    /** @var  BookingStatusRepository */
    private $bookingStatusRepository;

    public function __construct(BookingStatusRepository $bookingStatusRepo)
    {
        $this->bookingStatusRepository = $bookingStatusRepo;
    }

    /**
     * Display a listing of the BookingStatus.
     * GET|HEAD /bookingStatuses
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        try{
            $this->bookingStatusRepository->pushCriteria(new RequestCriteria($request));
            $this->bookingStatusRepository->pushCriteria(new LimitOffsetCriteria($request));
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $bookingStatuses = $this->bookingStatusRepository->all();
        $this->filterCollection($request, $bookingStatuses);

        return $this->sendResponse($bookingStatuses->toArray(), 'Booking Statuses retrieved successfully');
    }

    /**
     * Display the specified BookingStatus.
     * GET|HEAD /bookingStatuses/{id}
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show($id)
    {
        /** @var BookingStatus $bookingStatus */
        if (!empty($this->bookingStatusRepository)) {
            $bookingStatus = $this->bookingStatusRepository->findWithoutFail($id);
        }

        if (empty($bookingStatus)) {
            return $this->sendError('Booking Status not found');
        }

        return $this->sendResponse($bookingStatus->toArray(), 'Booking Status retrieved successfully');
    }
}
