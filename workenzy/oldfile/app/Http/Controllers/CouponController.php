<?php
/*
 * File name: CouponController.php
 * Last modified: 2021.02.05 at 10:52:12
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers;

use App\Criteria\Coupons\CouponsOfUserCriteria;
use App\Criteria\EProviders\AcceptedCriteria;
use App\Criteria\EProviders\EProvidersOfUserCriteria;
use App\Criteria\EServices\EServicesOfUserCriteria;
use App\DataTables\CouponDataTable;
use App\Http\Requests\CreateCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\CouponRepository;
use App\Repositories\CustomFieldRepository;
use App\Repositories\DiscountableRepository;
use App\Repositories\EProviderRepository;
use App\Repositories\EServiceRepository;
use Flash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;
use Prettus\Repository\Exceptions\RepositoryException;
use Prettus\Validator\Exceptions\ValidatorException;

class CouponController extends Controller
{
    /** @var  CouponRepository */
    private $couponRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;

    /**
     * @var EServiceRepository
     */
    private $eServiceRepository;
    /**
     * @var EProviderRepository
     */
    private $eProviderRepository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var DiscountableRepository
     */
    private $discountableRepository;

    public function __construct(CouponRepository $couponRepo, CustomFieldRepository $customFieldRepo, EServiceRepository $eServiceRepo
        , EProviderRepository $eProviderRepo
        , CategoryRepository $categoryRepo, DiscountableRepository $discountableRepository)
    {
        parent::__construct();
        $this->couponRepository = $couponRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->eServiceRepository = $eServiceRepo;
        $this->eProviderRepository = $eProviderRepo;
        $this->categoryRepository = $categoryRepo;
        $this->discountableRepository = $discountableRepository;
    }

    /**
     * Display a listing of the Coupon.
     *
     * @param CouponDataTable $couponDataTable
     * @return Response
     */
    public function index(CouponDataTable $couponDataTable)
    {
        return $couponDataTable->render('coupons.index');
    }

    /**
     * Show the form for creating a new Coupon.
     *
     * @return Application|Factory|Response|View
     * @throws RepositoryException
     */
    public function create()
    {
        $this->eServiceRepository->pushCriteria(new EServicesOfUserCriteria(auth()->id()));
        $eService = $this->eServiceRepository->groupedByEProviders();

        $this->eProviderRepository->pushCriteria(new EProvidersOfUserCriteria(auth()->id()));
        $this->eProviderRepository->pushCriteria(new AcceptedCriteria());
        $eProvider = $this->eProviderRepository->pluck('name', 'id');

        $category = $this->categoryRepository->pluck('name', 'id');

        $eServicesSelected = [];
        $eProvidersSelected = [];
        $categoriesSelected = [];

        $hasCustomField = in_array($this->couponRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->couponRepository->model());
            $html = generateCustomField($customFields);
        }
        return view('coupons.create')->with("customFields", isset($html) ? $html : false)->with("eService", $eService)->with("eProvider", $eProvider)->with("category", $category)->with("eServicesSelected", $eServicesSelected)->with("eProvidersSelected", $eProvidersSelected)->with("categoriesSelected", $categoriesSelected);
    }

    /**
     * Store a newly created Coupon in storage.
     *
     * @param CreateCouponRequest $request
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function store(CreateCouponRequest $request)
    {
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->couponRepository->model());
        try {
            $coupon = $this->couponRepository->create($input);
            $discountables = $this->initDiscountables($input);
            $coupon->discountables()->createMany($discountables);
            $coupon->customFieldsValues()->createMany(getCustomFieldsValues($customFields, $request));

        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully', ['operator' => __('lang.coupon')]));

        return redirect(route('coupons.index'));
    }

    /**
     * @param array $input
     * @return array
     */
    private function initDiscountables(array $input): array
    {
        $discountables = [];
        if (isset($input['eServices'])) {
            foreach ($input['eServices'] as $eServiceId) {
                $discountables[] = ["discountable_type" => "App\Models\EService", "discountable_id" => $eServiceId];
            }
        }
        if (isset($input['eProviders'])) {
            foreach ($input['eProviders'] as $eProviderId) {
                $discountables[] = ["discountable_type" => "App\Models\EProvider", "discountable_id" => $eProviderId];
            }
        }
        if (isset($input['categories'])) {
            foreach ($input['categories'] as $categoryId) {
                $discountables[] = ["discountable_type" => "App\Models\Category", "discountable_id" => $categoryId];
            }
        }
        return $discountables;
    }

    /**
     * Display the specified Coupon.
     *
     * @param int $id
     *
     * @return Application|Factory|Response|View
     */
    public function show(int $id)
    {
        $coupon = $this->couponRepository->findWithoutFail($id);

        if (empty($coupon)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.coupon')]));

            return redirect(route('coupons.index'));
        }

        return view('coupons.show')->with('coupon', $coupon);
    }

    /**
     * Show the form for editing the specified Coupon.
     *
     * @param int $id
     *
     * @return Application|RedirectResponse|Redirector|Response
     * @throws RepositoryException
     */
    public function edit(int $id)
    {
        $this->couponRepository->pushCriteria(new CouponsOfUserCriteria(auth()->id()));

        $coupon = $this->couponRepository->all()->firstWhere('id', '=', $id);

        if (empty($coupon)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.coupon')]));

            return redirect(route('coupons.index'));
        }
        $this->eServiceRepository->pushCriteria(new EServicesOfUserCriteria(auth()->id()));
        $eService = $this->eServiceRepository->groupedByEProviders();

        $this->eProviderRepository->pushCriteria(new EProvidersOfUserCriteria(auth()->id()));
        $this->eProviderRepository->pushCriteria(new AcceptedCriteria());
        $eProvider = $this->eProviderRepository->pluck('name', 'id');

        $category = $this->categoryRepository->pluck('name', 'id');

        $eServicesSelected = $coupon->discountables()->where("discountable_type", "App\Models\EService")->pluck('discountable_id');
        $eProvidersSelected = $coupon->discountables()->where("discountable_type", "App\Models\EProvider")->pluck('discountable_id');
        $categoriesSelected = $coupon->discountables()->where("discountable_type", "App\Models\Category")->pluck('discountable_id');

        $customFieldsValues = $coupon->customFieldsValues()->with('customField')->get();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->couponRepository->model());
        $hasCustomField = in_array($this->couponRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }

        return view('coupons.edit')->with('coupon', $coupon)->with("customFields", isset($html) ? $html : false)->with("eService", $eService)->with("eProvider", $eProvider)->with("category", $category)->with("eServicesSelected", $eServicesSelected)->with("eProvidersSelected", $eProvidersSelected)->with("categoriesSelected", $categoriesSelected);
    }

    /**
     * Update the specified Coupon in storage.
     *
     * @param int $id
     * @param UpdateCouponRequest $request
     *
     * @return Application|RedirectResponse|Redirector|Response
     * @throws RepositoryException
     */
    public function update(int $id, UpdateCouponRequest $request)
    {
        $this->couponRepository->pushCriteria(new CouponsOfUserCriteria(auth()->id()));

        $coupon = $this->couponRepository->all()->firstWhere('id', '=', $id);

        if (empty($coupon)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.coupon')]));
            return redirect(route('coupons.index'));
        }
        $input = $request->all();
        unset($input['code']);
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->couponRepository->model());
        try {
            $coupon = $this->couponRepository->update($input, $id);
            $discountables = $this->initDiscountables($input);
            $coupon->discountables()->delete();
            $coupon->discountables()->createMany($discountables);


            foreach (getCustomFieldsValues($customFields, $request) as $value) {
                $coupon->customFieldsValues()
                    ->updateOrCreate(['custom_field_id' => $value['custom_field_id']], $value);
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.updated_successfully', ['operator' => __('lang.coupon')]));

        return redirect(route('coupons.index'));
    }

    /**
     * Remove the specified Coupon from storage.
     *
     * @param int $id
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function destroy(int $id)
    {
        $coupon = $this->couponRepository->findWithoutFail($id);

        if (empty($coupon)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.coupon')]));

            return redirect(route('coupons.index'));
        }

        $this->couponRepository->delete($id);

        Flash::success(__('lang.deleted_successfully', ['operator' => __('lang.coupon')]));

        return redirect(route('coupons.index'));
    }
}
