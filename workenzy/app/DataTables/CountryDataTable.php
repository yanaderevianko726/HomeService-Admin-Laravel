<?php

namespace App\DataTables;

use App\Models\CustomField;
use App\Models\Country;
use Barryvdh\DomPDF\Facade as PDF;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;


class CountryDataTable extends DataTable
{
    
    public static $customFields = [];
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        $columns = array_column($this->getColumns(), 'data');
        $dataTable = $dataTable
        ->editColumn('name', function($data){
            $link = '<a href="'.url("/eProviders?country_id=$data->id").'">'.trans('lang.'.str_replace(" ","_",$data->name)).'</a>';
            return $link;
        })
        ->editColumn('created_at', function ($data) {
            return getDateColumn($data, 'created_at');
        })
        ->editColumn('updated_at', function ($data) {
            return getDateColumn($data, 'updated_at');
        })
        ->addColumn('action', 'countries.datatables_actions')
        ->rawColumns(array_merge($columns, ['action']));

        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Country $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Country $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
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
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
       $columns = [
            [
                'data' => 'name',
                'title' => trans('lang.country_list_field_name'),

            ],
            [
                'data' => 'created_at',
                'title' => trans('lang.country_list_field_created_at'),
                'searchable' => false,
            ],
            [
                'data' => 'updated_at',
                'title' => trans('lang.country_list_field_updated_at'),
                'searchable' => false,
            ]
        ];

        $hasCustomField = in_array(Country::class, setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFieldsCollection = CustomField::where('custom_field_model', Country::class)->where('in_table', '=', true)->get();
            foreach ($customFieldsCollection as $key => $field) {
                array_splice($columns, $field->order - 1, 0, [[
                    'data' => 'custom_fields.' . $field->name . '.view',
                    'title' => trans('lang.country_list_field_' . $field->name),
                    'orderable' => false,
                    'searchable' => false,
                ]]);
            }
        }
        return $columns;
    }

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
        return 'country_' . time();
    }
}
