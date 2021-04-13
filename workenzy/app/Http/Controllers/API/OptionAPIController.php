<?php
/*
 * File name: OptionAPIController.php
 * Last modified: 2021.01.22 at 21:52:25
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Repositories\OptionRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class OptionController
 * @package App\Http\Controllers\API
 */
class OptionAPIController extends Controller
{
    /** @var  OptionRepository */
    private $optionRepository;

    public function __construct(OptionRepository $optionRepo)
    {
        $this->optionRepository = $optionRepo;
    }

    /**
     * Display a listing of the Option.
     * GET|HEAD /options
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        try{
            $this->optionRepository->pushCriteria(new RequestCriteria($request));
            $this->optionRepository->pushCriteria(new LimitOffsetCriteria($request));
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $options = $this->optionRepository->all();

        return $this->sendResponse($options->toArray(), 'Options retrieved successfully');
    }

    /**
     * Display the specified Option.
     * GET|HEAD /options/{id}
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show($id)
    {
        /** @var Option $option */
        if (!empty($this->optionRepository)) {
            $option = $this->optionRepository->findWithoutFail($id);
        }

        if (empty($option)) {
            return $this->sendError('Option not found');
        }

        return $this->sendResponse($option->toArray(), 'Option retrieved successfully');
    }
}
