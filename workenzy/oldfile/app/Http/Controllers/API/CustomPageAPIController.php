<?php
/*
 * File name: CustomPageAPIController.php
 * Last modified: 2021.02.24 at 11:10:56
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Repositories\CustomPageRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class CustomPageController
 * @package App\Http\Controllers\API
 */
class CustomPageAPIController extends Controller
{
    /** @var  CustomPageRepository */
    private $customPageRepository;

    public function __construct(CustomPageRepository $customPageRepo)
    {
        $this->customPageRepository = $customPageRepo;
    }

    /**
     * Display a listing of the CustomPage.
     * GET|HEAD /customPages
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $this->customPageRepository->pushCriteria(new RequestCriteria($request));
            $this->customPageRepository->pushCriteria(new LimitOffsetCriteria($request));
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $customPages = $this->customPageRepository->all();
        $this->filterCollection($request, $customPages);

        return $this->sendResponse($customPages->toArray(), 'Custom Pages retrieved successfully');
    }

    /**
     * Display the specified CustomPage.
     * GET|HEAD /customPages/{id}
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function show(int $id, Request $request): JsonResponse
    {
        try {
            $this->customPageRepository->pushCriteria(new RequestCriteria($request));
            $this->customPageRepository->pushCriteria(new LimitOffsetCriteria($request));
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $customPage = $this->customPageRepository->findWithoutFail($id);
        if (empty($customPage)) {
            return $this->sendError(__('lang.not_found', ['operator' => __('lang.custom_page')]));
        }
        $this->filterModel($request, $customPage);

        return $this->sendResponse($customPage->toArray(), 'Custom Page retrieved successfully');
    }
}
