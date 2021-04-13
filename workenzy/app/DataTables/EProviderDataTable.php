<?php
/*
 * File name: EProviderDataTable.php
 * Last modified: 2021.03.04 at 12:29:54
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\DataTables;

use App\Models\CustomField;
use App\Models\EProvider;
use Barryvdh\DomPDF\Facade as PDF;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;

class EProviderDataTable extends DataTable
{
    /**
     * custom fields columns
     * @var array
     */
    public static $customFields = [];

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        $columns = array_column($this->getColumns(), 'data');
        $dataTable = $dataTable
            ->editColumn('image', function ($eProvider) {
                return getMediaColumn($eProvider, 'image');
            })
            ->editColumn('name', function ($eProvider) {
                if ($eProvider['featured']) {
                    return $eProvider['name'] . "<span class='badge bg-" . setting('theme_color') . " p-1 m-2'>" . trans('lang.e_service_featured') . "</span>";
                }
                return $eProvider['name'];
            })
            ->editColumn('e_provider_type.name', function ($eProvider) {
                return getLinksColumnByRouteName([$eProvider->eProviderType], "eProviderTypes.edit", 'id', 'name');
            })
            ->editColumn('country.name', function ($country) {
                
                return trans('lang.'.str_replace(" ","_",$country->country->name));
                //getLinksColumnByRouteName([$country->country], "countries.edit", 'id', 'name');
            })
            ->editColumn('users', function ($eProvider) {
                return getLinksColumnByRouteName($eProvider->users, 'users.edit', 'id', 'name');
            })->editColumn('addresses', function ($eProvider) {
                return getLinksColumnByRouteName($eProvider->addresses, 'addresses.edit', 'id', 'address');
            })->editColumn('taxes', function ($eProvider) {
                return getLinksColumnByRouteName($eProvider->taxes, 'taxes.edit', 'id', 'name');
            })
            ->editColumn('available', function ($eProvider) {
                return getBooleanColumn($eProvider, 'available');
            })
            ->editColumn('accepted', function ($eProvider) {
                return getBooleanColumn($eProvider, 'accepted');
            })
            ->editColumn('updated_at', function ($eProvider) {
                return getDateColumn($eProvider);
            })
            ->addColumn('action', 'e_providers.datatables_actions')
            ->rawColumns(array_merge($columns, ['action']));

        return $dataTable;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        $columns = [
            [
                'data' => 'image',
                'title' => trans('lang.e_provider_image'),
                'searchable' => false, 'orderable' => false, 'exportable' => false, 'printable' => false,
            ],
            [
                'data' => 'name',
                'title' => trans('lang.e_provider_name'),

            ],
            [
                'data' => 'e_provider_type.name',
                'name' => 'eProviderType.name',
                'title' => trans('lang.e_provider_e_provider_type_id'),

            ],
            [
                'data' => 'country.name',
                'name' => 'country.name',
                'title' => trans('lang.country'),
            ],
            [
                'data' => 'users',
                'title' => trans('lang.e_provider_users'),
                'searchable' => false,
                'orderable' => false
            ],
            [
                'data' => 'phone_number',
                'title' => trans('lang.e_provider_phone_number'),

            ],
            [
                'data' => 'mobile_number',
                'title' => trans('lang.e_provider_mobile_number'),

            ],
            [
                'data' => 'addresses',
                'title' => trans('lang.e_provider_addresses'),
                'searchable' => false,
                'orderable' => false
            ],
            [
                'data' => 'availability_range',
                'title' => trans('lang.e_provider_availability_range'),

            ],
            [
                'data' => 'taxes',
                'title' => trans('lang.e_provider_taxes'),
                'searchable' => false,
                'orderable' => false
            ],
            [
                'data' => 'available',
                'title' => trans('lang.e_provider_available'),

            ], [
                'data' => 'accepted',
                'title' => trans('lang.e_provider_accepted'),

            ],
            [
                'data' => 'updated_at',
                'title' => trans('lang.address_updated_at'),
                'searchable' => false,
            ]
        ];

        $hasCustomField = in_array(EProvider::class, setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFieldsCollection = CustomField::where('custom_field_model', EProvider::class)->where('in_table', '=', true)->get();
            foreach ($customFieldsCollection as $key => $field) {
                array_splice($columns, $field->order - 1, 0, [[
                    'data' => 'custom_fields.' . $field->name . '.view',
                    'title' => trans('lang.e_provider_' . $field->name),
                    'orderable' => false,
                    'searchable' => false,
                ]]);
            }
        }
        return $columns;
    }

    /**
     * Get query source of dataTable.
     *
     * @param EProvider $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(EProvider $model, Request $input)
    {
        if (auth()->user()->hasRole('admin')) {
            if($input->get('country_id'))
            {
                return $model->newQuery()
                    ->with("eProviderType")
                    ->with("country")
                    ->where('country_id',$input->get('country_id'))
                    ->select("e_providers.*");
            }
            /* else{
                return $model->newQuery()
                ->with("eProviderType")
                ->with("country")
                ->select("e_providers.*");
            } */
        } else if (auth()->user()->hasRole('provider')) {
            return $model->newQuery()
                ->with("eProviderType")
                ->with("country")
                ->join("e_provider_users", "e_provider_id", "=", "e_providers.id")
                ->where('e_provider_users.user_id', auth()->id())
                ->groupBy("e_providers.id")
                ->select("e_providers.*");
        } else {
            return $model->newQuery();
        }
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '80px', 'printable' => false, 'responsivePriority' => '100'])
            ->parameters(array_merge(
                config('datatables-buttons.parameters'), [
                    'language' => json_decode(
                        file_get_contents(base_path('resources/lang/' . app()->getLocale() . '/datatable.json')
                        ), true)
                ]
            ));
    }

    /**
     * Export PDF using DOMPDF
     * @return mixed
     */
    public function pdf()
    {
        $data = $this->getDataForPrint();
        $pdf = PDF::loadView($this->printPreview, compact('data'));
        return $pdf->download($this->filename() . '.pdf');
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'e_providersdatatable_' . time();
    }
}
