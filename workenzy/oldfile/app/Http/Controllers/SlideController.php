<?php
/*
 * File name: SlideController.php
 * Last modified: 2021.01.25 at 15:38:34
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers;

use App\DataTables\SlideDataTable;
use App\Http\Requests\CreateSlideRequest;
use App\Http\Requests\UpdateSlideRequest;
use App\Repositories\CustomFieldRepository;
use App\Repositories\EProviderRepository;
use App\Repositories\EServiceRepository;
use App\Repositories\SlideRepository;
use App\Repositories\UploadRepository;
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

class SlideController extends Controller
{
    /** @var  SlideRepository */
    private $slideRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;

    /**
     * @var UploadRepository
     */
    private $uploadRepository;
    /**
     * @var EServiceRepository
     */
    private $eServiceRepository;
    /**
     * @var EProviderRepository
     */
    private $eProviderRepository;

    public function __construct(SlideRepository $slideRepo, CustomFieldRepository $customFieldRepo, UploadRepository $uploadRepo
        , EServiceRepository $eServiceRepo
        , EProviderRepository $eProviderRepo)
    {
        parent::__construct();
        $this->slideRepository = $slideRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->uploadRepository = $uploadRepo;
        $this->eServiceRepository = $eServiceRepo;
        $this->eProviderRepository = $eProviderRepo;
    }

    /**
     * Display a listing of the Slide.
     *
     * @param SlideDataTable $slideDataTable
     * @return Response
     */
    public function index(SlideDataTable $slideDataTable)
    {
        return $slideDataTable->render('slides.index');
    }

    /**
     * Show the form for creating a new Slide.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        $eService = $this->eServiceRepository->pluck('name', 'id');

        $eProvider = $this->eProviderRepository->pluck('name', 'id');


        $hasCustomField = in_array($this->slideRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->slideRepository->model());
            $html = generateCustomField($customFields);
        }
        return view('slides.create')->with("customFields", isset($html) ? $html : false)->with("eService", $eService)->with("eProvider", $eProvider);
    }

    /**
     * Store a newly created Slide in storage.
     *
     * @param CreateSlideRequest $request
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function store(CreateSlideRequest $request)
    {
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->slideRepository->model());
        try {
            $slide = $this->slideRepository->create($input);
            $slide->customFieldsValues()->createMany(getCustomFieldsValues($customFields, $request));
            if (isset($input['image']) && $input['image']) {
                $cacheUpload = $this->uploadRepository->getByUuid($input['image']);
                $mediaItem = $cacheUpload->getMedia('image')->first();
                $mediaItem->copy($slide, 'image');
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully', ['operator' => __('lang.slide')]));

        return redirect(route('slides.index'));
    }

    /**
     * Show the form for editing the specified Slide.
     *
     * @param int $id
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function edit($id)
    {
        $slide = $this->slideRepository->findWithoutFail($id);
        $eService = $this->eServiceRepository->pluck('name', 'id')->prepend(__('lang.slide_e_service_id_placeholder'), '');
        $eProvider = $this->eProviderRepository->pluck('name', 'id')->prepend(__('lang.slide_e_provider_id_placeholder'), '');
        if (empty($slide)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.slide')]));

            return redirect(route('slides.index'));
        }
        $customFieldsValues = $slide->customFieldsValues()->with('customField')->get();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->slideRepository->model());
        $hasCustomField = in_array($this->slideRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }
        return view('slides.edit')->with('slide', $slide)->with("customFields", isset($html) ? $html : false)->with("eService", $eService)->with("eProvider", $eProvider);
    }

    /**
     * Update the specified Slide in storage.
     *
     * @param int $id
     * @param UpdateSlideRequest $request
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function update($id, UpdateSlideRequest $request)
    {
        $slide = $this->slideRepository->findWithoutFail($id);

        if (empty($slide)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.slide')]));
            return redirect(route('slides.index'));
        }
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->slideRepository->model());
        try {
            $slide = $this->slideRepository->update($input, $id);

            if (isset($input['image']) && $input['image']) {
                $cacheUpload = $this->uploadRepository->getByUuid($input['image']);
                $mediaItem = $cacheUpload->getMedia('image')->first();
                $mediaItem->copy($slide, 'image');
            }
            foreach (getCustomFieldsValues($customFields, $request) as $value) {
                $slide->customFieldsValues()
                    ->updateOrCreate(['custom_field_id' => $value['custom_field_id']], $value);
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }
        Flash::success(__('lang.updated_successfully', ['operator' => __('lang.slide')]));
        return redirect(route('slides.index'));
    }

    /**
     * Remove the specified Slide from storage.
     *
     * @param int $id
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function destroy($id)
    {
        $slide = $this->slideRepository->findWithoutFail($id);

        if (empty($slide)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.slide')]));

            return redirect(route('slides.index'));
        }

        $this->slideRepository->delete($id);

        Flash::success(__('lang.deleted_successfully', ['operator' => __('lang.slide')]));
        return redirect(route('slides.index'));
    }

    /**
     * Remove Media of Slide
     * @param Request $request
     */
    public function removeMedia(Request $request)
    {
        $input = $request->all();
        $slide = $this->slideRepository->findWithoutFail($input['id']);
        try {
            if ($slide->hasMedia($input['collection'])) {
                $slide->getFirstMedia($input['collection'])->delete();
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

}
