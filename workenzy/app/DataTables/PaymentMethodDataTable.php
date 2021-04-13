<?php
/*
 * File name: PaymentMethodDataTable.php
 * Last modified: 2021.01.12 at 00:22:28
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\DataTables;

use App\Models\CustomField;
use App\Models\PaymentMethod;
use App\Models\Post;
use Barryvdh\DomPDF\Facade as PDF;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class PaymentMethodDataTable extends DataTable
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
            ->editColumn('logo', function ($payment_method) {
                return getMediaColumn($payment_method, 'logo');
            })
            ->editColumn('updated_at', function ($payment_method) {
                return getDateColumn($payment_method, 'updated_at');
            })
            ->editColumn('default', function ($payment_method) {
                return getBooleanColumn($payment_method, 'default');
            })
            ->editColumn('enabled', function ($payment_method) {
                return getBooleanColumn($payment_method, 'enabled');
            })
            ->addColumn('action', 'payment_methods.datatables_actions')
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
                'data' => 'logo',
                'title' => trans('lang.payment_method_logo'),
                'searchable' => false, 'orderable' => false, 'exportable' => false, 'printable' => false,
            ],
            [
                'data' => 'name',
                'title' => trans('lang.payment_method_name'),

            ],
            [
                'data' => 'description',
                'title' => trans('lang.payment_method_description'),

            ],
            [
                'data' => 'route',
                'title' => trans('lang.payment_method_route'),

            ],
            [
                'data' => 'order',
                'title' => trans('lang.payment_method_order'),

            ],
            [
                'data' => 'default',
                'title' => trans('lang.payment_method_default'),

            ],
            [
                'data' => 'enabled',
                'title' => trans('lang.payment_method_enabled'),

            ],
            [
                'data' => 'updated_at',
                'title' => trans('lang.payment_method_updated_at'),
                'searchable' => false,
            ]
        ];

        $hasCustomField = in_array(PaymentMethod::class, setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFieldsCollection = CustomField::where('custom_field_model', PaymentMethod::class)->where('in_table', '=', true)->get();
            foreach ($customFieldsCollection as $key => $field) {
                array_splice($columns, $field->order - 1, 0, [[
                    'data' => 'custom_fields.' . $field->name . '.view',
                    'title' => trans('lang.payment_method_' . $field->name),
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
     * @param Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PaymentMethod $model)
    {
        return $model->newQuery();
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
        return 'payment_methodsdatatable_' . time();
    }
}
