<?php

namespace App\Http\Controllers;

use App\DataTables\CountryDataTable;
use App\Http\Requests\CreateCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Repositories\CustomFieldRepository;
use App\Repositories\CountryRepository;
use Exception;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;

class CountryController extends Controller
{
    
    /** @var  countryRepository */
    private $countryRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;


    public function __construct(CountryRepository $countryRepo, CustomFieldRepository $customFieldRepo)
    {
        parent::__construct();
        $this->countryRepository = $countryRepo;
        $this->customFieldRepository = $customFieldRepo;

    }
    
    public function index(CountryDataTable $countryDataTable)
    {
        return $countryDataTable->render('countries.index');
    }

    /**
     * Show the form for creating a new Countries.
     *
     * @return Response
     */
    public function create()
    {
        $hasCustomField = in_array($this->countryRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->countryRepository->model());
            $html = generateCustomField($customFields);
        }
        return view('countries.create')->with("customFields", isset($html) ? $html : false);
    }

    /**
     * Store a newly created Countries in storage.
     *
     * @param CreateCountryRequest $request
     *
     * @return Response
     */
    public function store(CreateCountryRequest $request)
    {
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->countryRepository->model());
        try {
            $country = $this->countryRepository->create($input);
            $country->customFieldsValues()->createMany(getCustomFieldsValues($customFields, $request));

        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully', ['operator' => __('lang.country')]));

        return redirect(route('countries.index'));
    }

    /**
     * Display the specified Country.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $country = $this->countryRepository->findWithoutFail($id);

        if (empty($country)) {
            Flash::error('Country not found');

            return redirect(route('countries.index'));
        }

        return view('countries.show')->with('country', $country);
    }

    /**
     * Show the form for editing the specified EProviderType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $country = $this->countryRepository->findWithoutFail($id);


        if (empty($country)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.country')]));

            return redirect(route('countries.index'));
        }
        $customFieldsValues = $country->customFieldsValues()->with('customField')->get();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->countryRepository->model());
        $hasCustomField = in_array($this->countryRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }

        return view('countries.edit')->with('country', $country)->with("customFields", isset($html) ? $html : false);
    }

    /**
     * Update the specified EProviderType in storage.
     *
     * @param int $id
     * @param UpdateEProviderTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCountryRequest $request)
    {
        $country = $this->countryRepository->findWithoutFail($id);

        if (empty($country)) {
            Flash::error('Country not found');
            return redirect(route('countries.index'));
        }
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->countryRepository->model());
        try {
            $eProviderType = $this->countryRepository->update($input, $id);


            foreach (getCustomFieldsValues($customFields, $request) as $value) {
                $eProviderType->customFieldsValues()
                    ->updateOrCreate(['custom_field_id' => $value['custom_field_id']], $value);
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.updated_successfully', ['operator' => __('lang.country')]));

        return redirect(route('countries.index'));
    }

    /**
     * Remove the specified Country from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $country = $this->countryRepository->findWithoutFail($id);

        if (empty($country)) {
            Flash::error('Country not found');

            return redirect(route('countries.index'));
        }

        $this->countryRepository->delete($id);

        Flash::success(__('lang.deleted_successfully', ['operator' => __('lang.country')]));

        return redirect(route('countries.index'));
    }

    /**
     * Remove Media of Country
     * @param Request $request
     */
    public function removeMedia(Request $request)
    {
        $input = $request->all();
        $country = $this->countryRepository->findWithoutFail($input['id']);
        try {
            if ($country->hasMedia($input['collection'])) {
                $country->getFirstMedia($input['collection'])->delete();
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
