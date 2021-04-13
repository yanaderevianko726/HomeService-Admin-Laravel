<?php
/*
 * File name: EProviderAPIController.php
 * Last modified: 2021.02.21 at 19:06:49
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Repositories\EProviderRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class EProviderController
 * @package App\Http\Controllers\API
 */
class EProviderAPIController extends Controller
{
    /** @var  EProviderRepository */
    private $eProviderRepository;

    public function __construct(EProviderRepository $eProviderRepo)
    {
        $this->eProviderRepository = $eProviderRepo;
    }

    /**
     * Display a listing of the EProvider.
     * GET|HEAD /eProviders
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $this->eProviderRepository->pushCriteria(new RequestCriteria($request));
            $this->eProviderRepository->pushCriteria(new LimitOffsetCriteria($request));
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $eProviders = $this->eProviderRepository->all();
        $this->filterCollection($request, $eProviders);

        return $this->sendResponse($eProviders->toArray(), 'E Providers retrieved successfully');
    }

    /**
     * Display the specified EProvider.
     * GET|HEAD /eProviders/{id}
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show(int $id, Request $request): JsonResponse
    {
        try {
            $this->eProviderRepository->pushCriteria(new RequestCriteria($request));
            $this->eProviderRepository->pushCriteria(new LimitOffsetCriteria($request));
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $eProvider = $this->eProviderRepository->findWithoutFail($id);
        if (empty($eProvider)) {
            return $this->sendError('EProvider not found');
        }
        $this->filterModel($request, $eProvider);

        return $this->sendResponse($eProvider->toArray(), 'EProvider retrieved successfully');
    }
}
