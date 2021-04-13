<?php
/*
 * File name: EProviderTypeAPIController.php
 * Last modified: 2021.01.16 at 21:41:16
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\EProviderType;
use App\Repositories\EProviderTypeRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class EProviderTypeController
 * @package App\Http\Controllers\API
 */
class EProviderTypeAPIController extends Controller
{
    /** @var  EProviderTypeRepository */
    private $eProviderTypeRepository;

    public function __construct(EProviderTypeRepository $eProviderTypeRepo)
    {
        $this->eProviderTypeRepository = $eProviderTypeRepo;
    }

    /**
     * Display a listing of the EProviderType.
     * GET|HEAD /eProviderTypes
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $this->eProviderTypeRepository->pushCriteria(new RequestCriteria($request));
            $this->eProviderTypeRepository->pushCriteria(new LimitOffsetCriteria($request));
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $eProviderTypes = $this->eProviderTypeRepository->all();

        return $this->sendResponse($eProviderTypes->toArray(), 'E Provider Types retrieved successfully');
    }

    /**
     * Display the specified EProviderType.
     * GET|HEAD /eProviderTypes/{id}
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show($id)
    {
        /** @var EProviderType $eProviderType */
        if (!empty($this->eProviderTypeRepository)) {
            $eProviderType = $this->eProviderTypeRepository->findWithoutFail($id);
        }

        if (empty($eProviderType)) {
            return $this->sendError('E Provider Type not found');
        }

        return $this->sendResponse($eProviderType->toArray(), 'E Provider Type retrieved successfully');
    }
}
