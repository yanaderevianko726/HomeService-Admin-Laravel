<?php
/*
 * File name: EarningController.php
 * Last modified: 2021.02.22 at 14:40:34
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers;

use App\Criteria\Bookings\BookingsOfProviderCriteria;
use App\Criteria\Bookings\PaidBookingsCriteria;
use App\DataTables\EarningDataTable;
use App\Http\Requests\CreateEarningRequest;
use App\Repositories\BookingRepository;
use App\Repositories\CustomFieldRepository;
use App\Repositories\EarningRepository;
use App\Repositories\EProviderRepository;
use Flash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;
use Prettus\Repository\Exceptions\RepositoryException;
use Prettus\Validator\Exceptions\ValidatorException;

class EarningController extends Controller
{
    /** @var  EarningRepository */
    private $earningRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;

    /**
     * @var EProviderRepository
     */
    private $eProviderRepository;

    /**
     * @var BookingRepository
     */
    private $bookingRepository;

    public function __construct(EarningRepository $earningRepo, CustomFieldRepository $customFieldRepo, EProviderRepository $eProviderRepo, BookingRepository $bookingRepository)
    {
        parent::__construct();
        $this->earningRepository = $earningRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->eProviderRepository = $eProviderRepo;
        $this->bookingRepository = $bookingRepository;
    }

    /**
     * Display a listing of the Earning.
     *
     * @param EarningDataTable $earningDataTable
     * @return Response
     */
    public function index(EarningDataTable $earningDataTable)
    {
        return $earningDataTable->render('earnings.index');
    }

    /**
     * Show the form for creating a new Earning.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        $eProviders = $this->eProviderRepository->all();
        foreach ($eProviders as $eProvider) {
            try {
                $this->bookingRepository->pushCriteria(new BookingsOfProviderCriteria($eProvider->id));
                $this->bookingRepository->pushCriteria(new PaidBookingsCriteria());
                $bookings = $this->bookingRepository->all();
                $bookingsCount = $bookings->count();

                $bookingsTotals = $bookings->map(function ($booking) {
                    return $booking->getTotal();
                })->toArray();

                $bookingsTaxes = $bookings->map(function ($booking) {
                    return $booking->getTaxesValue();
                })->toArray();

                $total = array_reduce($bookingsTotals, function ($total1, $total2) {
                    return $total1 + $total2;
                }, 0);

                $tax = array_reduce($bookingsTaxes, function ($tax1, $tax2) {
                    return $tax1 + $tax2;
                }, 0);
                $this->earningRepository->updateOrCreate(['e_provider_id' => $eProvider->id], [
                        'total_bookings' => $bookingsCount,
                        'total_earning' => $total - $tax,
                        'taxes' => $tax,
                        'admin_earning' => ($total - $tax) * (100 - $eProvider->eProviderType->commission) / 100,
                        'e_provider_earning' => ($total - $tax) * $eProvider->eProviderType->commission / 100,
                    ]
                );
            } catch (ValidatorException | RepositoryException $e) {
            } finally {
                $this->bookingRepository->resetCriteria();
            }
        }
        return redirect(route('earnings.index'));
    }

    /**
     * Store a newly created Earning in storage.
     *
     * @param CreateEarningRequest $request
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function store(CreateEarningRequest $request)
    {
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->earningRepository->model());
        try {
            $earning = $this->earningRepository->create($input);
            $earning->customFieldsValues()->createMany(getCustomFieldsValues($customFields, $request));

        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully', ['operator' => __('lang.earning')]));

        return redirect(route('earnings.index'));
    }

    /**
     * Remove the specified Earning from storage.
     *
     * @param int $id
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function destroy($id)
    {
        $earning = $this->earningRepository->findWithoutFail($id);

        if (empty($earning)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.earning')]));

            return redirect(route('earnings.index'));
        }

        $this->earningRepository->delete($id);

        Flash::success(__('lang.deleted_successfully', ['operator' => __('lang.earning')]));
        return redirect(route('earnings.index'));
    }
}
