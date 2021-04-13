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
                @foreach(['facebook','twitter','google'] as $social)
                    <h5 class="col-12 pb-4 @if(!$loop->first) custom-field-container @endif">
                        <i class="mr-3 fas fa-{{$social}}"></i>{!! trans('lang.app_setting_'.$social) !!}</h5>
                    <!-- 'Boolean enable_facebook Field' -->
                    <div class="form-group row col-12">
                        {!! Form::label('enable_'.$social, trans('lang.app_setting_enable_'.$social),['class' => 'col-2 control-label text-right']) !!}
                        <div class="checkbox icheck">
                            <label class="w-100 ml-2 form-check-inline">
                                {!! Form::hidden('enable_'.$social, null) !!}
                                {!! Form::checkbox('enable_'.$social, 1, setting('enable_'.$social, false)) !!}
                                <span class="ml-2">{!! trans('lang.app_setting_enable_'.$social.'_help') !!}</span> </label>
                        </div>
                </div>
                <!-- facebook_app_id Field -->
                <div class="form-group row col-6">
                    {!! Form::label($social.'_app_id', trans('lang.app_setting_'.$social.'_app_id'), ['class' => 'col-4 control-label text-right']) !!}
                    <div class="col-8">
                        {!! Form::text($social.'_app_id', setting($social.'_app_id'),  ['class' => 'form-control','placeholder'=>  trans('lang.app_setting_'.$social.'_app_id_placeholder')]) !!}
                        <div class="form-text text-muted">
                            {!! trans('lang.app_setting_'.$social.'_app_id_help') !!}
                        </div>
                    </div>
                </div>

                <!-- facebook_app_secret Field -->
                <div class="form-group row col-6">
                    {!! Form::label($social.'_app_secret', trans('lang.app_setting_'.$social.'_app_secret'), ['class' => 'col-4 control-label text-right']) !!}
                    <div class="col-8">
                        {!! Form::text($social.'_app_secret', setting($social.'_app_secret'),  ['class' => 'form-control','placeholder'=>  trans('lang.app_setting_'.$social.'_app_secret_placeholder')]) !!}
                        <div class="form-text text-muted">
                            {!! trans('lang.app_setting_'.$social.'_app_secret_help') !!}
                        </div>
                    </div>
                </div>
                    <hr>

            @endforeach

            <!-- Submit Field -->
                <div class="form-group mt-4 col-12 text-right">
                    <button type="submit" class="btn bg-{{setting('theme_color')}} mx-md-3 my-lg-0 my-xl-0 my-md-0 my-2">
                        <i class="fas fa-save"></i> {{trans('lang.save')}} {{trans('lang.app_setting_social')}}
                    </button>
                    <a href="{!! route('users.index') !!}" class="btn btn-default"><i class="fas fa-undo"></i> {{trans('lang.cancel')}}</a>
                </div>
            </div>
            {!! Form::close() !!}
            <div class="clearfix"></div>
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
