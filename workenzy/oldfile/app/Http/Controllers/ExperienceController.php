<?php
/*
 * File name: ExperienceController.php
 * Last modified: 2021.01.15 at 18:23:28
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers;

use App\DataTables\ExperienceDataTable;
use App\Http\Requests\CreateExperienceRequest;
use App\Http\Requests\UpdateExperienceRequest;
use App\Repositories\CustomFieldRepository;
use App\Repositories\EProviderRepository;
use App\Repositories\ExperienceRepository;
use Exception;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;

class ExperienceController extends Controller
{
    /** @var  ExperienceRepository */
    private $experienceRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;

    /**
     * @var EProviderRepository
     */
    private $eProviderRepository;

    public function __construct(ExperienceRepository $experienceRepo, CustomFieldRepository $customFieldRepo, EProviderRepository $eProviderRepo)
    {
        parent::__construct();
        $this->experienceRepository = $experienceRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->eProviderRepository = $eProviderRepo;
    }

    /**
     * Display a listing of the Experience.
     *
     * @param ExperienceDataTable $experienceDataTable
     * @return Response
     */
    public function index(ExperienceDataTable $experienceDataTable)
    {
        return $experienceDataTable->render('experiences.index');
    }

    /**
     * Show the form for creating a new Experience.
     *
     * @return Response
     */
    public function create()
    {
        $eProvider = $this->eProviderRepository->pluck('name', 'id');

        $hasCustomField = in_array($this->experienceRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->experienceRepository->model());
            $html = generateCustomField($customFields);
        }
        return view('experiences.create')->with("customFields", isset($html) ? $html : false)->with("eProvider", $eProvider);
    }

    /**
     * Store a newly created Experience in storage.
     *
     * @param CreateExperienceRequest $request
     *
     * @return Response
     */
    public function store(CreateExperienceRequest $request)
    {
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->experienceRepository->model());
        try {
            $experience = $this->experienceRepository->create($input);
            $experience->customFieldsValues()->createMany(getCustomFieldsValues($customFields, $request));

        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully', ['operator' => __('lang.experience')]));

        return redirect(route('experiences.index'));
    }

    /**
     * Display the specified Experience.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $experience = $this->experienceRepository->findWithoutFail($id);

        if (empty($experience)) {
            Flash::error('Experience not found');

            return redirect(route('experiences.index'));
        }

        return view('experiences.show')->with('experience', $experience);
    }

    /**
     * Show the form for editing the specified Experience.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $experience = $this->experienceRepository->findWithoutFail($id);
        $eProvider = $this->eProviderRepository->pluck('name', 'id');

        if (empty($experience)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.experience')]));

            return redirect(route('experiences.index'));
        }
        $customFieldsValues = $experience->customFieldsValues()->with('customField')->get();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->experienceRepository->model());
        $hasCustomField = in_array($this->experienceRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }

        return view('experiences.edit')->with('experience', $experience)->with("customFields", isset($html) ? $html : false)->with("eProvider", $eProvider);
    }

    /**
     * Update the specified Experience in storage.
     *
     * @param int $id
     * @param UpdateExperienceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExperienceRequest $request)
    {
        $experience = $this->experienceRepository->findWithoutFail($id);

        if (empty($experience)) {
            Flash::error('Experience not found');
            return redirect(route('experiences.index'));
        }
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->experienceRepository->model());
        try {
            $experience = $this->experienceRepository->update($input, $id);


            foreach (getCustomFieldsValues($customFields, $request) as $value) {
                $experience->customFieldsValues()
                    ->updateOrCreate(['custom_field_id' => $value['custom_field_id']], $value);
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.updated_successfully', ['operator' => __('lang.experience')]));

        return redirect(route('experiences.index'));
    }

    /**
     * Remove the specified Experience from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $experience = $this->experienceRepository->findWithoutFail($id);

        if (empty($experience)) {
            Flash::error('Experience not found');

            return redirect(route('experiences.index'));
        }

        $this->experienceRepository->delete($id);

        Flash::success(__('lang.deleted_successfully', ['operator' => __('lang.experience')]));

        return redirect(route('experiences.index'));
    }

    /**
     * Remove Media of Experience
     * @param Request $request
     */
    public function removeMedia(Request $request)
    {
        $input = $request->all();
        $experience = $this->experienceRepository->findWithoutFail($input['id']);
        try {
            if ($experience->hasMedia($input['collection'])) {
                $experience->getFirstMedia($input['collection'])->delete();
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
