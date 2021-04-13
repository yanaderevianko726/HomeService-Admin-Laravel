<?php
/*
 * File name: EProviderTypeController.php
 * Last modified: 2021.01.16 at 21:41:16
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers;

use App\DataTables\EProviderTypeDataTable;
use App\Http\Requests\CreateEProviderTypeRequest;
use App\Http\Requests\UpdateEProviderTypeRequest;
use App\Repositories\CustomFieldRepository;
use App\Repositories\EProviderTypeRepository;
use Exception;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;

class EProviderTypeController extends Controller
{
    /** @var  EProviderTypeRepository */
    private $eProviderTypeRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;


    public function __construct(EProviderTypeRepository $eProviderTypeRepo, CustomFieldRepository $customFieldRepo)
    {
        parent::__construct();
        $this->eProviderTypeRepository = $eProviderTypeRepo;
        $this->customFieldRepository = $customFieldRepo;

    }

    /**
     * Display a listing of the EProviderType.
     *
     * @param EProviderTypeDataTable $eProviderTypeDataTable
     * @return Response
     */
    public function index(EProviderTypeDataTable $eProviderTypeDataTable)
    {
        return $eProviderTypeDataTable->render('e_provider_types.index');
    }

    /**
     * Show the form for creating a new EProviderType.
     *
     * @return Response
     */
    public function create()
    {


        $hasCustomField = in_array($this->eProviderTypeRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->eProviderTypeRepository->model());
            $html = generateCustomField($customFields);
        }
        return view('e_provider_types.create')->with("customFields", isset($html) ? $html : false);
    }

    /**
     * Store a newly created EProviderType in storage.
     *
     * @param CreateEProviderTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateEProviderTypeRequest $request)
    {
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->eProviderTypeRepository->model());
        try {
            $eProviderType = $this->eProviderTypeRepository->create($input);
            $eProviderType->customFieldsValues()->createMany(getCustomFieldsValues($customFields, $request));

        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully', ['operator' => __('lang.e_provider_type')]));

        return redirect(route('eProviderTypes.index'));
    }

    /**
     * Display the specified EProviderType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eProviderType = $this->eProviderTypeRepository->findWithoutFail($id);

        if (empty($eProviderType)) {
            Flash::error('E Provider Type not found');

            return redirect(route('eProviderTypes.index'));
        }

        return view('e_provider_types.show')->with('eProviderType', $eProviderType);
    }

    /**
     * Show the form for editing the specified EProviderType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eProviderType = $this->eProviderTypeRepository->findWithoutFail($id);


        if (empty($eProviderType)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.e_provider_type')]));

            return redirect(route('eProviderTypes.index'));
        }
        $customFieldsValues = $eProviderType->customFieldsValues()->with('customField')->get();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->eProviderTypeRepository->model());
        $hasCustomField = in_array($this->eProviderTypeRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }

        return view('e_provider_types.edit')->with('eProviderType', $eProviderType)->with("customFields", isset($html) ? $html : false);
    }

    /**
     * Update the specified EProviderType in storage.
     *
     * @param int $id
     * @param UpdateEProviderTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEProviderTypeRequest $request)
    {
        $eProviderType = $this->eProviderTypeRepository->findWithoutFail($id);

        if (empty($eProviderType)) {
            Flash::error('E Provider Type not found');
            return redirect(route('eProviderTypes.index'));
        }
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->eProviderTypeRepository->model());
        try {
            $eProviderType = $this->eProviderTypeRepository->update($input, $id);


            foreach (getCustomFieldsValues($customFields, $request) as $value) {
                $eProviderType->customFieldsValues()
                    ->updateOrCreate(['custom_field_id' => $value['custom_field_id']], $value);
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.updated_successfully', ['operator' => __('lang.e_provider_type')]));

        return redirect(route('eProviderTypes.index'));
    }

    /**
     * Remove the specified EProviderType from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eProviderType = $this->eProviderTypeRepository->findWithoutFail($id);

        if (empty($eProviderType)) {
            Flash::error('E Provider Type not found');

            return redirect(route('eProviderTypes.index'));
        }

        $this->eProviderTypeRepository->delete($id);

        Flash::success(__('lang.deleted_successfully', ['operator' => __('lang.e_provider_type')]));

        return redirect(route('eProviderTypes.index'));
    }

    /**
     * Remove Media of EProviderType
     * @param Request $request
     */
    public function removeMedia(Request $request)
    {
        $input = $request->all();
        $eProviderType = $this->eProviderTypeRepository->findWithoutFail($input['id']);
        try {
            if ($eProviderType->hasMedia($input['collection'])) {
                $eProviderType->getFirstMedia($input['collection'])->delete();
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
