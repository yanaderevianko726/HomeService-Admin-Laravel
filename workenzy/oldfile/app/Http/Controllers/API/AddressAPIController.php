<?php
/*
 * File name: AddressAPIController.php
 * Last modified: 2021.02.18 at 12:08:19
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Repositories\AddressRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class AddressController
 * @package App\Http\Controllers\API
 */
class AddressAPIController extends Controller
{
    /** @var  AddressRepository */
    private $addressRepository;

    public function __construct(AddressRepository $addressRepo)
    {
        $this->addressRepository = $addressRepo;
    }

    /**
     * Display a listing of the Address.
     * GET|HEAD /addresses
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $this->addressRepository->pushCriteria(new RequestCriteria($request));
            $this->addressRepository->pushCriteria(new LimitOffsetCriteria($request));
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $addresses = $this->addressRepository->all();
        $this->filterCollection($request, $addresses);

        return $this->sendResponse($addresses->toArray(), __('lang.saved_successfully', ['operator' => __('lang.address')]));
    }

    /**
     * Display the specified Address.
     * GET|HEAD /addresses/{id}
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show($id)
    {
        /** @var Address $address */
        if (!empty($this->addressRepository)) {
            $address = $this->addressRepository->findWithoutFail($id);
        }

        if (empty($address)) {
            return $this->sendError('Address not found');
        }

        return $this->sendResponse($address->toArray(), 'Address retrieved successfully');
    }
}
