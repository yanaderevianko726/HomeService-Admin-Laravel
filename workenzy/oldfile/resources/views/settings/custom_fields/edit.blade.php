@extends('layouts.settings.default')
@push('css_lib')
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- select2 -->
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush
@section('settings_title',trans('lang.custom_field_edit'))
@section('settings_content')
    @include('flash::message')
    <div class="card shadow-sm">
        <div class="card-header">
            <ul class="nav nav-tabs d-flex flex-row align-items-start card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{!! route('customFields.index') !!}"><i class="fas fa-list mr-2"></i>{{trans('lang.custom_field_table')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{!! route('customFields.create') !!}"><i class="fas fa-plus mr-2"></i>{{trans('lang.custom_field_create')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{!! url()->current() !!}"><i class="fas fa-pencil mr-2"></i>{{trans('lang.custom_field_edit')}}</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            {!! Form::model($customField, ['route' => ['customFields.update', $customField->id], 'method' => 'patch']) !!}
            <div class="row">
                @include('settings.custom_fields.fields')
            </div>
            {!! Form::close() !!}
            <div class="clearfix"></div>
        </div>
    </div>
    </div>
    @include('layouts.media_modal')
@endsection
@push('scripts_lib')
    <!-- iCheck -->

    <!-- select2 -->
    <script src="{{asset('vendor/select2/js/select2.full.min.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('vendor/summernote/summernote.min.js')}}"></script>
    {{--dropzone--}}
    <script src="{{asset('vendor/dropzone/min/dropzone.min.js')}}"></script>
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        var dropzoneFields = [];
    </script>
@endpush
