<?php
/*
 * File name: PaymentMethodAPIController.php
 * Last modified: 2021.01.12 at 00:22:28
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Repositories\PaymentMethodRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class PaymentMethodController
 * @package App\Http\Controllers\API
 */
class PaymentMethodAPIController extends Controller
{
    /** @var  PaymentMethodRepository */
    private $paymentMethodRepository;

    public function __construct(PaymentMethodRepository $paymentMethodRepo)
    {
        $this->paymentMethodRepository = $paymentMethodRepo;
    }

    /**
     * Display a listing of the PaymentMethod.
     * GET|HEAD /paymentMethods
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $this->paymentMethodRepository->pushCriteria(new RequestCriteria($request));
            $this->paymentMethodRepository->pushCriteria(new LimitOffsetCriteria($request));
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $paymentMethods = $this->paymentMethodRepository->all();

        return $this->sendResponse($paymentMethods->toArray(), 'Payment Methods retrieved successfully');
    }

    /**
     * Display the specified PaymentMethod.
     * GET|HEAD /paymentMethods/{id}
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show($id)
    {
        /** @var PaymentMethod $paymentMethod */
        if (!empty($this->paymentMethodRepository)) {
            $paymentMethod = $this->paymentMethodRepository->findWithoutFail($id);
        }

        if (empty($paymentMethod)) {
            return $this->sendError('Payment Method not found');
        }

        return $this->sendResponse($paymentMethod->toArray(), 'Payment Method retrieved successfully');
    }
}
