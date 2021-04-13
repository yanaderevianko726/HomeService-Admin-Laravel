@extends('layouts.settings.default')
@push('css_lib')
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- select2 -->
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('vendor/summernote/summernote-bs4.min.css')}}">
    {{--dropzone--}}
    <link rel="stylesheet" href="{{asset('vendor/dropzone/min/dropzone.min.css')}}">
@endpush
@section('settings_title',trans('lang.user_table'))
@section('settings_content')
    @include('flash::message')
    @include('adminlte-templates::common.errors')
    <div class="clearfix"></div>
    <div class="card shadow-sm">
        <div class="card-header">
            <ul class="nav nav-tabs d-flex flex-row align-items-start card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="{!! url()->current() !!}"><i class="fas fa-cog mr-2"></i>{{trans('lang.app_setting_'.$tab)}}</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            {!! Form::open(['url' => ['settings/update'], 'method' => 'patch']) !!}
            <div class="row">
                <div class="d-flex flex-column col-sm-12 col-md-6">

                    <!-- date_format Field -->
                    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
                        {!! Form::label('date_format', trans("lang.app_setting_date_format"), ['class' => 'col-4 control-label text-right']) !!}
                        <div class="col-8">
                            {!! Form::text('date_format', setting('date_format'),  ['class' => 'form-control','placeholder'=>  trans("lang.app_setting_date_format_placeholder")]) !!}
                            <div class="form-text text-muted">
                                {!! trans("lang.app_setting_date_format_help") !!}
                            </div>
                        </div>
                    </div>

                    <!-- 'Boolean is_human_date_format Field' -->
                    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
                        {!! Form::label('is_human_date_format', trans("lang.app_setting_is_human_date_format"),['class' => 'col-4 control-label text-right']) !!}
                        <div class="checkbox icheck">
                            <label class="col-8 ml-2 form-check-inline">
                                {!! Form::hidden('is_human_date_format', null) !!}
                                {!! Form::checkbox('is_human_date_format', 1, setting('is_human_date_format', false)) !!}
                            </label>
                        </div>
                    </div>

                    <!-- Lang Field -->
                    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
                        {!! Form::label('language', trans("lang.app_setting_language"),['class' => 'col-4 control-label text-right']) !!}
                        <div class="col-8">
                            {!! Form::select('language', $languages, setting('language'), ['class' => 'select2 form-control']) !!}
                            <div class="form-text text-muted">{{ trans("lang.app_setting_language_help") }}</div>
                        </div>
                    </div>

                </div>
                <div class="d-flex flex-column col-sm-12 col-md-6">

                    <!-- timezone Field -->
                    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
                        {!! Form::label('timezone', trans("lang.app_setting_timezone"),['class' => 'col-4 control-label text-right']) !!}
                        <div class="col-8">
                            {!! Form::select('timezone', $timezones, setting('timezone'), ['class' => 'select2 form-control']) !!}
                            <div class="form-text text-muted">{{ trans("lang.app_setting_timezone_help") }}</div>
                        </div>
                    </div>

                </div>
                <!-- Submit Field -->
                <div class="form-group mt-4 col-12 text-right">
                    <button type="submit" class="btn bg-{{setting('theme_color')}} mx-md-3 my-lg-0 my-xl-0 my-md-0 my-2">
                        <i class="fas fa-save"></i> {{trans('lang.save')}} {{trans('lang.app_setting_localisation')}}
                    </button>
                    <a href="{!! route('users.index') !!}" class="btn btn-default"><i class="fas fa-undo"></i> {{trans('lang.cancel')}}</a>
                </div>
            </div>
            {!! Form::close() !!}
            <div class="clearfix"></div>
        </div>
    </div>
    </div>
    @include('layouts.media_modal',['collection'=>null])
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
