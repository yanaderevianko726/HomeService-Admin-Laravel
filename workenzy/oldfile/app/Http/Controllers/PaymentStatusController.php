<?php
/*
 * File name: PaymentStatusController.php
 * Last modified: 2021.01.17 at 14:58:55
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers;

use App\DataTables\PaymentStatusDataTable;
use App\Http\Requests\CreatePaymentStatusRequest;
use App\Http\Requests\UpdatePaymentStatusRequest;
use App\Repositories\CustomFieldRepository;
use App\Repositories\PaymentStatusRepository;
use Exception;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;

class PaymentStatusController extends Controller
{
    /** @var  PaymentStatusRepository */
    private $paymentStatusRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;


    public function __construct(PaymentStatusRepository $paymentStatusRepo, CustomFieldRepository $customFieldRepo)
    {
        parent::__construct();
        $this->paymentStatusRepository = $paymentStatusRepo;
        $this->customFieldRepository = $customFieldRepo;

    }

    /**
     * Display a listing of the PaymentStatus.
     *
     * @param PaymentStatusDataTable $paymentStatusDataTable
     * @return Response
     */
    public function index(PaymentStatusDataTable $paymentStatusDataTable)
    {
        return $paymentStatusDataTable->render('payment_statuses.index');
    }

    /**
     * Show the form for creating a new PaymentStatus.
     *
     * @return Response
     */
    public function create()
    {


        $hasCustomField = in_array($this->paymentStatusRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->paymentStatusRepository->model());
            $html = generateCustomField($customFields);
        }
        return view('payment_statuses.create')->with("customFields", isset($html) ? $html : false);
    }

    /**
     * Store a newly created PaymentStatus in storage.
     *
     * @param CreatePaymentStatusRequest $request
     *
     * @return Response
     */
    public function store(CreatePaymentStatusRequest $request)
    {
        $input = $request->all();
        $input['order'] = $input['order'] ?: 0;
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->paymentStatusRepository->model());
        try {
            $paymentStatus = $this->paymentStatusRepository->create($input);
            $paymentStatus->customFieldsValues()->createMany(getCustomFieldsValues($customFields, $request));

        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully', ['operator' => __('lang.payment_status')]));

        return redirect(route('paymentStatuses.index'));
    }

    /**
     * Display the specified PaymentStatus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $paymentStatus = $this->paymentStatusRepository->findWithoutFail($id);

        if (empty($paymentStatus)) {
            Flash::error('Payment Status not found');

            return redirect(route('paymentStatuses.index'));
        }

        return view('payment_statuses.show')->with('paymentStatus', $paymentStatus);
    }

    /**
     * Show the form for editing the specified PaymentStatus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $paymentStatus = $this->paymentStatusRepository->findWithoutFail($id);


        if (empty($paymentStatus)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.payment_status')]));

            return redirect(route('paymentStatuses.index'));
        }
        $customFieldsValues = $paymentStatus->customFieldsValues()->with('customField')->get();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->paymentStatusRepository->model());
        $hasCustomField = in_array($this->paymentStatusRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }

        return view('payment_statuses.edit')->with('paymentStatus', $paymentStatus)->with("customFields", isset($html) ? $html : false);
    }

    /**
     * Update the specified PaymentStatus in storage.
     *
     * @param int $id
     * @param UpdatePaymentStatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaymentStatusRequest $request)
    {
        $paymentStatus = $this->paymentStatusRepository->findWithoutFail($id);

        if (empty($paymentStatus)) {
            Flash::error('Payment Status not found');
            return redirect(route('paymentStatuses.index'));
        }
        $input = $request->all();
        $input['order'] = $input['order'] ?: 0;
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->paymentStatusRepository->model());
        try {
            $paymentStatus = $this->paymentStatusRepository->update($input, $id);


            foreach (getCustomFieldsValues($customFields, $request) as $value) {
                $paymentStatus->customFieldsValues()
                    ->updateOrCreate(['custom_field_id' => $value['custom_field_id']], $value);
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.updated_successfully', ['operator' => __('lang.payment_status')]));

        return redirect(route('paymentStatuses.index'));
    }

    /**
     * Remove the specified PaymentStatus from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paymentStatus = $this->paymentStatusRepository->findWithoutFail($id);

        if (empty($paymentStatus)) {
            Flash::error('Payment Status not found');

            return redirect(route('paymentStatuses.index'));
        }

        $this->paymentStatusRepository->delete($id);

        Flash::success(__('lang.deleted_successfully', ['operator' => __('lang.payment_status')]));

        return redirect(route('paymentStatuses.index'));
    }

    /**
     * Remove Media of PaymentStatus
     * @param Request $request
     */
    public function removeMedia(Request $request)
    {
        $input = $request->all();
        $paymentStatus = $this->paymentStatusRepository->findWithoutFail($input['id']);
        try {
            if ($paymentStatus->hasMedia($input['collection'])) {
                $paymentStatus->getFirstMedia($input['collection'])->delete();
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
