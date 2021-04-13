<?php
/*
 * File name: FavoriteDataTable.php
 * Last modified: 2021.01.23 at 20:55:23
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\DataTables;

use App\Models\CustomField;
use App\Models\Favorite;
use Barryvdh\DomPDF\Facade as PDF;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class FavoriteDataTable extends DataTable
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
            ->editColumn('updated_at', function ($favorite) {
                return getDateColumn($favorite, 'updated_at');
            })
            ->editColumn('options', function ($favorite) {
                return getArrayColumn($favorite->options, 'name');
            })
            ->editColumn('user.name', function ($favorite) {
                return getLinksColumnByRouteName([$favorite->user], 'users.edit', 'id', 'name');
            })
            ->editColumn('e_service.name', function ($favorite) {
                return getLinksColumnByRouteName([$favorite->eService], 'eServices.edit', 'id', 'name');
            })
            ->addColumn('action', 'favorites.datatables_actions')
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
                'data' => 'e_service.name',
                'name' => 'eService.name',
                'title' => trans('lang.e_service'),
            ],
            [
                'data' => 'options',
                'title' => trans('lang.favorite_options'),
                'searchable' => false,
                'orderable' => false,
            ],
            (auth()->check() && auth()->user()->hasRole('admin')) ? [
                'data' => 'user.name',
                'title' => trans('lang.user'),

            ] : null,
            [
                'data' => 'updated_at',
                'title' => trans('lang.favorite_updated_at'),
                'searchable' => false,
            ]
        ];
        $columns = array_filter($columns);
        $hasCustomField = in_array(Favorite::class, setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFieldsCollection = CustomField::where('custom_field_model', Favorite::class)->where('in_table', '=', true)->get();
            foreach ($customFieldsCollection as $key => $field) {
                array_splice($columns, $field->order - 1, 0, [[
                    'data' => 'custom_fields.' . $field->name . '.view',
                    'title' => trans('lang.favorite_' . $field->name),
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
     * @param Favorite $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Favorite $model)
    {
        if (auth()->user()->hasRole('admin')) {
            return $model->newQuery()->with("eService")->with("user")->select("favorites.*");
        } else {
            return $model->newQuery()->with("eService")->with("user")
                ->join("e_services", "e_services.id", "=", "favorites.e_service_id")
                ->join("e_provider_users", "e_provider_users.e_provider_id", "=", "e_services.e_provider_id")
                ->where('e_provider_users.user_id', auth()->id())
                ->select("favorites.*");
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
            ->addAction(['title' => trans('lang.actions'), 'width' => '80px', 'printable' => false, 'responsivePriority' => '100'])
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
        return 'favoritesdatatable_' . time();
    }
}
