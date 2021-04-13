<?php
/*
 * File name: BookingController.php
 * Last modified: 2021.02.17 at 18:42:59
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers;

use App\Criteria\Addresses\AddressesOfUserCriteria;
use App\Criteria\Bookings\BookingsOfUserCriteria;
use App\DataTables\BookingDataTable;
use App\Http\Requests\CreateBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
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
use Flash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;
use Prettus\Repository\Exceptions\RepositoryException;
use Prettus\Validator\Exceptions\ValidatorException;

class BookingController extends Controller
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
     *
     * @param BookingDataTable $bookingDataTable
     * @return Response
     */
    public function index(BookingDataTable $bookingDataTable)
    {
        return $bookingDataTable->render('bookings.index');
    }

    /**
     * Store a newly created Booking in storage.
     *
     * @param CreateBookingRequest $request
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function store(CreateBookingRequest $request)
    {
        $input = $request->all();
        $address = $this->addressRepository->all()->random();
        $taxes = $this->taxRepository->all();
        $eService = $this->eServiceRepository->all()->random();
        $eProvider = $eService->eProvider;
        $options = $eService->options;

        $user = $this->userRepository->all()->random();
        $bookingStatus = $this->bookingStatusRepository->all()->random();
        $coupon = $this->couponRepository->all()->random();
        $payment = $this->paymentRepository->all()->random();
        $input = [
            'e_provider' => $eProvider,
            'e_service' => $eService,
            'options' => $options,
            'user_id' => $user->id,
            'booking_status_id' => $bookingStatus->id,
            'address' => $address,
            'payment_id' => $payment->id,
            'coupon' => $coupon,
            'taxes' => $taxes,
            'booking_at' => now(),
            'start_at' => now(),
            'ends_at' => now(),
            'hint' => "A hint payed"
        ];
        //dd($input);
        //$customFields = $this->customFieldRepository->findByField('custom_field_model', $this->bookingRepository->model());
        try {
            $booking = $this->bookingRepository->create($input);
//            dd($booking->e_provider);
            //$booking->customFieldsValues()->createMany(getCustomFieldsValues($customFields, $request));

        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully', ['operator' => __('lang.booking')]));

        return redirect(route('bookings.index'));
    }

    /**
     * Display the specified Booking.
     *
     * @param int $id
     *
     * @return Application|Factory|Response|View
     * @throws RepositoryException
     */
    public function show($id)
    {
        $this->bookingRepository->pushCriteria(new BookingsOfUserCriteria(auth()->id()));
        $booking = $this->bookingRepository->findWithoutFail($id);
        $bookingStatuses = $this->bookingStatusRepository->orderBy('order')->all();
        if (empty($booking)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.booking')]));
            return redirect(route('bookings.index'));
        }
        return view('bookings.show')->with('booking', $booking)->with('bookingStatuses', $bookingStatuses);
    }

    /**
     * Show the form for editing the specified Booking.
     *
     * @param int $id
     *
     * @return Application|RedirectResponse|Redirector|Response
     * @throws RepositoryException
     */
    public function edit(int $id)
    {
        $this->bookingRepository->pushCriteria(new BookingsOfUserCriteria(auth()->id()));
        $booking = $this->bookingRepository->findWithoutFail($id);
        if (empty($booking)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.booking')]));
            return redirect(route('bookings.index'));
        }
        array_push($booking->fillable, ['address_id', 'payment_status_id']);
        $booking->address_id = $booking->address->id;
        $bookingStatus = $this->bookingStatusRepository->orderBy('order')->pluck('status', 'id');
        if (!empty($booking->payment_id)) {
            $booking->payment_status_id = $booking->payment->payment_status_id;
            $paymentStatuses = $this->paymentStatusRepository->pluck('status', 'id');
        } else {
            $paymentStatuses = null;
        }
        $addresses = $this->addressRepository->getByCriteria(new AddressesOfUserCriteria($booking->user_id))->pluck('address', 'id');

        $customFieldsValues = $booking->customFieldsValues()->with('customField')->get();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->bookingRepository->model());
        $hasCustomField = in_array($this->bookingRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }
        return view('bookings.edit')->with('booking', $booking)->with("customFields", isset($html) ? $html : false)->with("bookingStatus", $bookingStatus)->with("addresses", $addresses)->with("paymentStatuses", $paymentStatuses);
    }

    /**
     * Update the specified Booking in storage.
     *
     * @param int $id
     * @param UpdateBookingRequest $request
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function update(int $id, UpdateBookingRequest $request)
    {
        $booking = $this->bookingRepository->findWithoutFail($id);
        if (empty($booking)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.booking')]));
            return redirect(route('bookings.index'));
        }
        $input = $request->all();
        $address = $this->addressRepository->findWithoutFail($input['address_id']);
        $input['address'] = $address;
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->bookingRepository->model());
        try {
            $booking = $this->bookingRepository->update($input, $id);
            if (isset($input['payment_status_id'])) {
                $this->paymentRepository->update(
                    ['payment_status_id' => $input['payment_status_id']],
                    $booking->payment_id
                );
            }
            // TODO send notification to customer if the status changed
            foreach (getCustomFieldsValues($customFields, $request) as $value) {
                $booking->customFieldsValues()
                    ->updateOrCreate(['custom_field_id' => $value['custom_field_id']], $value);
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }
        Flash::success(__('lang.updated_successfully', ['operator' => __('lang.booking')]));
        return redirect(route('bookings.index'));
    }

    /**
     * Remove the specified Booking from storage.
     *
     * @param int $id
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function destroy($id)
    {
        if (!config('installer.demo_app')) {
            $this->bookingRepository->pushCriteria(new BookingsOfUserCriteria(auth()->id()));
            $booking = $this->bookingRepository->findWithoutFail($id);

            if (empty($booking)) {
                Flash::error(__('lang.not_found', ['operator' => __('lang.booking')]));

                return redirect(route('bookings.index'));
            }

            $this->bookingRepository->delete($id);

            Flash::success(__('lang.deleted_successfully', ['operator' => __('lang.booking')]));

        } else {
            Flash::warning('This is only demo app you can\'t change this section ');
        }
        return redirect(route('bookings.index'));
    }

}
