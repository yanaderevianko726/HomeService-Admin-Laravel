<?php
/*
 * File name: BookingDataTable.php
 * Last modified: 2021.02.17 at 15:54:38
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\DataTables;

use App\Models\Booking;
use App\Models\CustomField;
use Barryvdh\DomPDF\Facade as PDF;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class BookingDataTable extends DataTable
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
            ->editColumn('id', function ($booking) {
                return "#" . $booking->id;
            })
            ->editColumn('booking_at', function ($booking) {
                return getDateColumn($booking, 'booking_at');
            })
            ->editColumn('user.name', function ($booking) {
                return getLinksColumnByRouteName([$booking->user], 'users.edit', 'id', 'name');
            })
            ->editColumn('e_service.name', function ($booking) {
                return getLinksColumnByRouteName([$booking->e_service], 'eServices.edit', 'id', 'name');
            })
            ->editColumn('e_provider.name', function ($booking) {
                return getLinksColumnByRouteName([$booking->e_provider], 'eProviders.edit', 'id', 'name');
            })
            ->editColumn('total', function ($booking) {
                return "<span class='text-bold text-success'>" . getPrice($booking->getTotal()) . "</span>";
            })
            ->editColumn('address', function ($booking) {
                return $booking->address->address;
            })
            ->editColumn('taxes', function ($booking) {
                return "<span class='text-bold'>" . getPrice($booking->getTaxesValue()) . "</span>";
            })
            ->editColumn('coupon', function ($booking) {
                return $booking->coupon->code . " <span class='text-bold'>(" . getPrice($booking->getCouponValue()) . ")</span>";
            })
            ->editColumn('booking_status.status', function ($booking) {
                return "<span class='badge px-2 py-1 bg-" . setting('theme_color') . "'>" . $booking->bookingStatus->status . "</span>";
            })
            ->editColumn('payment.payment_status.status', function ($booking) {
                if (isset($booking->payment)) {
                    return "<span class='badge px-2 py-1 bg-" . setting('theme_color') . "'>" . $booking->payment->paymentStatus->status . "</span>";
                } else {
                    return '-';
                }
            })
            ->setRowClass(function ($booking) {
                return $booking->cancel ? 'booking-cancel' : '';
            })
            ->addColumn('action', 'bookings.datatables_actions')
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
                'data' => 'id',
                'title' => trans('lang.booking_id'),
            ],
            [
                'data' => 'e_service.name',
                'name' => 'e_service',
                'title' => trans('lang.booking_e_service'),

            ],
            [
                'data' => 'e_provider.name',
                'name' => 'e_provider',
                'title' => trans('lang.booking_e_provider'),

            ],
            [
                'data' => 'user.name',
                'title' => trans('lang.booking_user_id'),
            ],
            [
                'data' => 'address',
                'name' => 'address',
                'title' => trans('lang.booking_address'),
            ],
            [
                'data' => 'booking_status.status',
                'name' => 'bookingStatus.status',
                'title' => trans('lang.booking_booking_status_id'),
            ],
            [
                'data' => 'payment.payment_status.status',
                'name' => 'payment.paymentStatus.status',
                'title' => trans('lang.payment_payment_status_id'),
            ],
            [
                'data' => 'taxes',
                'title' => trans('lang.booking_taxes'),
                'searchable' => false,
                'orderable' => false,

            ],
            [
                'data' => 'coupon',
                'title' => trans('lang.booking_coupon'),
                'searchable' => false,
                'orderable' => false,

            ],
            [
                'data' => 'total',
                'title' => trans('lang.booking_total'),
                'searchable' => false,
                'orderable' => false,

            ],
            [
                'data' => 'booking_at',
                'title' => trans('lang.booking_booking_at'),

            ],
        ];

        $hasCustomField = in_array(Booking::class, setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFieldsCollection = CustomField::where('custom_field_model', Booking::class)->where('in_table', '=', true)->get();
            foreach ($customFieldsCollection as $key => $field) {
                array_splice($columns, $field->order - 1, 0, [[
                    'data' => 'custom_fields.' . $field->name . '.view',
                    'title' => trans('lang.booking_' . $field->name),
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
     * @param Booking $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Booking $model)
    {
        return $model->newQuery()->with("user")->with("bookingStatus")->with("payment")->with("payment.paymentStatus")->select('bookings.*');
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
        return 'bookingsdatatable_' . time();
    }
}
