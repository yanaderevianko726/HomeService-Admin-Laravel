<?php
/*
 * File name: AddressController.php
 * Last modified: 2021.02.16 at 10:56:12
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers;

use App\DataTables\AddressDataTable;
use App\Http\Requests\CreateAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Repositories\AddressRepository;
use App\Repositories\CustomFieldRepository;
use App\Repositories\UserRepository;
use Flash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;
use Prettus\Validator\Exceptions\ValidatorException;

class AddressController extends Controller
{
    /** @var  AddressRepository */
    private $addressRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(AddressRepository $addressRepo, CustomFieldRepository $customFieldRepo, UserRepository $userRepo)
    {
        parent::__construct();
        $this->addressRepository = $addressRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the Address.
     *
     * @param AddressDataTable $addressDataTable
     * @return mixed
     */
    public function index(AddressDataTable $addressDataTable)
    {
        return $addressDataTable->render('addresses.index');
    }

    /**
     * Show the form for creating a new Address.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        $user = $this->userRepository->pluck('name', 'id');

        $hasCustomField = in_array($this->addressRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->addressRepository->model());
            $html = generateCustomField($customFields);
        }
        return view('addresses.create')->with("customFields", isset($html) ? $html : false)->with("user", $user);
    }

    /**
     * Store a newly created Address in storage.
     *
     * @param CreateAddressRequest $request
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function store(CreateAddressRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->addressRepository->model());
        try {
            $address = $this->addressRepository->create($input);
            $address->customFieldsValues()->createMany(getCustomFieldsValues($customFields, $request));

        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully', ['operator' => __('lang.address')]));

        return redirect(route('addresses.index'));
    }

    /**
     * Display the specified Address.
     *
     * @param int $id
     *
     * @return Application|Factory|Response|View
     */
    public function show(int $id)
    {
        $address = $this->addressRepository->findWithoutFail($id);

        if (empty($address)) {
            Flash::error('Address not found');

            return redirect(route('addresses.index'));
        }

        return view('addresses.show')->with('address', $address);
    }

    /**
     * Show the form for editing the specified Address.
     *
     * @param int $id
     *
     * @return Application|Factory|Response|View
     */
    public function edit(int $id)
    {
        $address = $this->addressRepository->findWithoutFail($id);
        $user = $this->userRepository->pluck('name', 'id');


        if (empty($address)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.address')]));

            return redirect(route('addresses.index'));
        }
        $customFieldsValues = $address->customFieldsValues()->with('customField')->get();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->addressRepository->model());
        $hasCustomField = in_array($this->addressRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }

        return view('addresses.edit')->with('address', $address)->with("customFields", isset($html) ? $html : false)->with("user", $user);
    }

    /**
     * Update the specified Address in storage.
     *
     * @param int $id
     * @param UpdateAddressRequest $request
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function update(int $id, UpdateAddressRequest $request)
    {
        $address = $this->addressRepository->findWithoutFail($id);

        if (empty($address)) {
            Flash::error('Address not found');
            return redirect(route('addresses.index'));
        }
        $input = $request->all();
        $input['user_id'] = $address->user->id;
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->addressRepository->model());
        try {
            $address = $this->addressRepository->update($input, $id);


            foreach (getCustomFieldsValues($customFields, $request) as $value) {
                $address->customFieldsValues()
                    ->updateOrCreate(['custom_field_id' => $value['custom_field_id']], $value);
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.updated_successfully', ['operator' => __('lang.address')]));

        return redirect(route('addresses.index'));
    }

    /**
     * Remove the specified Address from storage.
     *
     * @param int $id
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function destroy(int $id)
    {
        $address = $this->addressRepository->findWithoutFail($id);

        if (empty($address)) {
            Flash::error('Address not found');

            return redirect(route('addresses.index'));
        }

        $this->addressRepository->delete($id);

        Flash::success(__('lang.deleted_successfully', ['operator' => __('lang.address')]));

        return redirect(route('addresses.index'));
    }
}
