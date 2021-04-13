<?php
/*
 * File name: EProviderPayoutController.php
 * Last modified: 2021.01.30 at 15:59:19
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers;

use App\DataTables\EProviderPayoutDataTable;
use App\Http\Requests\CreateEProviderPayoutRequest;
use App\Repositories\CustomFieldRepository;
use App\Repositories\EarningRepository;
use App\Repositories\EProviderPayoutRepository;
use App\Repositories\EProviderRepository;
use Carbon\Carbon;
use Flash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;
use Prettus\Validator\Exceptions\ValidatorException;

class EProviderPayoutController extends Controller
{
    /** @var  EProviderPayoutRepository */
    private $eProviderPayoutRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;

    /**
     * @var EProviderRepository
     */
    private $eProviderRepository;
    /**
     * @var EarningRepository
     */
    private $earningRepository;

    public function __construct(EProviderPayoutRepository $eProviderPayoutRepo, CustomFieldRepository $customFieldRepo, EProviderRepository $eProviderRepo, EarningRepository $earningRepository)
    {
        parent::__construct();
        $this->eProviderPayoutRepository = $eProviderPayoutRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->eProviderRepository = $eProviderRepo;
        $this->earningRepository = $earningRepository;
    }

    /**
     * Display a listing of the EProviderPayout.
     *
     * @param EProviderPayoutDataTable $eProviderPayoutDataTable
     * @return Response
     */
    public function index(EProviderPayoutDataTable $eProviderPayoutDataTable)
    {
        return $eProviderPayoutDataTable->render('e_provider_payouts.index');
    }

    /**
     * Show the form for creating a new EProviderPayout.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        if (auth()->user()->hasRole('manager')) {
            $this->eProviderRepository->pushCriteria(new EProvidersOfProviderCriteria(auth()->id()));
        }
        $eProvider = $this->eProviderRepository->pluck('name', 'id');


        $hasCustomField = in_array($this->eProviderPayoutRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->eProviderPayoutRepository->model());
            $html = generateCustomField($customFields);
        }
        return view('e_provider_payouts.create')->with("customFields", isset($html) ? $html : false)->with("eProvider", $eProvider);
    }

    /**
     * Store a newly created EProviderPayout in storage.
     *
     * @param CreateEProviderPayoutRequest $request
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function store(CreateEProviderPayoutRequest $request)
    {
        $input = $request->all();
        $earning = $this->earningRepository->findByField('e_provider_id', $input['e_provider_id'])->first();
        if ($input['amount'] > $earning->e_provider_earning) {
            Flash::error('The payout amount must be less than provider earning');
            return redirect(route('eProviderPayouts.create'))->withInput($input);
        }
        $input['paid_date'] = Carbon::now();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->eProviderPayoutRepository->model());
        try {
            $eProviderPayout = $this->eProviderPayoutRepository->create($input);
            $eProviderPayout->customFieldsValues()->createMany(getCustomFieldsValues($customFields, $request));

        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully', ['operator' => __('lang.e_provider_payout')]));

        return redirect(route('eProviderPayouts.index'));
    }

    /**
     * Remove the specified EProviderPayout from storage.
     *
     * @param int $id
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function destroy($id)
    {
        $eProviderPayout = $this->eProviderPayoutRepository->findWithoutFail($id);

        if (empty($eProviderPayout)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.e_provider_payout')]));

            return redirect(route('eProviderPayouts.index'));
        }

        $this->eProviderPayoutRepository->delete($id);

        Flash::success(__('lang.deleted_successfully', ['operator' => __('lang.e_provider_payout')]));
        return redirect(route('eProviderPayouts.index'));
    }
}
