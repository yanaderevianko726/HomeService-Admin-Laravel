<?php
/*
 * File name: EServiceController.php
 * Last modified: 2021.02.06 at 13:51:58
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers;

use App\DataTables\EServiceDataTable;
use App\Http\Requests\CreateEServiceRequest;
use App\Http\Requests\UpdateEServiceRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\CustomFieldRepository;
use App\Repositories\EProviderRepository;
use App\Repositories\EServiceRepository;
use App\Repositories\UploadRepository;
use Exception;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;

class EServiceController extends Controller
{
    /** @var  EServiceRepository */
    private $eServiceRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;

    /**
     * @var UploadRepository
     */
    private $uploadRepository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var EProviderRepository
     */
    private $eProviderRepository;

    public function __construct(EServiceRepository $eServiceRepo, CustomFieldRepository $customFieldRepo, UploadRepository $uploadRepo
        , CategoryRepository $categoryRepo
        , EProviderRepository $eProviderRepo)
    {
        parent::__construct();
        $this->eServiceRepository = $eServiceRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->uploadRepository = $uploadRepo;
        $this->categoryRepository = $categoryRepo;
        $this->eProviderRepository = $eProviderRepo;
    }

    /**
     * Display a listing of the EService.
     *
     * @param EServiceDataTable $eServiceDataTable
     * @return Response
     */
    public function index(EServiceDataTable $eServiceDataTable)
    {
        return $eServiceDataTable->render('e_services.index');
    }

    /**
     * Show the form for creating a new EService.
     *
     * @return Response
     */
    public function create()
    {
        $category = $this->categoryRepository->pluck('name', 'id');
        $eProvider = $this->eProviderRepository->pluck('name', 'id');
        $categoriesSelected = [];
        $hasCustomField = in_array($this->eServiceRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->eServiceRepository->model());
            $html = generateCustomField($customFields);
        }
        return view('e_services.create')->with("customFields", isset($html) ? $html : false)->with("category", $category)->with("categoriesSelected", $categoriesSelected)->with("eProvider", $eProvider);
    }

    /**
     * Store a newly created EService in storage.
     *
     * @param CreateEServiceRequest $request
     *
     * @return Response
     */
    public function store(CreateEServiceRequest $request)
    {
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->eServiceRepository->model());
        try {
            $eService = $this->eServiceRepository->create($input);
            $eService->customFieldsValues()->createMany(getCustomFieldsValues($customFields, $request));
            if (isset($input['image']) && $input['image'] && is_array($input['image'])) {
                foreach ($input['image'] as $fileUuid) {
                    $cacheUpload = $this->uploadRepository->getByUuid($fileUuid);
                    $mediaItem = $cacheUpload->getMedia('image')->first();
                    $mediaItem->copy($eService, 'image');
                }
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully', ['operator' => __('lang.e_service')]));

        return redirect(route('eServices.index'));
    }

    /**
     * Display the specified EService.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eService = $this->eServiceRepository->findWithoutFail($id);

        if (empty($eService)) {
            Flash::error('E Service not found');

            return redirect(route('eServices.index'));
        }

        return view('e_services.show')->with('eService', $eService);
    }

    /**
     * Show the form for editing the specified EService.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eService = $this->eServiceRepository->findWithoutFail($id);
        $category = $this->categoryRepository->pluck('name', 'id');
        $eProvider = $this->eProviderRepository->pluck('name', 'id');
        $categoriesSelected = $eService->categories()->pluck('categories.id')->toArray();

        if (empty($eService)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.e_service')]));

            return redirect(route('eServices.index'));
        }
        $customFieldsValues = $eService->customFieldsValues()->with('customField')->get();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->eServiceRepository->model());
        $hasCustomField = in_array($this->eServiceRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }

        return view('e_services.edit')->with('eService', $eService)->with("customFields", isset($html) ? $html : false)->with("category", $category)->with("categoriesSelected", $categoriesSelected)->with("eProvider", $eProvider);
    }

    /**
     * Update the specified EService in storage.
     *
     * @param int $id
     * @param UpdateEServiceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEServiceRequest $request)
    {
        $eService = $this->eServiceRepository->findWithoutFail($id);

        if (empty($eService)) {
            Flash::error('E Service not found');
            return redirect(route('eServices.index'));
        }
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->eServiceRepository->model());
        try {
            $input['categories'] = isset($input['categories']) ? $input['categories'] : [];
            $eService = $this->eServiceRepository->update($input, $id);
            if (isset($input['image']) && $input['image'] && is_array($input['image'])) {
                foreach ($input['image'] as $fileUuid) {
                    $cacheUpload = $this->uploadRepository->getByUuid($fileUuid);
                    $mediaItem = $cacheUpload->getMedia('image')->first();
                    $mediaItem->copy($eService, 'image');
                }
            }
            foreach (getCustomFieldsValues($customFields, $request) as $value) {
                $eService->customFieldsValues()
                    ->updateOrCreate(['custom_field_id' => $value['custom_field_id']], $value);
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.updated_successfully', ['operator' => __('lang.e_service')]));

        return redirect(route('eServices.index'));
    }

    /**
     * Remove the specified EService from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eService = $this->eServiceRepository->findWithoutFail($id);

        if (empty($eService)) {
            Flash::error('E Service not found');

            return redirect(route('eServices.index'));
        }

        $this->eServiceRepository->delete($id);

        Flash::success(__('lang.deleted_successfully', ['operator' => __('lang.e_service')]));

        return redirect(route('eServices.index'));
    }

    /**
     * Remove Media of EService
     * @param Request $request
     */
    public function removeMedia(Request $request)
    {
        $input = $request->all();
        $eService = $this->eServiceRepository->findWithoutFail($input['id']);
        try {
            if ($eService->hasMedia($input['collection'])) {
                $eService->getFirstMedia($input['collection'])->delete();
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
