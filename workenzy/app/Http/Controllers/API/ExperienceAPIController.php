<?php
/*
 * File name: ExperienceAPIController.php
 * Last modified: 2021.01.16 at 21:48:45
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Repositories\ExperienceRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class ExperienceController
 * @package App\Http\Controllers\API
 */
class ExperienceAPIController extends Controller
{
    /** @var  ExperienceRepository */
    private $experienceRepository;

    public function __construct(ExperienceRepository $experienceRepo)
    {
        $this->experienceRepository = $experienceRepo;
    }

    /**
     * Display a listing of the Experience.
     * GET|HEAD /experiences
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $this->experienceRepository->pushCriteria(new RequestCriteria($request));
            $this->experienceRepository->pushCriteria(new LimitOffsetCriteria($request));
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $experiences = $this->experienceRepository->all();

        return $this->sendResponse($experiences->toArray(), 'Experiences retrieved successfully');
    }

    /**
     * Display the specified Experience.
     * GET|HEAD /experiences/{id}
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show($id)
    {
        /** @var Experience $experience */
        if (!empty($this->experienceRepository)) {
            $experience = $this->experienceRepository->findWithoutFail($id);
        }

        if (empty($experience)) {
            return $this->sendError('Experience not found');
        }

        return $this->sendResponse($experience->toArray(), 'Experience retrieved successfully');
    }
}
