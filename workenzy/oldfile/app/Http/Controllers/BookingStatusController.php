<?php
/*
 * File name: BookingStatusController.php
 * Last modified: 2021.01.25 at 22:00:21
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers;

use App\DataTables\BookingStatusDataTable;
use App\Http\Requests\CreateBookingStatusRequest;
use App\Http\Requests\UpdateBookingStatusRequest;
use App\Repositories\BookingStatusRepository;
use App\Repositories\CustomFieldRepository;
use Exception;
use Flash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;
use Prettus\Validator\Exceptions\ValidatorException;

class BookingStatusController extends Controller
{
    /** @var  BookingStatusRepository */
    private $bookingStatusRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;



    public function __construct(BookingStatusRepository $bookingStatusRepo, CustomFieldRepository $customFieldRepo )
    {
        parent::__construct();
        $this->bookingStatusRepository = $bookingStatusRepo;
        $this->customFieldRepository = $customFieldRepo;

    }

    /**
     * Display a listing of the BookingStatus.
     *
     * @param BookingStatusDataTable $bookingStatusDataTable
     * @return Response
     */
    public function index(BookingStatusDataTable $bookingStatusDataTable)
    {
        return $bookingStatusDataTable->render('booking_statuses.index');
    }

    /**
     * Show the form for creating a new BookingStatus.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {


        $hasCustomField = in_array($this->bookingStatusRepository->model(),setting('custom_field_models',[]));
            if($hasCustomField){
                $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->bookingStatusRepository->model());
                $html = generateCustomField($customFields);
            }
        return view('booking_statuses.create')->with("customFields", isset($html) ? $html : false);
    }

    /**
     * Store a newly created BookingStatus in storage.
     *
     * @param CreateBookingStatusRequest $request
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function store(CreateBookingStatusRequest $request)
    {
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->bookingStatusRepository->model());
        try {
            $bookingStatus = $this->bookingStatusRepository->create($input);
            $bookingStatus->customFieldsValues()->createMany(getCustomFieldsValues($customFields,$request));

        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully',['operator' => __('lang.booking_status')]));

        return redirect(route('bookingStatuses.index'));
    }

    /**
     * Display the specified BookingStatus.
     *
     * @param int $id
     *
     * @return Application|Factory|Response|View
     */
    public function show($id)
    {
        $bookingStatus = $this->bookingStatusRepository->findWithoutFail($id);

        if (empty($bookingStatus)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.booking_status')]));
            return redirect(route('bookingStatuses.index'));
        }
        return view('booking_statuses.show')->with('bookingStatus', $bookingStatus);
    }

    /**
     * Show the form for editing the specified BookingStatus.
     *
     * @param int $id
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function edit($id)
    {
        $bookingStatus = $this->bookingStatusRepository->findWithoutFail($id);


        if (empty($bookingStatus)) {
            Flash::error(__('lang.not_found',['operator' => __('lang.booking_status')]));

            return redirect(route('bookingStatuses.index'));
        }
        $customFieldsValues = $bookingStatus->customFieldsValues()->with('customField')->get();
        $customFields =  $this->customFieldRepository->findByField('custom_field_model', $this->bookingStatusRepository->model());
        $hasCustomField = in_array($this->bookingStatusRepository->model(),setting('custom_field_models',[]));
        if($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }
        return view('booking_statuses.edit')->with('bookingStatus', $bookingStatus)->with("customFields", isset($html) ? $html : false);
    }

    /**
     * Update the specified BookingStatus in storage.
     *
     * @param int $id
     * @param UpdateBookingStatusRequest $request
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function update($id, UpdateBookingStatusRequest $request)
    {
        $bookingStatus = $this->bookingStatusRepository->findWithoutFail($id);

        if (empty($bookingStatus)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.booking_status')]));
            return redirect(route('bookingStatuses.index'));
        }
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->bookingStatusRepository->model());
        try {
            $bookingStatus = $this->bookingStatusRepository->update($input, $id);


            foreach (getCustomFieldsValues($customFields, $request) as $value){
                $bookingStatus->customFieldsValues()
                    ->updateOrCreate(['custom_field_id'=>$value['custom_field_id']],$value);
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }
        Flash::success(__('lang.updated_successfully',['operator' => __('lang.booking_status')]));
        return redirect(route('bookingStatuses.index'));
    }

    /**
     * Remove the specified BookingStatus from storage.
     *
     * @param int $id
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function destroy($id)
    {
        $bookingStatus = $this->bookingStatusRepository->findWithoutFail($id);

        if (empty($bookingStatus)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.booking_status')]));

            return redirect(route('bookingStatuses.index'));
        }

        $this->bookingStatusRepository->delete($id);

        Flash::success(__('lang.deleted_successfully',['operator' => __('lang.booking_status')]));
        return redirect(route('bookingStatuses.index'));
    }

        /**
     * Remove Media of BookingStatus
     * @param Request $request
     */
    public function removeMedia(Request $request)
    {
        $input = $request->all();
        $bookingStatus = $this->bookingStatusRepository->findWithoutFail($input['id']);
        try {
            if ($bookingStatus->hasMedia($input['collection'])) {
                $bookingStatus->getFirstMedia($input['collection'])->delete();
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

}
