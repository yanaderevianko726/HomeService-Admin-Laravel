<?php
/*
 * File name: SlideDataTable.php
 * Last modified: 2021.01.25 at 15:24:39
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\DataTables;

use App\Models\CustomField;
use App\Models\Slide;
use Barryvdh\DomPDF\Facade as PDF;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class SlideDataTable extends DataTable
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
            ->editColumn('image', function ($slide) {
                return getMediaColumn($slide, 'image');
            })
            ->editColumn('text_color', function ($slide) {
                return getColorColumn($slide, 'text_color');
            })
            ->editColumn('background_color', function ($slide) {
                return getColorColumn($slide, 'background_color');
            })
            ->editColumn('button_color', function ($slide) {
                return getColorColumn($slide, 'button_color');
            })
            ->editColumn('indicator_color', function ($slide) {
                return getColorColumn($slide, 'indicator_color');
            })
            ->editColumn('e_service.name', function ($slide) {
                return getLinksColumnByRouteName([$slide->eService], 'eServices.edit', 'id', 'name');
            })
            ->editColumn('e_provider.name', function ($slide) {
                return getLinksColumnByRouteName([$slide->eProvider], 'eProviders.edit', 'id', 'name');
            })
            ->editColumn('updated_at', function ($slide) {
                return getDateColumn($slide);
            })
            ->editColumn('enabled', function ($slide) {
                return getBooleanColumn($slide, 'enabled');
            })
            ->addColumn('action', 'slides.datatables_actions')
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
                'data' => 'order',
                'title' => trans('lang.slide_order'),

            ],
            [
                'data' => 'text',
                'title' => trans('lang.slide_text'),

            ],
            [
                'data' => 'button',
                'title' => trans('lang.slide_button'),

            ],
            [
                'data' => 'text_color',
                'title' => trans('lang.slide_text_color'),

            ],
            [
                'data' => 'button_color',
                'title' => trans('lang.slide_button_color'),

            ],
            [
                'data' => 'background_color',
                'title' => trans('lang.slide_background_color'),

            ],
            [
                'data' => 'indicator_color',
                'title' => trans('lang.slide_indicator_color'),

            ],
            [
                'data' => 'image',
                'title' => trans('lang.slide_image'),
                'searchable' => false, 'orderable' => false, 'exportable' => false, 'printable' => false,
            ],
            [
                'data' => 'e_service.name',
                'name' => 'eService.name',
                'title' => trans('lang.slide_e_service_id'),

            ],
            [
                'data' => 'e_provider.name',
                'name' => 'eProvider.name',
                'title' => trans('lang.slide_e_provider_id'),

            ],
            [
                'data' => 'enabled',
                'title' => trans('lang.slide_enabled'),

            ],
            [
                'data' => 'updated_at',
                'title' => trans('lang.slide_updated_at'),
                'searchable' => false,
            ]
        ];

        $hasCustomField = in_array(Slide::class, setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFieldsCollection = CustomField::where('custom_field_model', Slide::class)->where('in_table', '=', true)->get();
            foreach ($customFieldsCollection as $key => $field) {
                array_splice($columns, $field->order - 1, 0, [[
                    'data' => 'custom_fields.' . $field->name . '.view',
                    'title' => trans('lang.slide_' . $field->name),
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
     * @param Slide $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Slide $model)
    {
        return $model->newQuery()->with("eService")->with("eProvider");
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
                        ), true),
                    'order' => [ [0, 'asc'] ],
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
        return 'slidesdatatable_' . time();
    }
}
