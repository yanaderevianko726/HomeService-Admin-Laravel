@extends('layouts.settings.default')
@push('css_lib')
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css')}}">
@endpush
@section('settings_title',trans('lang.role_edit'))
@section('settings_content')
    @include('adminlte-templates::common.errors')
    <div class="card shadow-sm">
        <div class="card-header">
            <ul class="nav nav-tabs d-flex flex-row align-items-start card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{!! route('permissions.index') !!}"><i class="fas fa-list mr-2"></i>{{trans('lang.permission_table')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{!! route('permissions.create') !!}"><i class="fas fa-plus mr-2"></i>{{trans('lang.permission_create')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{!! route('roles.index') !!}"><i class="fas fa-list mr-2"></i>{{trans('lang.role_table')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{!! route('roles.edit', $role->id) !!}"><i class="fas fa-pencil mr-2"></i>{{trans('lang.role_edit')}}</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'patch']) !!}
            <div class="row">
                @include('settings.roles.fields')
            </div>
        </div>
        {!! Form::close() !!}
        <div class="clearfix"></div>
    </div>
    </div>
@endsection
