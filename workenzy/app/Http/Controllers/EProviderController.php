<?php
/*
 * File name: EProviderController.php
 * Last modified: 2021.02.17 at 15:54:38
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers;

use App\DataTables\EProviderDataTable;
use App\DataTables\CountryDataTable;
use App\DataTables\RequestedEProviderDataTable;
use App\Http\Requests\CreateEProviderRequest;
use App\Http\Requests\UpdateEProviderRequest;
use App\Repositories\AddressRepository;
use App\Repositories\CustomFieldRepository;
use App\Repositories\EProviderRepository;
use App\Repositories\EProviderTypeRepository;
use App\Repositories\CountryRepository;
use App\Repositories\TaxRepository;
use App\Repositories\UploadRepository;
use App\Repositories\UserRepository;
use Exception;
use Flash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;
use Prettus\Validator\Exceptions\ValidatorException;

class EProviderController extends Controller
{
    /** @var  EProviderRepository */
    private $eProviderRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;

    /**
     * @var UploadRepository
     */
    private $uploadRepository;
    /**
     * @var EProviderTypeRepository
     */
    private $eProviderTypeRepository;
    /**
     * @var CountryRepository
     */
    private $countryRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var AddressRepository
     */
    private $addressRepository;
    /**
     * @var TaxRepository
     */
    private $taxRepository;

    public function __construct(EProviderRepository $eProviderRepo, CustomFieldRepository $customFieldRepo, UploadRepository $uploadRepo
        , EProviderTypeRepository $eProviderTypeRepo
        , CountryRepository $countryRepo
        , UserRepository $userRepo
        , AddressRepository $addressRepo
        , TaxRepository $taxRepo)
    {
        parent::__construct();
        $this->eProviderRepository = $eProviderRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->uploadRepository = $uploadRepo;
        $this->eProviderTypeRepository = $eProviderTypeRepo;
        $this->countryRepository = $countryRepo;
        $this->userRepository = $userRepo;
        $this->addressRepository = $addressRepo;
        $this->taxRepository = $taxRepo;
    }

    /**
     * Display a listing of the EProvider.
     *
     * @param EProviderDataTable $eProviderDataTable
     * @return Response
     */
    public function index(EProviderDataTable $eProviderDataTable, CountryDataTable $countryDataTable, Request $request)
    {
        if($request->get('country_id')){
            return $eProviderDataTable->render('e_providers.index');
        }
        return $countryDataTable->render('countries.index');
        
    }

    /**
     * Display a listing of the EProvider.
     *
     * @param EProviderDataTable $eproviderDataTable
     * @return Response
     */
    public function requestedEProviders(RequestedEProviderDataTable $requestedEProviderDataTable)
    {
        return $requestedEProviderDataTable->render('e_providers.requested');
    }

    /**
     * Show the form for creating a new EProvider.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        $eProviderType = $this->eProviderTypeRepository->pluck('name', 'id');
        $country = $this->countryRepository->pluck('name','id');
        $user = $this->userRepository->pluck('name', 'id');
        $address = $this->addressRepository->all()->pluck('address', 'id');
        $tax = $this->taxRepository->pluck('name', 'id');
        $usersSelected = [];
        $addressesSelected = [];
        $taxesSelected = [];
        $hasCustomField = in_array($this->eProviderRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->eProviderRepository->model());
            $html = generateCustomField($customFields);
        }
        return view('e_providers.create')->with("customFields", isset($html) ? $html : false)->with("country", $country)->with("eProviderType", $eProviderType)->with("user", $user)->with("usersSelected", $usersSelected)->with("address", $address)->with("addressesSelected", $addressesSelected)->with("tax", $tax)->with("taxesSelected", $taxesSelected);
    }

    /**
     * Store a newly created EProvider in storage.
     *
     * @param CreateEProviderRequest $request
     *
     * @return Response
     */
    public function store(CreateEProviderRequest $request)
    {
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->eProviderRepository->model());
        try {
            $eProvider = $this->eProviderRepository->create($input);
            $eProvider->customFieldsValues()->createMany(getCustomFieldsValues($customFields, $request));
            if (isset($input['image']) && $input['image'] && is_array($input['image'])) {
                foreach ($input['image'] as $fileUuid) {
                    $cacheUpload = $this->uploadRepository->getByUuid($fileUuid);
                    $mediaItem = $cacheUpload->getMedia('image')->first();
                    $mediaItem->copy($eProvider, 'image');
                }
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully', ['operator' => __('lang.e_provider')]));

        return redirect(route('eProviders.index'));
    }

    /**
     * Display the specified EProvider.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eProvider = $this->eProviderRepository->findWithoutFail($id);
        if (empty($eProvider)) {
            Flash::error('E Provider not found');

            return redirect(route('eProviders.index'));
        }

        return view('e_providers.show')->with('eProvider', $eProvider);
    }

    /**
     * Show the form for editing the specified EProvider.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eProvider = $this->eProviderRepository->findWithoutFail($id);
        $eProviderType = $this->eProviderTypeRepository->pluck('name', 'id');
        $country = $this->countryRepository->pluck('name','id'); 
        $user = $this->userRepository->pluck('name', 'id');
        $address = $this->addressRepository->all()->pluck('address', 'id');
        $tax = $this->taxRepository->pluck('name', 'id');
        $usersSelected = $eProvider->users()->pluck('users.id')->toArray();
        $addressesSelected = $eProvider->addresses()->pluck('addresses.id')->toArray();
        $taxesSelected = $eProvider->taxes()->pluck('taxes.id')->toArray();

        if (empty($eProvider)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.e_provider')]));

            return redirect(route('eProviders.index'));
        }
        $customFieldsValues = $eProvider->customFieldsValues()->with('customField')->get();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->eProviderRepository->model());
        $hasCustomField = in_array($this->eProviderRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }

        return view('e_providers.edit')->with('eProvider', $eProvider)->with("customFields", isset($html) ? $html : false)->with("country", $country)->with("eProviderType", $eProviderType)->with("user", $user)->with("usersSelected", $usersSelected)->with("address", $address)->with("addressesSelected", $addressesSelected)->with("tax", $tax)->with("taxesSelected", $taxesSelected);
    }

    /**
     * Update the specified EProvider in storage.
     *
     * @param int $id
     * @param UpdateEProviderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEProviderRequest $request)
    {
        $eProvider = $this->eProviderRepository->findWithoutFail($id);
        
        if (empty($eProvider)) {
            Flash::error('E Provider not found');
            return redirect(route('eProviders.index'));
        }
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->eProviderRepository->model());
        try {

            
            $eProvider = $this->eProviderRepository->update($input, $id);
            $input['users'] = isset($input['users']) ? $input['users'] : [];
            $input['addresses'] = isset($input['addresses']) ? $input['addresses'] : [];
            $input['taxes'] = isset($input['taxes']) ? $input['taxes'] : [];
            if (isset($input['image']) && $input['image'] && is_array($input['image'])) {
                foreach ($input['image'] as $fileUuid) {
                    $cacheUpload = $this->uploadRepository->getByUuid($fileUuid);
                    $mediaItem = $cacheUpload->getMedia('image')->first();
                    $mediaItem->copy($eProvider, 'image');
                }
            }
            foreach (getCustomFieldsValues($customFields, $request) as $value) {
                $eProvider->customFieldsValues()
                    ->updateOrCreate(['custom_field_id' => $value['custom_field_id']], $value);
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.updated_successfully', ['operator' => __('lang.e_provider')]));

        return redirect(route('eProviders.index'));
    }

    /**
     * Remove the specified EProvider from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eProvider = $this->eProviderRepository->findWithoutFail($id);

        if (empty($eProvider)) {
            Flash::error('E Provider not found');

            return redirect(route('eProviders.index'));
        }

        $this->eProviderRepository->delete($id);

        Flash::success(__('lang.deleted_successfully', ['operator' => __('lang.e_provider')]));

        return redirect(route('eProviders.index'));
    }

    /**
     * Remove Media of EProvider
     * @param Request $request
     */
    public function removeMedia(Request $request)
    {
        $input = $request->all();
        $eProvider = $this->eProviderRepository->findWithoutFail($input['id']);
        try {
            if ($eProvider->hasMedia($input['collection'])) {
                $eProvider->getFirstMedia($input['collection'])->delete();
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
