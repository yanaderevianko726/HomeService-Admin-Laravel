<?php
/*
 * File name: ParentBookingController.php
 * Last modified: 2021.02.19 at 21:16:20
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Notifications\NewBooking;
use App\Repositories\BookingRepository;
use App\Repositories\NotificationRepository;
use App\Repositories\PaymentRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Prettus\Validator\Exceptions\ValidatorException;

abstract class ParentBookingController extends Controller
{
    /** @var  BookingRepository */
    protected $bookingRepository;
    /** @var  PaymentRepository */
    protected $paymentRepository;
    /** @var  NotificationRepository */
    protected $notificationRepository;
    /** @var Booking */
    protected $booking;
    /** @var int */
    protected $paymentMethodId;

    /**
     * BookingAPIController constructor.
     * @param BookingRepository $bookingRepo
     * @param PaymentRepository $paymentRepo
     * @param NotificationRepository $notificationRepo
     */
    public function __construct(BookingRepository $bookingRepo, PaymentRepository $paymentRepo, NotificationRepository $notificationRepo)
    {
        parent::__construct();
        $this->bookingRepository = $bookingRepo;
        $this->paymentRepository = $paymentRepo;
        $this->notificationRepository = $notificationRepo;
        $this->booking = new Booking();

        $this->__init();
    }

    abstract public function __init();

    protected function createBooking()
    {
        try {
            $payment = $this->createPayment();
            if ($payment != null) {
                $this->bookingRepository->update(['payment_id' => $payment->id], $this->booking->id);
                $this->sendNotificationToProviders();
            }
        } catch (ValidatorException $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * @return mixed
     * @throws ValidatorException
     */
    protected function createPayment()
    {
        if ($this->booking != null && $this->paymentMethodId != null) {
            $input['amount'] = $this->booking->getTotal();
            $input['description'] = trans("lang.done");
            $input['payment_status_id'] = 2;
            $input['payment_method_id'] = $this->paymentMethodId;
            $input['user_id'] = $this->booking->user_id;
            try {
                return $this->paymentRepository->create($input);
            } catch (ValidatorException $e) {
                Log::error($e->getMessage());
            }
        }
        return null;
    }

    protected function sendNotificationToProviders()
    {
        Notification::send($this->booking->e_provider->users, new NewBooking($this->booking));
    }

}
