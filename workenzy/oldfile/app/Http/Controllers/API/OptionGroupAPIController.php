<?php
/*
 * File name: OptionGroupAPIController.php
 * Last modified: 2021.02.07 at 21:56:54
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\OptionGroup;
use App\Repositories\OptionGroupRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class OptionGroupController
 * @package App\Http\Controllers\API
 */
class OptionGroupAPIController extends Controller
{
    /** @var  OptionGroupRepository */
    private $optionGroupRepository;

    public function __construct(OptionGroupRepository $optionGroupRepo)
    {
        $this->optionGroupRepository = $optionGroupRepo;
    }

    /**
     * Display a listing of the OptionGroup.
     * GET|HEAD /optionGroups
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $this->optionGroupRepository->pushCriteria(new RequestCriteria($request));
            $this->optionGroupRepository->pushCriteria(new LimitOffsetCriteria($request));
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $optionGroups = $this->optionGroupRepository->all();
        $this->filterCollection($request, $optionGroups);

        return $this->sendResponse($optionGroups->toArray(), 'Option Groups retrieved successfully');
    }

    /**
     * Display the specified OptionGroup.
     * GET|HEAD /optionGroups/{id}
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show($id)
    {
        /** @var OptionGroup $optionGroup */
        if (!empty($this->optionGroupRepository)) {
            $optionGroup = $this->optionGroupRepository->findWithoutFail($id);
        }

        if (empty($optionGroup)) {
            return $this->sendError('Option Group not found');
        }

        return $this->sendResponse($optionGroup->toArray(), 'Option Group retrieved successfully');
    }
}
