<?php
/*
 * File name: PaymentDataTable.php
 * Last modified: 2021.01.28 at 23:46:25
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\DataTables;

use App\Models\CustomField;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade as PDF;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class PaymentDataTable extends DataTable
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
            ->editColumn('updated_at', function ($payment) {
                return getDateColumn($payment, 'updated_at');
            })->editColumn('amount', function ($payment) {
                return getPriceColumn($payment, 'amount');
            })
            ->editColumn('user.name', function ($payment) {
                return getLinksColumnByRouteName([$payment->user], 'users.edit', 'id', 'name');
            })
            ->addColumn('action', 'payments.datatables_actions')
            ->rawColumns($columns);

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
                'data' => 'amount',
                'title' => trans('lang.payment_amount'),

            ],
            [
                'data' => 'description',
                'title' => trans('lang.payment_description'),

            ],
            [
                'data' => 'user.name',
                'title' => trans('lang.payment_user_id'),

            ],
            [
                'data' => 'payment_method.name',
                'name' => 'paymentMethod.name',
                'title' => trans('lang.payment_payment_method_id'),

            ],
            [
                'data' => 'payment_status.status',
                'name' => 'paymentStatus.status',
                'title' => trans('lang.payment_payment_status_id'),

            ],
            [
                'data' => 'updated_at',
                'title' => trans('lang.payment_updated_at'),
                'searchable' => false,
            ]
        ];

        $hasCustomField = in_array(Payment::class, setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFieldsCollection = CustomField::where('custom_field_model', Payment::class)->where('in_table', '=', true)->get();
            foreach ($customFieldsCollection as $key => $field) {
                array_splice($columns, $field->order - 1, 0, [[
                    'data' => 'custom_fields.' . $field->name . '.view',
                    'title' => trans('lang.payment_' . $field->name),
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
     * @param Payment $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Payment $model)
    {
        return $model->newQuery()->with("user")->with("paymentMethod")->with("paymentStatus");
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
        return 'paymentsdatatable_' . time();
    }
}
