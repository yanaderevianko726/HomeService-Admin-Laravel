<?php
/*
 * File name: EarningDataTable.php
 * Last modified: 2021.01.30 at 15:14:12
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\DataTables;

use App\Models\CustomField;
use App\Models\Earning;
use Barryvdh\DomPDF\Facade as PDF;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class EarningDataTable extends DataTable
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
            ->editColumn('e_provider.name', function ($earning) {
                return getLinksColumnByRouteName([$earning->eProvider], "eProviders.edit", 'id', 'name');
            })
            ->editColumn('updated_at', function ($earning) {
                return getDateColumn($earning);
            })
            ->editColumn('total_earning', function ($earning) {
                return getPriceColumn($earning, 'total_earning');
            })
            ->editColumn('admin_earning', function ($earning) {
                return getPriceColumn($earning, 'admin_earning');
            })
            ->editColumn('e_provider_earning', function ($earning) {
                return getPriceColumn($earning, 'e_provider_earning');
            })
            ->editColumn('taxes', function ($earning) {
                return getPriceColumn($earning, 'taxes');
            })
            ->addColumn('action', 'earnings.datatables_actions')
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
                'data' => 'e_provider.name',
                'name' => 'eProvider.name',
                'title' => trans('lang.earning_e_provider_id'),

            ],
            [
                'data' => 'total_bookings',
                'title' => trans('lang.earning_total_bookings'),

            ],
            [
                'data' => 'total_earning',
                'title' => trans('lang.earning_total_earning'),

            ],
            [
                'data' => 'admin_earning',
                'title' => trans('lang.earning_admin_earning'),

            ],
            [
                'data' => 'e_provider_earning',
                'title' => trans('lang.earning_e_provider_earning'),

            ],
            [
                'data' => 'taxes',
                'title' => trans('lang.earning_taxes'),

            ],
            [
                'data' => 'updated_at',
                'title' => trans('lang.earning_updated_at'),
                'searchable' => false,
            ]
        ];

        $hasCustomField = in_array(Earning::class, setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFieldsCollection = CustomField::where('custom_field_model', Earning::class)->where('in_table', '=', true)->get();
            foreach ($customFieldsCollection as $key => $field) {
                array_splice($columns, $field->order - 1, 0, [[
                    'data' => 'custom_fields.' . $field->name . '.view',
                    'title' => trans('lang.earning_' . $field->name),
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
     * @param Earning $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Earning $model)
    {
        if (auth()->user()->hasRole('admin')) {
            return $model->newQuery()->with("eProvider")->select('earnings.*');
        } else if ((auth()->user()->hasRole('provider'))) {
            return $model->newQuery()->with("eProvider")
                ->join("e_provider_users", "e_provider_users.e_provider_id", "=", "earnings.e_provider_id")
                ->where('e_provider_users.user_id', auth()->id())->select('earnings.*');
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
        return 'earningsdatatable_' . time();
    }
}
