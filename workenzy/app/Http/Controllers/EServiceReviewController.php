<?php
/*
 * File name: EServiceReviewController.php
 * Last modified: 2021.01.23 at 21:01:17
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers;

use App\DataTables\EServiceReviewDataTable;
use App\Http\Requests\CreateEServiceReviewRequest;
use App\Http\Requests\UpdateEServiceReviewRequest;
use App\Repositories\CustomFieldRepository;
use App\Repositories\EServiceRepository;
use App\Repositories\EServiceReviewRepository;
use App\Repositories\UserRepository;
use Exception;
use Flash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;
use Prettus\Validator\Exceptions\ValidatorException;

class EServiceReviewController extends Controller
{
    /** @var  EServiceReviewRepository */
    private $eServiceReviewRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var EServiceRepository
     */
    private $eServiceRepository;

    public function __construct(EServiceReviewRepository $eServiceReviewRepo, CustomFieldRepository $customFieldRepo, UserRepository $userRepo
        , EServiceRepository $eServiceRepo)
    {
        parent::__construct();
        $this->eServiceReviewRepository = $eServiceReviewRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->userRepository = $userRepo;
        $this->eServiceRepository = $eServiceRepo;
    }

    /**
     * Display a listing of the EServiceReview.
     *
     * @param EServiceReviewDataTable $eServiceReviewDataTable
     * @return Response
     */
    public function index(EServiceReviewDataTable $eServiceReviewDataTable)
    {
        return $eServiceReviewDataTable->render('e_service_reviews.index');
    }

    /**
     * Show the form for creating a new EServiceReview.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        $user = $this->userRepository->pluck('name', 'id');

        $eService = $this->eServiceRepository->pluck('name', 'id');


        $hasCustomField = in_array($this->eServiceReviewRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->eServiceReviewRepository->model());
            $html = generateCustomField($customFields);
        }
        return view('e_service_reviews.create')->with("customFields", isset($html) ? $html : false)->with("user", $user)->with("eService", $eService);
    }

    /**
     * Store a newly created EServiceReview in storage.
     *
     * @param CreateEServiceReviewRequest $request
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function store(CreateEServiceReviewRequest $request)
    {
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->eServiceReviewRepository->model());
        try {
            $eServiceReview = $this->eServiceReviewRepository->create($input);
            $eServiceReview->customFieldsValues()->createMany(getCustomFieldsValues($customFields, $request));

        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully', ['operator' => __('lang.e_service_review')]));

        return redirect(route('eServiceReviews.index'));
    }

    /**
     * Display the specified EServiceReview.
     *
     * @param int $id
     *
     * @return Application|Factory|Response|View
     */
    public function show($id)
    {
        $eServiceReview = $this->eServiceReviewRepository->findWithoutFail($id);

        if (empty($eServiceReview)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.e_service_review')]));
            return redirect(route('eServiceReviews.index'));
        }
        return view('e_service_reviews.show')->with('eServiceReview', $eServiceReview);
    }

    /**
     * Show the form for editing the specified EServiceReview.
     *
     * @param int $id
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function edit($id)
    {
        $eServiceReview = $this->eServiceReviewRepository->findWithoutFail($id);
        $user = $this->userRepository->pluck('name', 'id');

        $eService = $this->eServiceRepository->pluck('name', 'id');


        if (empty($eServiceReview)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.e_service_review')]));

            return redirect(route('eServiceReviews.index'));
        }
        $customFieldsValues = $eServiceReview->customFieldsValues()->with('customField')->get();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->eServiceReviewRepository->model());
        $hasCustomField = in_array($this->eServiceReviewRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }
        return view('e_service_reviews.edit')->with('eServiceReview', $eServiceReview)->with("customFields", isset($html) ? $html : false)->with("user", $user)->with("eService", $eService);
    }

    /**
     * Update the specified EServiceReview in storage.
     *
     * @param int $id
     * @param UpdateEServiceReviewRequest $request
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function update($id, UpdateEServiceReviewRequest $request)
    {
        $eServiceReview = $this->eServiceReviewRepository->findWithoutFail($id);

        if (empty($eServiceReview)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.e_service_review')]));
            return redirect(route('eServiceReviews.index'));
        }
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->eServiceReviewRepository->model());
        try {
            $eServiceReview = $this->eServiceReviewRepository->update($input, $id);


            foreach (getCustomFieldsValues($customFields, $request) as $value) {
                $eServiceReview->customFieldsValues()
                    ->updateOrCreate(['custom_field_id' => $value['custom_field_id']], $value);
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }
        Flash::success(__('lang.updated_successfully', ['operator' => __('lang.e_service_review')]));
        return redirect(route('eServiceReviews.index'));
    }

    /**
     * Remove the specified EServiceReview from storage.
     *
     * @param int $id
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function destroy($id)
    {
        $eServiceReview = $this->eServiceReviewRepository->findWithoutFail($id);

        if (empty($eServiceReview)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.e_service_review')]));

            return redirect(route('eServiceReviews.index'));
        }

        $this->eServiceReviewRepository->delete($id);

        Flash::success(__('lang.deleted_successfully', ['operator' => __('lang.e_service_review')]));
        return redirect(route('eServiceReviews.index'));
    }

    /**
     * Remove Media of EServiceReview
     * @param Request $request
     */
    public function removeMedia(Request $request)
    {
        $input = $request->all();
        $eServiceReview = $this->eServiceReviewRepository->findWithoutFail($input['id']);
        try {
            if ($eServiceReview->hasMedia($input['collection'])) {
                $eServiceReview->getFirstMedia($input['collection'])->delete();
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

}
