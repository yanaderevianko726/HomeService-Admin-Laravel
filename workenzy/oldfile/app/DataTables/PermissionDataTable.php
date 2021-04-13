<?php
/*
 * File name: PermissionDataTable.php
 * Last modified: 2021.01.23 at 11:14:43
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\DataTables;

use App\Models\Post;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class PermissionDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
            ->editColumn('class',function ($permission){
                return explode('.',$permission->name)[0];
            })
            ->editColumn('roles', function ($permission) {
                return json_encode(['permission' => $permission->name, 'roles' => $permission->roles->pluck('name')->toArray()]);
            })
            ->addColumn('action', 'settings.permissions.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Permission $model)
    {
        return $model->newQuery()->with('roles');

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
            ->addAction(['title'=>trans('lang.actions'),'width' => '80px', 'printable' => false ,'responsivePriority'=>'100'])
            ->parameters(array_merge(
                config('datatables-buttons.parameters'), [
                    'language' => json_decode(
                        file_get_contents(base_path('resources/lang/' . app()->getLocale() . '/datatable.json')
                        ), true),
                    'rowGroup' => [
                        'dataSrc' => 'class'
                    ],
                    'colReorder' => false,
                    'fixedColumns' => false,
                    "initComplete" => "function(settings){console.log('initComplete'); renderButtons( settings.sTableId); renderiCheck(settings.sTableId)}",
                    "stateSaveParams" => "function(settings){console.log('stateSaveParams'); renderiCheck(settings.sTableId);}"
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
                'title' => trans('lang.permission_name'),
                'searchable' => true
            ],
            [
                'data' => 'class',
                'title' => trans('lang.permission_class'),
                'visible' => false,
                'className' => "hide",
                'searchable' => false
            ],
            [
                'data' => 'guard_name',
                'title' => trans('lang.permission_guard_name'),
                'searchable' => false,
            ],
            [
                'data' => 'roles',
                'title' => trans('lang.role_plural'),
                'visible' => false,
                'className' => "hide",
                'searchable' => false
            ],
        ];


        $roles = Role::select('id','name')->get();
        foreach ($roles as $role){
            $newColumn['data'] = 'roles';
            $newColumn['title'] = $role->name;
            $newColumn['searchable'] = 'false';
            $newColumn['exportable'] = 'false';
            $newColumn['printable'] = 'false';
            $newColumn['render'] = 'function(){return "<div class=\'icheck-default icheck-permission\'><input  type=\'checkbox\' name=\'namehere\' class=\'permission\' data-role-name=\'' . $role->name . '\' data-role-id=\'' . $role->id . '\' data-permission=\'"+data+"\'><label for=\'namehere\'></label></div>"}';
            $columns[] = $newColumn;
        }
        return $columns;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'permissionsdatatable_' . time();
    }
}
