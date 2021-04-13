<?php
/*
 * File name: OptionGroupController.php
 * Last modified: 2021.01.22 at 20:56:36
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers;

use App\DataTables\OptionGroupDataTable;
use App\Http\Requests\CreateOptionGroupRequest;
use App\Http\Requests\UpdateOptionGroupRequest;
use App\Repositories\CustomFieldRepository;
use App\Repositories\OptionGroupRepository;
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

class OptionGroupController extends Controller
{
    /** @var  OptionGroupRepository */
    private $optionGroupRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;


    public function __construct(OptionGroupRepository $optionGroupRepo, CustomFieldRepository $customFieldRepo)
    {
        parent::__construct();
        $this->optionGroupRepository = $optionGroupRepo;
        $this->customFieldRepository = $customFieldRepo;

    }

    /**
     * Display a listing of the OptionGroup.
     *
     * @param OptionGroupDataTable $optionGroupDataTable
     * @return Response
     */
    public function index(OptionGroupDataTable $optionGroupDataTable)
    {
        return $optionGroupDataTable->render('option_groups.index');
    }

    /**
     * Show the form for creating a new OptionGroup.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {


        $hasCustomField = in_array($this->optionGroupRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->optionGroupRepository->model());
            $html = generateCustomField($customFields);
        }
        return view('option_groups.create')->with("customFields", isset($html) ? $html : false);
    }

    /**
     * Store a newly created OptionGroup in storage.
     *
     * @param CreateOptionGroupRequest $request
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function store(CreateOptionGroupRequest $request)
    {
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->optionGroupRepository->model());
        try {
            $optionGroup = $this->optionGroupRepository->create($input);
            $optionGroup->customFieldsValues()->createMany(getCustomFieldsValues($customFields, $request));

        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully', ['operator' => __('lang.option_group')]));

        return redirect(route('optionGroups.index'));
    }

    /**
     * Show the form for editing the specified OptionGroup.
     *
     * @param int $id
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function edit($id)
    {
        $optionGroup = $this->optionGroupRepository->findWithoutFail($id);

        if (empty($optionGroup)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.option_group')]));

            return redirect(route('optionGroups.index'));
        }
        $customFieldsValues = $optionGroup->customFieldsValues()->with('customField')->get();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->optionGroupRepository->model());
        $hasCustomField = in_array($this->optionGroupRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }

        return view('option_groups.edit')->with('optionGroup', $optionGroup)->with("customFields", isset($html) ? $html : false);
    }

    /**
     * Update the specified OptionGroup in storage.
     *
     * @param int $id
     * @param UpdateOptionGroupRequest $request
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function update($id, UpdateOptionGroupRequest $request)
    {
        $optionGroup = $this->optionGroupRepository->findWithoutFail($id);

        if (empty($optionGroup)) {
            Flash::error('Option Group not found');
            return redirect(route('optionGroups.index'));
        }
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->optionGroupRepository->model());
        try {
            $optionGroup = $this->optionGroupRepository->update($input, $id);


            foreach (getCustomFieldsValues($customFields, $request) as $value) {
                $optionGroup->customFieldsValues()
                    ->updateOrCreate(['custom_field_id' => $value['custom_field_id']], $value);
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.updated_successfully', ['operator' => __('lang.option_group')]));

        return redirect(route('optionGroups.index'));
    }

    /**
     * Remove the specified OptionGroup from storage.
     *
     * @param int $id
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function destroy($id)
    {
        $optionGroup = $this->optionGroupRepository->findWithoutFail($id);

        if (empty($optionGroup)) {
            Flash::error('Option Group not found');

            return redirect(route('optionGroups.index'));
        }

        $this->optionGroupRepository->delete($id);

        Flash::success(__('lang.deleted_successfully', ['operator' => __('lang.option_group')]));

        return redirect(route('optionGroups.index'));
    }

    /**
     * Remove Media of OptionGroup
     * @param Request $request
     */
    public function removeMedia(Request $request)
    {
        $input = $request->all();
        $optionGroup = $this->optionGroupRepository->findWithoutFail($input['id']);
        try {
            if ($optionGroup->hasMedia($input['collection'])) {
                $optionGroup->getFirstMedia($input['collection'])->delete();
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
