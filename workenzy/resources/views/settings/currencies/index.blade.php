@extends('layouts.settings.default')
@push('css_lib')
    <!-- select2 -->
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush
@section('settings_title',trans('lang.currency'))
@section('settings_content')
    @include('flash::message')
    @include('adminlte-templates::common.errors')
    <div class="clearfix"></div>
    <div class="card shadow-sm">
        <div class="card-header">
            <ul class="nav nav-tabs d-flex flex-md-row flex-column-reverse align-items-start card-header-tabs">
                <div class="d-flex flex-row">
                    <li class="nav-item">
                        <a class="nav-link active" href="{!! url()->current() !!}"><i class="fas fa-list mr-2"></i>{{trans('lang.currency_table')}}</a>
                    </li>
                    @can('currencies.create')
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('currencies.create') !!}"><i class="fas fa-plus mr-2"></i>{{trans('lang.currency_create')}}</a>
                        </li>
                    @endcan
                </div>
                @include('layouts.right_toolbar', compact('dataTable'))
            </ul>
        </div>
        <div class="card-body">
            @include('settings.currencies.table')
            <div class="clearfix"></div>
        </div>
    </div>
    @include('layouts.media_modal',['collection'=>null])
@endsection

@push('scripts_lib')
    <!-- select2 -->
    <script src="{{asset('vendor/select2/js/select2.full.min.js')}}"></script>
@endpush

