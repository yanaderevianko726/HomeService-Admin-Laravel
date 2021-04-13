@extends('layouts.settings.default')
@push('css_lib')
    <link rel="stylesheet" href="{{asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush
@section('settings_title',trans('lang.tax'))
@section('settings_content')
    @include('flash::message')
    @include('adminlte-templates::common.errors')
    <div class="clearfix"></div>
    <div class="card shadow-sm">
        <div class="card-header">
            <ul class="nav nav-tabs d-flex flex-row align-items-start card-header-tabs">
                @can('taxes.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{!! route('taxes.index') !!}"><i class="fas fa-list mr-2"></i>{{trans('lang.tax_table')}}</a>
                    </li>
                @endcan
                @can('taxes.create')
                    <li class="nav-item">
                        <a class="nav-link" href="{!! route('taxes.create') !!}"><i class="fas fa-plus mr-2"></i>{{trans('lang.tax_create')}}</a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a class="nav-link active" href="{!! url()->current() !!}"><i class="fas fa-edit mr-2"></i>{{trans('lang.tax_edit')}}</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            {!! Form::model($tax, ['route' => ['taxes.update', $tax->id], 'method' => 'patch']) !!}
            <div class="row">
                @include('settings.taxes.fields')
            </div>
            {!! Form::close() !!}
            <div class="clearfix"></div>
        </div>
    </div>
@endsection
@push('scripts_lib')
    <script src="{{asset('vendor/select2/js/select2.full.min.js')}}"></script>
@endpush
