@extends('layouts.settings.default')
@push('css_lib')
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css')}}">
@endpush
@section('settings_title',trans('lang.permission_table'))

@section('settings_content')
    @include('flash::message')
    <div class="card shadow-sm">
        <div class="card-header">
            <ul class="nav nav-tabs d-flex flex-md-row flex-column-reverse align-items-start card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="{!! route('permissions.index') !!}"><i class="fas fa-list mr-2"></i>{{trans('lang.permission_table')}}</a>
                </li>
                @can('permissions.create')
                    <li class="nav-item">
                        <a class="nav-link" href="{!! route('permissions.create') !!}"><i class="fas fa-plus mr-2"></i>{{trans('lang.permission_create')}}</a>
                    </li>
                @endcan
                @can('roles.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{!! route('roles.index') !!}"><i class="fas fa-list mr-2"></i>{{trans('lang.role_table')}}</a>
                    </li>
                @endcan
                @can('roles.create')
                    <li class="nav-item">
                        <a class="nav-link" href="{!! route('roles.create') !!}"><i class="fas fa-plus mr-2"></i>{{trans('lang.role_create')}}</a>
                    </li>
                @endcan

                @include('layouts.right_toolbar', compact('dataTable'))
            </ul>
        </div>
        <div class="card-body">
            @include('settings.permissions.table')
            <div class="clearfix"></div>
        </div>
    </div>
@endsection

