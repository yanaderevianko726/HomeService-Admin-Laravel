<?php
/*
 * File name: AvailabilityHourController.php
 * Last modified: 2021.01.16 at 17:26:46
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers;

use App\DataTables\AvailabilityHourDataTable;
use App\Http\Requests\CreateAvailabilityHourRequest;
use App\Http\Requests\UpdateAvailabilityHourRequest;
use App\Repositories\AvailabilityHourRepository;
use App\Repositories\CustomFieldRepository;
use App\Repositories\EProviderRepository;
use Flash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;
use Prettus\Validator\Exceptions\ValidatorException;

class AvailabilityHourController extends Controller
{
    /** @var  AvailabilityHourRepository */
    private $availabilityHourRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;

    /**
     * @var EProviderRepository
     */
    private $eProviderRepository;

    public function __construct(AvailabilityHourRepository $availabilityHourRepo, CustomFieldRepository $customFieldRepo, EProviderRepository $eProviderRepo)
    {
        parent::__construct();
        $this->availabilityHourRepository = $availabilityHourRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->eProviderRepository = $eProviderRepo;
    }

    /**
     * Display a listing of the AvailabilityHour.
     *
     * @param AvailabilityHourDataTable $availabilityHourDataTable
     * @return Response
     */
    public function index(AvailabilityHourDataTable $availabilityHourDataTable)
    {
        return $availabilityHourDataTable->render('availability_hours.index');
    }

    /**
     * Show the form for creating a new AvailabilityHour.
     *
     * @return View
     */
    public function create(): View
    {
        $eProvider = $this->eProviderRepository->pluck('name', 'id');

        $hasCustomField = in_array($this->availabilityHourRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->availabilityHourRepository->model());
            $html = generateCustomField($customFields);
        }
        return view('availability_hours.create')->with("customFields", isset($html) ? $html : false)->with("eProvider", $eProvider);
    }

    /**
     * Store a newly created AvailabilityHour in storage.
     *
     * @param CreateAvailabilityHourRequest $request
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function store(CreateAvailabilityHourRequest $request)
    {
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->availabilityHourRepository->model());
        try {
            $availabilityHour = $this->availabilityHourRepository->create($input);
            $availabilityHour->customFieldsValues()->createMany(getCustomFieldsValues($customFields, $request));

        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully', ['operator' => __('lang.availability_hour')]));

        return redirect(route('availabilityHours.index'));
    }

    /**
     * Display the specified AvailabilityHour.
     *
     * @param int $id
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function show(int $id)
    {
        $availabilityHour = $this->availabilityHourRepository->findWithoutFail($id);

        if (empty($availabilityHour)) {
            Flash::error('Availability Hour not found');

            return redirect(route('availabilityHours.index'));
        }

        return view('availability_hours.show')->with('availabilityHour', $availabilityHour);
    }

    /**
     * Show the form for editing the specified AvailabilityHour.
     *
     * @param int $id
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function edit(int $id)
    {
        $availabilityHour = $this->availabilityHourRepository->findWithoutFail($id);
        $eProvider = $this->eProviderRepository->pluck('name', 'id');


        if (empty($availabilityHour)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.availability_hour')]));

            return redirect(route('availabilityHours.index'));
        }
        $customFieldsValues = $availabilityHour->customFieldsValues()->with('customField')->get();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->availabilityHourRepository->model());
        $hasCustomField = in_array($this->availabilityHourRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }

        return view('availability_hours.edit')->with('availabilityHour', $availabilityHour)->with("customFields", isset($html) ? $html : false)->with("eProvider", $eProvider);
    }

    /**
     * Update the specified AvailabilityHour in storage.
     *
     * @param int $id
     * @param UpdateAvailabilityHourRequest $request
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function update(int $id, UpdateAvailabilityHourRequest $request)
    {
        $availabilityHour = $this->availabilityHourRepository->findWithoutFail($id);

        if (empty($availabilityHour)) {
            Flash::error('Availability Hour not found');
            return redirect(route('availabilityHours.index'));
        }
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->availabilityHourRepository->model());
        try {
            $availabilityHour = $this->availabilityHourRepository->update($input, $id);


            foreach (getCustomFieldsValues($customFields, $request) as $value) {
                $availabilityHour->customFieldsValues()
                    ->updateOrCreate(['custom_field_id' => $value['custom_field_id']], $value);
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.updated_successfully', ['operator' => __('lang.availability_hour')]));

        return redirect(route('availabilityHours.index'));
    }

    /**
     * Remove the specified AvailabilityHour from storage.
     *
     * @param int $id
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function destroy(int $id)
    {
        $availabilityHour = $this->availabilityHourRepository->findWithoutFail($id);

        if (empty($availabilityHour)) {
            Flash::error('Availability Hour not found');

            return redirect(route('availabilityHours.index'));
        }

        $this->availabilityHourRepository->delete($id);

        Flash::success(__('lang.deleted_successfully', ['operator' => __('lang.availability_hour')]));

        return redirect(route('availabilityHours.index'));
    }
}
