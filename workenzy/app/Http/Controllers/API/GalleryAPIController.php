<?php
/*
 * File name: GalleryAPIController.php
 * Last modified: 2021.03.05 at 23:25:13
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Repositories\GalleryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class GalleryController
 * @package App\Http\Controllers\API
 */
class GalleryAPIController extends Controller
{
    /** @var  GalleryRepository */
    private $galleryRepository;

    public function __construct(GalleryRepository $galleryRepo)
    {
        $this->galleryRepository = $galleryRepo;
        parent::__construct();
    }

    /**
     * Display a listing of the Gallery.
     * GET|HEAD /galleries
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $this->galleryRepository->pushCriteria(new RequestCriteria($request));
            $this->galleryRepository->pushCriteria(new LimitOffsetCriteria($request));
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $galleries = $this->galleryRepository->all();

        return $this->sendResponse($galleries->toArray(), 'Galleries retrieved successfully');
    }

    /**
     * Display the specified Gallery.
     * GET|HEAD /galleries/{id}
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show($id)
    {
        /** @var Gallery $gallery */
        if (!empty($this->galleryRepository)) {
            $gallery = $this->galleryRepository->findWithoutFail($id);
        }

        if (empty($gallery)) {
            return $this->sendError('Gallery not found');
        }

        return $this->sendResponse($gallery->toArray(), 'Gallery retrieved successfully');
    }
}
