<?php
/*
 * File name: CouponAPIController.php
 * Last modified: 2021.02.19 at 02:00:41
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\API;


use App\Criteria\Coupons\ValidCriteria;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Repositories\CouponRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class CouponController
 * @package App\Http\Controllers\API
 */
class CouponAPIController extends Controller
{
    /** @var  CouponRepository */
    private $couponRepository;

    public function __construct(CouponRepository $couponRepo)
    {
        $this->couponRepository = $couponRepo;
    }

    /**
     * Display a listing of the Coupon.
     * GET|HEAD /coupons
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $this->validate($request, [
                'code' => 'required',
            ]);
            $this->couponRepository->pushCriteria(new ValidCriteria($request));
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
//        dd($request->all());
        $coupon = $this->couponRepository->first();

        return $this->sendResponse($coupon, 'Coupons retrieved successfully');
    }

    /**
     * Display the specified Coupon.
     * GET|HEAD /coupons/{id}
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show($id)
    {
        /** @var Coupon $coupon */
        if (!empty($this->couponRepository)) {
            $coupon = $this->couponRepository->findWithoutFail($id);
        }

        if (empty($coupon)) {
            return $this->sendError('Coupon not found');
        }

        return $this->sendResponse($coupon->toArray(), 'Coupon retrieved successfully');
    }
}
