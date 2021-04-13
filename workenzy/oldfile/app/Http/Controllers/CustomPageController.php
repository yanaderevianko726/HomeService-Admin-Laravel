<?php
/*
 * File name: CustomPageController.php
 * Last modified: 2021.03.09 at 22:56:59
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers;

use App\DataTables\CustomPageDataTable;
use App\Http\Requests\CreateCustomPageRequest;
use App\Http\Requests\UpdateCustomPageRequest;
use App\Repositories\CustomFieldRepository;
use App\Repositories\CustomPageRepository;
use Flash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;
use Prettus\Validator\Exceptions\ValidatorException;

class CustomPageController extends Controller
{
    /** @var  CustomPageRepository */
    private $customPageRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;


    public function __construct(CustomPageRepository $customPageRepo, CustomFieldRepository $customFieldRepo)
    {
        parent::__construct();
        $this->customPageRepository = $customPageRepo;
        $this->customFieldRepository = $customFieldRepo;

    }

    /**
     * Display a listing of the CustomPage.
     *
     * @param CustomPageDataTable $customPageDataTable
     * @return Response
     */
    public function index(CustomPageDataTable $customPageDataTable)
    {
        return $customPageDataTable->render('settings.custom_pages.index');
    }

    /**
     * Show the form for creating a new CustomPage.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {


        $hasCustomField = in_array($this->customPageRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->customPageRepository->model());
            $html = generateCustomField($customFields);
        }
        return view('settings.custom_pages.create')->with("customFields", isset($html) ? $html : false);
    }

    /**
     * Store a newly created CustomPage in storage.
     *
     * @param CreateCustomPageRequest $request
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function store(CreateCustomPageRequest $request)
    {
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->customPageRepository->model());
        try {
            $customPage = $this->customPageRepository->create($input);
            $customPage->customFieldsValues()->createMany(getCustomFieldsValues($customFields, $request));

        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully', ['operator' => __('lang.custom_page')]));

        return redirect(route('customPages.index'));
    }

    /**
     * Display the specified CustomPage.
     *
     * @param int $id
     *
     * @return Application|Factory|Response|View
     */
    public function show($id)
    {
        $customPage = $this->customPageRepository->findWithoutFail($id);

        if (empty($customPage)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.custom_page')]));
            return redirect(route('customPages.index'));
        }
        return view('settings.custom_pages.show')->with('customPage', $customPage);
    }

    /**
     * Show the form for editing the specified CustomPage.
     *
     * @param int $id
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function edit($id)
    {
        $customPage = $this->customPageRepository->findWithoutFail($id);


        if (empty($customPage)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.custom_page')]));

            return redirect(route('customPages.index'));
        }
        $customFieldsValues = $customPage->customFieldsValues()->with('customField')->get();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->customPageRepository->model());
        $hasCustomField = in_array($this->customPageRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }
        return view('settings.custom_pages.edit')->with('customPage', $customPage)->with("customFields", isset($html) ? $html : false);
    }

    /**
     * Update the specified CustomPage in storage.
     *
     * @param int $id
     * @param UpdateCustomPageRequest $request
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function update($id, UpdateCustomPageRequest $request)
    {
        $customPage = $this->customPageRepository->findWithoutFail($id);

        if (empty($customPage)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.custom_page')]));
            return redirect(route('customPages.index'));
        }
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->customPageRepository->model());
        try {
            $customPage = $this->customPageRepository->update($input, $id);


            foreach (getCustomFieldsValues($customFields, $request) as $value) {
                $customPage->customFieldsValues()
                    ->updateOrCreate(['custom_field_id' => $value['custom_field_id']], $value);
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }
        Flash::success(__('lang.updated_successfully', ['operator' => __('lang.custom_page')]));
        return redirect(route('customPages.index'));
    }

    /**
     * Remove the specified CustomPage from storage.
     *
     * @param int $id
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function destroy($id)
    {
        $customPage = $this->customPageRepository->findWithoutFail($id);

        if (empty($customPage)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.custom_page')]));

            return redirect(route('customPages.index'));
        }

        $this->customPageRepository->delete($id);

        Flash::success(__('lang.deleted_successfully', ['operator' => __('lang.custom_page')]));
        return redirect(route('customPages.index'));
    }

}
