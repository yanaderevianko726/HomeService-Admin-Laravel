<?php
/*
 * File name: TaxController.php
 * Last modified: 2021.01.18 at 21:16:52
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers;

use App\DataTables\TaxDataTable;
use App\Http\Requests\CreateTaxRequest;
use App\Http\Requests\UpdateTaxRequest;
use App\Repositories\CustomFieldRepository;
use App\Repositories\TaxRepository;
use Exception;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;

class TaxController extends Controller
{
    /** @var  TaxRepository */
    private $taxRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;


    public function __construct(TaxRepository $taxRepo, CustomFieldRepository $customFieldRepo)
    {
        parent::__construct();
        $this->taxRepository = $taxRepo;
        $this->customFieldRepository = $customFieldRepo;

    }

    /**
     * Display a listing of the Tax.
     *
     * @param TaxDataTable $taxDataTable
     * @return Response
     */
    public function index(TaxDataTable $taxDataTable)
    {
        return $taxDataTable->render('settings.taxes.index');
    }

    /**
     * Show the form for creating a new Tax.
     *
     * @return Response
     */
    public function create()
    {


        $hasCustomField = in_array($this->taxRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->taxRepository->model());
            $html = generateCustomField($customFields);
        }
        return view('settings.taxes.create')->with("customFields", isset($html) ? $html : false);
    }

    /**
     * Store a newly created Tax in storage.
     *
     * @param CreateTaxRequest $request
     *
     * @return Response
     */
    public function store(CreateTaxRequest $request)
    {
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->taxRepository->model());
        try {
            $tax = $this->taxRepository->create($input);
            $tax->customFieldsValues()->createMany(getCustomFieldsValues($customFields, $request));

        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully', ['operator' => __('lang.tax')]));

        return redirect(route('taxes.index'));
    }

    /**
     * Display the specified Tax.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tax = $this->taxRepository->findWithoutFail($id);

        if (empty($tax)) {
            Flash::error('Tax not found');

            return redirect(route('taxes.index'));
        }

        return view('settings.taxes.show')->with('tax', $tax);
    }

    /**
     * Show the form for editing the specified Tax.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tax = $this->taxRepository->findWithoutFail($id);


        if (empty($tax)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.tax')]));

            return redirect(route('taxes.index'));
        }
        $customFieldsValues = $tax->customFieldsValues()->with('customField')->get();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->taxRepository->model());
        $hasCustomField = in_array($this->taxRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }

        return view('settings.taxes.edit')->with('tax', $tax)->with("customFields", isset($html) ? $html : false);
    }

    /**
     * Update the specified Tax in storage.
     *
     * @param int $id
     * @param UpdateTaxRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTaxRequest $request)
    {
        $tax = $this->taxRepository->findWithoutFail($id);

        if (empty($tax)) {
            Flash::error('Tax not found');
            return redirect(route('taxes.index'));
        }
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->taxRepository->model());
        try {
            $tax = $this->taxRepository->update($input, $id);


            foreach (getCustomFieldsValues($customFields, $request) as $value) {
                $tax->customFieldsValues()
                    ->updateOrCreate(['custom_field_id' => $value['custom_field_id']], $value);
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.updated_successfully', ['operator' => __('lang.tax')]));

        return redirect(route('taxes.index'));
    }

    /**
     * Remove the specified Tax from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tax = $this->taxRepository->findWithoutFail($id);

        if (empty($tax)) {
            Flash::error('Tax not found');

            return redirect(route('taxes.index'));
        }

        $this->taxRepository->delete($id);

        Flash::success(__('lang.deleted_successfully', ['operator' => __('lang.tax')]));

        return redirect(route('taxes.index'));
    }

    /**
     * Remove Media of Tax
     * @param Request $request
     */
    public function removeMedia(Request $request)
    {
        $input = $request->all();
        $tax = $this->taxRepository->findWithoutFail($input['id']);
        try {
            if ($tax->hasMedia($input['collection'])) {
                $tax->getFirstMedia($input['collection'])->delete();
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
