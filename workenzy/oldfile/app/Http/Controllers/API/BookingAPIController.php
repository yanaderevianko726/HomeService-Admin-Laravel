<?php
/*
 * File name: BookingAPIController.php
 * Last modified: 2021.03.08 at 18:10:38
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\API;


use App\Criteria\Bookings\BookingsOfUserCriteria;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Notifications\NewBooking;
use App\Notifications\StatusChangedBooking;
use App\Repositories\AddressRepository;
use App\Repositories\BookingRepository;
use App\Repositories\BookingStatusRepository;
use App\Repositories\CouponRepository;
use App\Repositories\CustomFieldRepository;
use App\Repositories\EProviderRepository;
use App\Repositories\EServiceRepository;
use App\Repositories\NotificationRepository;
use App\Repositories\OptionRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\PaymentStatusRepository;
use App\Repositories\TaxRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\ValidationException;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Log;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;
use Prettus\Validator\Exceptions\ValidatorException;
use function Illuminate\Support\Facades\Log;

/**
 * Class BookingController
 * @package App\Http\Controllers\API
 */
class BookingAPIController extends Controller
{
    /** @var  BookingRepository */
    private $bookingRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var BookingStatusRepository
     */
    private $bookingStatusRepository;
    /**
     * @var PaymentRepository
     */
    private $paymentRepository;
    /**
     * @var NotificationRepository
     */
    private $notificationRepository;
    /**
     * @var AddressRepository
     */
    private $addressRepository;
    /**
     * @var TaxRepository
     */
    private $taxRepository;
    /**
     * @var EServiceRepository
     */
    private $eServiceRepository;
    /**
     * @var EProviderRepository
     */
    private $eProviderRepository;
    /**
     * @var CouponRepository
     */
    private $couponRepository;
    /**
     * @var OptionRepository
     */
    private $optionRepository;
    /**
     * @var PaymentStatusRepository
     */
    private $paymentStatusRepository;

    public function __construct(BookingRepository $bookingRepo, CustomFieldRepository $customFieldRepo, UserRepository $userRepo
        , BookingStatusRepository $bookingStatusRepo, NotificationRepository $notificationRepo, PaymentRepository $paymentRepo, AddressRepository $addressRepository, TaxRepository $taxRepository, EServiceRepository $eServiceRepository, EProviderRepository $eProviderRepository, CouponRepository $couponRepository, OptionRepository $optionRepository, PaymentStatusRepository $paymentStatusRepository)
    {
        parent::__construct();
        $this->bookingRepository = $bookingRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->userRepository = $userRepo;
        $this->bookingStatusRepository = $bookingStatusRepo;
        $this->notificationRepository = $notificationRepo;
        $this->paymentRepository = $paymentRepo;
        $this->addressRepository = $addressRepository;
        $this->taxRepository = $taxRepository;
        $this->eServiceRepository = $eServiceRepository;
        $this->eProviderRepository = $eProviderRepository;
        $this->couponRepository = $couponRepository;
        $this->optionRepository = $optionRepository;
        $this->paymentStatusRepository = $paymentStatusRepository;
    }

    /**
     * Display a listing of the Booking.
     * GET|HEAD /bookings
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $this->bookingRepository->pushCriteria(new RequestCriteria($request));
            $this->bookingRepository->pushCriteria(new BookingsOfUserCriteria(auth()->id()));
            $this->bookingRepository->pushCriteria(new LimitOffsetCriteria($request));
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $bookings = $this->bookingRepository->all();

        return $this->sendResponse($bookings->toArray(), 'Bookings retrieved successfully');
    }

    /**
     * Display the specified Booking.
     * GET|HEAD /bookings/{id}
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show($id, Request $request)
    {
        try {
            $this->bookingRepository->pushCriteria(new RequestCriteria($request));
            $this->bookingRepository->pushCriteria(new LimitOffsetCriteria($request));
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $booking = $this->bookingRepository->findWithoutFail($id);
        if (empty($booking)) {
            return $this->sendError('Booking not found');
        }
        $this->filterModel($request, $booking);
        return $this->sendResponse($booking->toArray(), 'Booking retrieved successfully');


    }

    /**
     * Store a newly created Booking in storage.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $input = $request->all();
        try {
            $this->validate($request, [
                'address.address' => Address::$rules['address'],
                'address.longitude' => Address::$rules['longitude'],
                'address.latitude' => Address::$rules['latitude'],
            ]);
            $address = $this->addressRepository->updateOrCreate(['address' => $input['address']['address']], $input['address']);
            if (empty($address)) {
                return $this->sendError(__('lang.not_found', ['operator', __('lang.address')]));
            } else {
                $input['address'] = $address;
            }
            $eService = $this->eServiceRepository->find($input['e_service']);
            $eProvider = $eService->eProvider;
            $taxes = $eProvider->taxes;
            $input['e_provider'] = $eProvider;
            $input['taxes'] = $taxes;
            $input['e_service'] = $eService;
            if (isset($input['options'])) {
                $input['options'] = $this->optionRepository->findWhereIn('id', $input['options']);
            }
            $input['booking_status_id'] = $this->bookingStatusRepository->find(1)->id;
            if (isset($input['coupon_id'])) {
                $input['coupon'] = $this->couponRepository->find($input['coupon_id']);
            }
            $booking = $this->bookingRepository->create($input);
            Log::info($eProvider->users);
            if (setting('enable_notifications', false)) {
                Notification::send($eProvider->users, new NewBooking($booking));
            }
        } catch (ValidatorException | ModelNotFoundException $e) {
            return $this->sendError($e->getMessage());
        } catch (ValidationException $e) {
            return $this->sendError(array_values($e->errors()));
        }

        return $this->sendResponse($booking->toArray(), __('lang.saved_successfully', ['operator' => __('lang.booking')]));
    }

    /**
     * Update the specified Booking in storage.
     *
     * @param int $id
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function update($id, Request $request): JsonResponse
    {
        $oldBooking = $this->bookingRepository->findWithoutFail($id);
        if (empty($oldBooking)) {
            return $this->sendError('Booking not found');
        }
        // $oldStatus = $oldBooking->payment->status;
        $input = $request->all();
        try {
            $booking = $this->bookingRepository->update($input, $id);
            /*            if (isset($input['booking_status_id']) && $input['booking_status_id'] == 5 && !empty($booking)) {
                            $this->paymentRepository->update(['status' => 'Paid'], $booking['payment_id']);
                        }
                        event(new BookingChangedEvent($oldStatus, $booking));*/

            if (setting('enable_notifications', false)) {
                if (isset($input['booking_status_id']) && $input['booking_status_id'] != $oldBooking->booking_status_id) {
                    if ($booking->bookingStatus->order < 40) {
                        Notification::send([$booking->user], new StatusChangedBooking($booking));
                    } else {
                        Notification::send($booking->e_provider->users, new StatusChangedBooking($booking));
                    }
                }

            }

        } catch (ValidatorException $e) {
            return $this->sendError($e->getMessage());
        }

        return $this->sendResponse($booking->toArray(), __('lang.saved_successfully', ['operator' => __('lang.booking')]));
    }

}
