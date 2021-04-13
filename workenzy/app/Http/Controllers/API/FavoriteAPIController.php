<?php
/*
 * File name: FavoriteAPIController.php
 * Last modified: 2021.02.11 at 14:03:52
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\API;


use App\Criteria\Favorites\DistinctCriteria;
use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Repositories\FavoriteRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class FavoriteController
 * @package App\Http\Controllers\API
 */
class FavoriteAPIController extends Controller
{
    /** @var  FavoriteRepository */
    private $favoriteRepository;

    public function __construct(FavoriteRepository $favoriteRepo)
    {
        $this->favoriteRepository = $favoriteRepo;
    }

    /**
     * Display a listing of the Favorite.
     * GET|HEAD /favorites
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $this->favoriteRepository->pushCriteria(new RequestCriteria($request));
            $this->favoriteRepository->pushCriteria(new LimitOffsetCriteria($request));
            $this->favoriteRepository->pushCriteria(new DistinctCriteria());
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $favorites = $this->favoriteRepository->all();

        return $this->sendResponse($favorites->toArray(), 'Favorites retrieved successfully');
    }

    /**
     * Display the specified Favorite.
     * GET|HEAD /favorites/{id}
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show($id)
    {
        /** @var Favorite $favorite */
        if (!empty($this->favoriteRepository)) {
            $favorite = $this->favoriteRepository->findWithoutFail($id);
        }

        if (empty($favorite)) {
            return $this->sendError('Favorite not found');
        }

        return $this->sendResponse($favorite->toArray(), 'Favorite retrieved successfully');
    }

    /**
     * Store a newly created Favorite in storage.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();
        try {
//            $favorite = $this->favoriteRepository->updateOrCreate($request->only('user_id','e_service_id','options'),$input);
            $favorite = $this->favoriteRepository->create($input);
        } catch (ValidatorException $e) {
            return $this->sendError('Favorite not found');
        }

        return $this->sendResponse($favorite->toArray(), __('lang.saved_successfully', ['operator' => __('lang.favorite')]));
    }

    /**
     * Update the specified Favorite in storage.
     *
     * @param int $id
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function update($id, Request $request)
    {
        $favorite = $this->favoriteRepository->findWithoutFail($id);

        if (empty($favorite)) {
            return $this->sendError('Favorite not found');
        }
        $input = $request->all();
        try {
            $input['options'] = isset($input['options']) ? $input['options'] : [];
            $favorite = $this->favoriteRepository->update($input, $id);

        } catch (ValidatorException $e) {
            return $this->sendError($e->getMessage());
        }

        return $this->sendResponse($favorite->toArray(), __('lang.updated_successfully', ['operator' => __('lang.favorite')]));

    }

    /**
     * Remove the specified Favorite from storage.
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function destroy($id, Request $request)
    {
        $input = $request->only('user_id', 'e_service_id');
        try {
            $favorite = $this->favoriteRepository->deleteWhere($input) > 0;
        } catch (Exception $e) {
            return $this->sendError('Favorite not found');
        }
        return $this->sendResponse($favorite, __('lang.deleted_successfully', ['operator' => __('lang.favorite')]));

    }
}
