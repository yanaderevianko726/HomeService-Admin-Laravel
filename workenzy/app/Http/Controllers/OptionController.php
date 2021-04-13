<?php
/*
 * File name: OptionController.php
 * Last modified: 2021.01.22 at 21:33:37
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers;

use App\Criteria\EServices\EServicesOfUserCriteria;
use App\Criteria\Options\OptionsOfUserCriteria;
use App\DataTables\OptionDataTable;
use App\Http\Requests\CreateOptionRequest;
use App\Http\Requests\UpdateOptionRequest;
use App\Repositories\CustomFieldRepository;
use App\Repositories\EServiceRepository;
use App\Repositories\OptionGroupRepository;
use App\Repositories\OptionRepository;
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
use Prettus\Repository\Exceptions\RepositoryException;
use Prettus\Validator\Exceptions\ValidatorException;

class OptionController extends Controller
{
    /** @var  OptionRepository */
    private $optionRepository;

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
     * @var OptionGroupRepository
     */
    private $optionGroupRepository;

    public function __construct(OptionRepository $optionRepo, CustomFieldRepository $customFieldRepo, UploadRepository $uploadRepo
        , EServiceRepository $eServiceRepo
        , OptionGroupRepository $optionGroupRepo)
    {
        parent::__construct();
        $this->optionRepository = $optionRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->uploadRepository = $uploadRepo;
        $this->eServiceRepository = $eServiceRepo;
        $this->optionGroupRepository = $optionGroupRepo;
    }

    /**
     * Display a listing of the Option.
     *
     * @param OptionDataTable $optionDataTable
     * @return Response
     */
    public function index(OptionDataTable $optionDataTable)
    {
        return $optionDataTable->render('options.index');
    }

    /**
     * Show the form for creating a new Option.
     *
     * @return Application|Factory|Response|View
     * @throws RepositoryException
     */
    public function create()
    {
        $this->eServiceRepository->pushCriteria(new EServicesOfUserCriteria(auth()->id()));
        $eService = $this->eServiceRepository->groupedByEProviders();
        $optionGroup = $this->optionGroupRepository->pluck('name', 'id');

        $hasCustomField = in_array($this->optionRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->optionRepository->model());
            $html = generateCustomField($customFields);
        }
        return view('options.create')->with("customFields", isset($html) ? $html : false)->with("eService", $eService)->with("optionGroup", $optionGroup);
    }

    /**
     * Store a newly created Option in storage.
     *
     * @param CreateOptionRequest $request
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function store(CreateOptionRequest $request)
    {
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->optionRepository->model());
        try {
            $option = $this->optionRepository->create($input);
            $option->customFieldsValues()->createMany(getCustomFieldsValues($customFields, $request));
            if (isset($input['image']) && $input['image']) {
                $cacheUpload = $this->uploadRepository->getByUuid($input['image']);
                $mediaItem = $cacheUpload->getMedia('image')->first();
                $mediaItem->copy($option, 'image');
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully', ['operator' => __('lang.option')]));

        return redirect(route('options.index'));
    }

    /**
     * Show the form for editing the specified Option.
     *
     * @param int $id
     *
     * @return Application|RedirectResponse|Redirector|Response
     * @throws RepositoryException
     */
    public function edit($id)
    {
        $this->optionRepository->pushCriteria(new OptionsOfUserCriteria(auth()->id()));
        $option = $this->optionRepository->findWithoutFail($id);
        if (empty($option)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.option')]));
            return redirect(route('options.index'));
        }
        $this->eServiceRepository->pushCriteria(new EServicesOfUserCriteria(auth()->id()));
        $eService = $this->eServiceRepository->groupedByEProviders();
        $optionGroup = $this->optionGroupRepository->pluck('name', 'id');


        $customFieldsValues = $option->customFieldsValues()->with('customField')->get();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->optionRepository->model());
        $hasCustomField = in_array($this->optionRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }

        return view('options.edit')->with('option', $option)->with("customFields", isset($html) ? $html : false)->with("eService", $eService)->with("optionGroup", $optionGroup);
    }

    /**
     * Update the specified Option in storage.
     *
     * @param int $id
     * @param UpdateOptionRequest $request
     *
     * @return Application|RedirectResponse|Redirector|Response
     * @throws RepositoryException
     */
    public function update($id, UpdateOptionRequest $request)
    {
        $this->optionRepository->pushCriteria(new OptionsOfUserCriteria(auth()->id()));

        $option = $this->optionRepository->findWithoutFail($id);

        if (empty($option)) {
            Flash::error('Option not found');
            return redirect(route('options.index'));
        }
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->optionRepository->model());
        try {
            $option = $this->optionRepository->update($input, $id);

            if (isset($input['image']) && $input['image']) {
                $cacheUpload = $this->uploadRepository->getByUuid($input['image']);
                $mediaItem = $cacheUpload->getMedia('image')->first();
                $mediaItem->copy($option, 'image');
            }
            foreach (getCustomFieldsValues($customFields, $request) as $value) {
                $option->customFieldsValues()
                    ->updateOrCreate(['custom_field_id' => $value['custom_field_id']], $value);
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.updated_successfully', ['operator' => __('lang.option')]));

        return redirect(route('options.index'));
    }

    /**
     * Remove the specified Option from storage.
     *
     * @param int $id
     *
     * @return Application|RedirectResponse|Redirector|Response
     * @throws RepositoryException
     */
    public function destroy($id)
    {
        $this->optionRepository->pushCriteria(new OptionsOfUserCriteria(auth()->id()));
        $option = $this->optionRepository->findWithoutFail($id);

        if (empty($option)) {
            Flash::error('Option not found');

            return redirect(route('options.index'));
        }

        $this->optionRepository->delete($id);

        Flash::success(__('lang.deleted_successfully', ['operator' => __('lang.option')]));

        return redirect(route('options.index'));
    }

    /**
     * Remove Media of Option
     * @param Request $request
     */
    public function removeMedia(Request $request)
    {
        $input = $request->all();
        $option = $this->optionRepository->findWithoutFail($input['id']);
        try {
            if ($option->hasMedia($input['collection'])) {
                $option->getFirstMedia($input['collection'])->delete();
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
