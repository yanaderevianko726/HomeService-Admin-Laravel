<?php
/*
 * File name: EProviderAPIController.php
 * Last modified: 2021.02.05 at 21:03:34
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\API\EProvider;


use App\Criteria\EProviders\EProvidersOfUserCriteria;
use App\Criteria\EProviders\NearCriteria;
use App\Http\Controllers\Controller;
use App\Models\EProvider;
use App\Repositories\CustomFieldRepository;
use App\Repositories\EProviderRepository;
use App\Repositories\UploadRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class EProviderController
 * @package App\Http\Controllers\API
 */
class EProviderAPIController extends Controller
{
    /** @var  EProviderRepository */
    private $eproviderRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;

    /**
     * @var UploadRepository
     */
    private $uploadRepository;


    public function __construct(EProviderRepository $eproviderRepo, CustomFieldRepository $customFieldRepo, UploadRepository $uploadRepo)
    {
        parent::__construct();
        $this->eproviderRepository = $eproviderRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->uploadRepository = $uploadRepo;

    }

    /**
     * Display a listing of the EProvider.
     * GET|HEAD /eproviders
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $this->eproviderRepository->pushCriteria(new RequestCriteria($request));
            $this->eproviderRepository->pushCriteria(new LimitOffsetCriteria($request));
            $this->eproviderRepository->pushCriteria(new EProvidersOfUserCriteria(auth()->id()));
            //$this->eproviderRepository->pushCriteria(new EProvidersOfFieldsCriteria($request));
//            if ($request->has('popular')) {
//                $this->eproviderRepository->pushCriteria(new PopularCriteria($request));
//            } else {
//                $this->eproviderRepository->pushCriteria(new NearCriteria($request));
//            }
//            $this->eproviderRepository->pushCriteria(new AcceptedCriteria());
            $eproviders = $this->eproviderRepository->all();

        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }

        return $this->sendResponse($eproviders->toArray(), 'EProviders retrieved successfully');
    }

    /**
     * Display the specified EProvider.
     * GET|HEAD /eproviders/{id}
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show(Request $request, $id)
    {
        /** @var EProvider $eprovider */
        if (!empty($this->eproviderRepository)) {
            try {
                $this->eproviderRepository->pushCriteria(new RequestCriteria($request));
                $this->eproviderRepository->pushCriteria(new LimitOffsetCriteria($request));
                if ($request->has(['myLon', 'myLat', 'areaLon', 'areaLat'])) {
                    $this->eproviderRepository->pushCriteria(new NearCriteria($request));
                }
            } catch (RepositoryException $e) {
                return $this->sendError($e->getMessage());
            }
            $eprovider = $this->eproviderRepository->findWithoutFail($id);
        }

        if (empty($eprovider)) {
            return $this->sendError('EProvider not found');
        }

        return $this->sendResponse($eprovider->toArray(), 'EProvider retrieved successfully');
    }

    /**
     * Store a newly created EProvider in storage.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();
        if (auth()->user()->hasRole('manager')) {
            $input['users'] = [auth()->id()];
        }
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->eproviderRepository->model());
        try {
            $eprovider = $this->eproviderRepository->create($input);
            $eprovider->customFieldsValues()->createMany(getCustomFieldsValues($customFields, $request));
            if (isset($input['image']) && $input['image']) {
                $cacheUpload = $this->uploadRepository->getByUuid($input['image']);
                $mediaItem = $cacheUpload->getMedia('image')->first();
                $mediaItem->copy($eprovider, 'image');
            }
        } catch (ValidatorException $e) {
            return $this->sendError($e->getMessage());
        }

        return $this->sendResponse($eprovider->toArray(), __('lang.saved_successfully', ['operator' => __('lang.eprovider')]));
    }

    /**
     * Update the specified EProvider in storage.
     *
     * @param int $id
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function update($id, Request $request)
    {
        $eprovider = $this->eproviderRepository->findWithoutFail($id);

        if (empty($eprovider)) {
            return $this->sendError('EProvider not found');
        }
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->eproviderRepository->model());
        try {
            $eprovider = $this->eproviderRepository->update($input, $id);
            $input['users'] = isset($input['users']) ? $input['users'] : [];
            $input['drivers'] = isset($input['drivers']) ? $input['drivers'] : [];
            if (isset($input['image']) && $input['image']) {
                $cacheUpload = $this->uploadRepository->getByUuid($input['image']);
                $mediaItem = $cacheUpload->getMedia('image')->first();
                $mediaItem->copy($eprovider, 'image');
            }
            foreach (getCustomFieldsValues($customFields, $request) as $value) {
                $eprovider->customFieldsValues()
                    ->updateOrCreate(['custom_field_id' => $value['custom_field_id']], $value);
            }
        } catch (ValidatorException $e) {
            return $this->sendError($e->getMessage());
        }

        return $this->sendResponse($eprovider->toArray(), __('lang.updated_successfully', ['operator' => __('lang.eprovider')]));
    }

    /**
     * Remove the specified EProvider from storage.
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $eprovider = $this->eproviderRepository->findWithoutFail($id);

        if (empty($eprovider)) {
            return $this->sendError('EProvider not found');
        }

        $eprovider = $this->eproviderRepository->delete($id);

        return $this->sendResponse($eprovider, __('lang.deleted_successfully', ['operator' => __('lang.eprovider')]));
    }
}
