<?php
/*
 * File name: PaymentAPIController.php
 * Last modified: 2021.03.08 at 18:10:37
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Notifications\StatusChangedPayment;
use App\Repositories\BookingRepository;
use App\Repositories\PaymentRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class PaymentController
 * @package App\Http\Controllers\API
 */
class PaymentAPIController extends Controller
{
    /** @var  PaymentRepository */
    private $paymentRepository;
    /**
     * @var BookingRepository
     */
    private $bookingRepository;

    public function __construct(PaymentRepository $paymentRepo, BookingRepository $bookingRepo)
    {
        $this->paymentRepository = $paymentRepo;
        $this->bookingRepository = $bookingRepo;
    }

    /**
     * Display a listing of the Payment.
     * GET|HEAD /payments
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $this->paymentRepository->pushCriteria(new RequestCriteria($request));
            $this->paymentRepository->pushCriteria(new LimitOffsetCriteria($request));
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $payments = $this->paymentRepository->all();

        return $this->sendResponse($payments->toArray(), 'Payments retrieved successfully');
    }

    /**
     * Display the specified Payment.
     * GET|HEAD /payments/{id}
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show($id)
    {
        /** @var Payment $payment */
        if (!empty($this->paymentRepository)) {
            $payment = $this->paymentRepository->findWithoutFail($id);
        }

        if (empty($payment)) {
            return $this->sendError('Payment not found');
        }

        return $this->sendResponse($payment->toArray(), 'Payment retrieved successfully');
    }

    /**
     * Store a newly created Payment in storage.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();
        try {
            $booking = $this->bookingRepository->find($input['id']);
            $input['payment']['amount'] = $booking->getTotal();
            $input['payment']['description'] = $booking->hint;
            $input['payment']['payment_status_id'] = 1;
            $input['payment']['user_id'] = $booking->user_id;
            $payment = $this->paymentRepository->create($input['payment']);
            $booking = $this->bookingRepository->update(['payment_id' => $payment->id], $input['id']);
            if (setting('enable_notifications', false)) {
                Notification::send($booking->e_provider->users, new StatusChangedPayment($booking));
            }
        } catch (ValidatorException $e) {
            return $this->sendError(__('lang.not_found', ['operator' => __('lang.payment')]));
        }

        return $this->sendResponse($payment->toArray(), __('lang.saved_successfully', ['operator' => __('lang.payment')]));
    }

    /**
     * Update the specified Payment in storage.
     *
     * @param int $id
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function update(int $id, Request $request): JsonResponse
    {
        // todo payment of provider
        $payment = $this->paymentRepository->findWithoutFail($id);
        if (empty($payment)) {
            return $this->sendError(__('lang.not_found', ['operator' => __('lang.payment')]));
        }
        $input = $request->all();
        try {
            $this->paymentRepository->update($input, $id);
            $payment = $this->paymentRepository->with(['paymentMethod', 'paymentStatus'])->find($id);

            if (setting('enable_notifications', false)) {
                Notification::send($payment->booking->user, new StatusChangedPayment($payment->booking));
            }
        } catch (ValidatorException $e) {
            return $this->sendError($e->getMessage());
        }
        return $this->sendResponse($payment->toArray(), __('lang.saved_successfully', ['operator' => __('lang.booking')]));
    }

    public function byMonth()
    {
        $payments = [];
        if (!empty($this->paymentRepository)) {
            $payments = $this->paymentRepository->orderBy("created_at", 'asc')->all()->map(function ($row) {
                $row['month'] = $row['created_at']->format('M');
                return $row;
            })->groupBy('month')->map(function ($row) {
                return $row->sum('amount');
            });
        }
        return $this->sendResponse([array_values($payments->toArray()), array_keys($payments->toArray())], 'Payment retrieved successfully');
    }
}
