<?php
/*
 * File name: EProviderPayoutDataTable.php
 * Last modified: 2021.01.30 at 15:38:36
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\DataTables;

use App\Models\CustomField;
use App\Models\EProviderPayout;
use Barryvdh\DomPDF\Facade as PDF;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class EProviderPayoutDataTable extends DataTable
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
            ->editColumn('updated_at', function ($eProviderPayout) {
                return getDateColumn($eProviderPayout);

            })
            ->editColumn('amount', function ($eproviders_payout) {
                return getPriceColumn($eproviders_payout, 'amount');
            })
            ->rawColumns(array_merge($columns));

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
                'title' => trans('lang.e_provider_payout_e_provider_id'),

            ],
            [
                'data' => 'method',
                'title' => trans('lang.e_provider_payout_method'),

            ],
            [
                'data' => 'amount',
                'title' => trans('lang.e_provider_payout_amount'),

            ],
            [
                'data' => 'paid_date',
                'title' => trans('lang.e_provider_payout_paid_date'),

            ],
            [
                'data' => 'note',
                'title' => trans('lang.e_provider_payout_note'),

            ],
            [
                'data' => 'updated_at',
                'title' => trans('lang.e_provider_payout_updated_at'),
                'searchable' => false,
            ]
        ];

        $hasCustomField = in_array(EProviderPayout::class, setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFieldsCollection = CustomField::where('custom_field_model', EProviderPayout::class)->where('in_table', '=', true)->get();
            foreach ($customFieldsCollection as $key => $field) {
                array_splice($columns, $field->order - 1, 0, [[
                    'data' => 'custom_fields.' . $field->name . '.view',
                    'title' => trans('lang.e_provider_payout_' . $field->name),
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
     * @param EProviderPayout $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(EProviderPayout $model)
    {
        return $model->newQuery()->with("eProvider")->with("");
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
        return 'e_provider_payoutsdatatable_' . time();
    }
}
