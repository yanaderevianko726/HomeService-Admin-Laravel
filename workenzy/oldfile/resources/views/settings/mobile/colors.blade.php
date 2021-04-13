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
    {{--Color Picker--}}
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
@endpush
@section('settings_title',trans('lang.app_setting_mobile'))
@section('settings_content')
    @include('flash::message')
    @include('adminlte-templates::common.errors')
    <div class="clearfix"></div>
    <div class="card shadow-sm">
        <div class="card-header">
            <ul class="nav nav-tabs d-flex flex-row align-items-start card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="{!! url()->current() !!}"><i class="fas fa-cog mr-2"></i>{{trans('lang.app_setting_mobile_'.$tab)}}</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            {!! Form::open(['url' => ['settings/update'], 'method' => 'patch']) !!}
            <div class="row">
                <h5 class="col-12 pb-4"><i class="mr-3 fas fa-magic"></i>{!! trans('lang.app_setting_colors') !!}</h5>
                <!-- Theme Mode Field -->
                <div class="form-group row col-6">
                    {!! Form::label('default_theme', trans("lang.app_setting_theme_contrast"),['class' => 'col-4 control-label text-right']) !!}
                    <div class="col-8">
                        {!! Form::select('default_theme',
                        [
                        'dark' => trans('lang.app_setting_dark_theme'),
                        'light' => trans('lang.app_setting_light_theme'),
                        ]
                        , setting('default_theme','light'), ['class' => 'select2 form-control']) !!}
                        <div class="form-text text-muted">{{ trans("lang.app_setting_theme_contrast_help") }}</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <h5 class="col-12 pb-4"><i class="mr-3 fas fa-magic"></i>{!! trans('lang.app_setting_colors') !!}</h5>

                <!-- Main Color Field -->
                <div class="form-group row col-6">
                    {!! Form::label('main_color', trans("lang.app_setting_main_color"), ['class' => 'col-4 control-label text-right']) !!}
                    <div class="col-8">
                        <div id="main-colorpicker" class="input-group colorpicker-component">
                            {!! Form::text('main_color', setting('main_color',"#ea5c44"),  ['class' => 'form-control','placeholder'=>  trans("lang.app_setting_main_color_placeholder"),'autocomplete' => 'off']) !!}
                            <div class=" input-group-append ">
                                <span class="input-group-addon input-group-text"><i class="fas fa-square" style="color: {!! setting('main_color',"#ea5c44") !!}"></i></span>
                            </div>
                        </div>
                        <div class="form-text text-muted">
                            {{ trans("lang.app_setting_main_color_help") }}
                        </div>
                    </div>
                </div>

                <!-- main_dark_color Field -->
                <div class="form-group row col-6">
                    {!! Form::label('main_dark_color', trans("lang.app_setting_main_dark_color"), ['class' => 'col-4 control-label text-right']) !!}
                    <div class="col-8">
                        <div id="main-colorpicker" class="input-group colorpicker-component">
                            {!! Form::text('main_dark_color', setting('main_dark_color',"#ea5c44"),  ['class' => 'form-control','placeholder'=>  trans("lang.app_setting_main_dark_color_placeholder"),'autocomplete' => 'off']) !!}
                            <div class=" input-group-append ">
                                <span class="input-group-addon input-group-text"><i class="fas fa-square" style="color: {!! setting('main_dark_color',"#ea5c44") !!}"></i></span>
                            </div>
                        </div>
                        <div class="form-text text-muted">
                            {{ trans("lang.app_setting_main_dark_color_help") }}
                        </div>
                    </div>
                </div>

                <!-- second_color Field -->
                <div class="form-group row col-6">
                    {!! Form::label('second_color', trans("lang.app_setting_second_color"), ['class' => 'col-4 control-label text-right']) !!}
                    <div class="col-8">
                        <div id="main-colorpicker" class="input-group colorpicker-component">
                            {!! Form::text('second_color', setting('second_color',"#344968"),  ['class' => 'form-control','placeholder'=>  trans("lang.app_setting_second_color_placeholder"),'autocomplete' => 'off']) !!}
                            <div class=" input-group-append ">
                                <span class="input-group-addon input-group-text"><i class="fas fa-square" style="color: {!! setting('second_color',"#344968") !!}"></i></span>
                            </div>
                        </div>
                        <div class="form-text text-muted">
                            {{ trans("lang.app_setting_second_color_help") }}
                        </div>
                    </div>
                </div>

                <!-- second_dark_color Field -->
                <div class="form-group row col-6">
                    {!! Form::label('second_dark_color', trans("lang.app_setting_second_dark_color"), ['class' => 'col-4 control-label text-right']) !!}
                    <div class="col-8">
                        <div id="main-colorpicker" class="input-group colorpicker-component">
                            {!! Form::text('second_dark_color', setting('second_dark_color',"#ccccdd"),  ['class' => 'form-control','placeholder'=>  trans("lang.app_setting_second_dark_color_placeholder"),'autocomplete' => 'off']) !!}
                            <div class=" input-group-append ">
                                <span class="input-group-addon input-group-text"><i class="fas fa-square" style="color: {!! setting('second_dark_color',"#ccccdd") !!}"></i></span>
                            </div>
                        </div>
                        <div class="form-text text-muted">
                            {{ trans("lang.app_setting_second_dark_color_help") }}
                        </div>
                    </div>
                </div>

                <!-- accent_color Field -->
                <div class="form-group row col-6">
                    {!! Form::label('accent_color', trans("lang.app_setting_accent_color"), ['class' => 'col-4 control-label text-right']) !!}
                    <div class="col-8">
                        <div id="main-colorpicker" class="input-group colorpicker-component">
                            {!! Form::text('accent_color', setting('accent_color',"#8C98A8"),  ['class' => 'form-control','placeholder'=>  trans("lang.app_setting_accent_color_placeholder"),'autocomplete' => 'off']) !!}
                            <div class=" input-group-append ">
                                <span class="input-group-addon input-group-text"><i class="fas fa-square" style="color: {!! setting('accent_color',"#8C98A8") !!}"></i></span>
                            </div>
                        </div>
                        <div class="form-text text-muted">
                            {{ trans("lang.app_setting_accent_color_help") }}
                        </div>
                    </div>
                </div>

                <!-- accent_dark_color Field -->
                <div class="form-group row col-6">
                    {!! Form::label('accent_dark_color', trans("lang.app_setting_accent_dark_color"), ['class' => 'col-4 control-label text-right']) !!}
                    <div class="col-8">
                        <div id="main-colorpicker" class="input-group colorpicker-component">
                            {!! Form::text('accent_dark_color', setting('accent_dark_color',"#9999aa"),  ['class' => 'form-control','placeholder'=>  trans("lang.app_setting_accent_dark_color_placeholder"),'autocomplete' => 'off']) !!}
                            <div class=" input-group-append ">
                                <span class="input-group-addon input-group-text"><i class="fas fa-square" style="color: {!! setting('accent_dark_color',"#9999aa") !!}"></i></span>
                            </div>
                        </div>
                        <div class="form-text text-muted">
                            {{ trans("lang.app_setting_accent_dark_color_help") }}
                        </div>
                    </div>
                </div>

                <!-- scaffold_dark_color Field -->
                <div class="form-group row col-6">
                    {!! Form::label('scaffold_dark_color', trans("lang.app_setting_scaffold_dark_color"), ['class' => 'col-4 control-label text-right']) !!}
                    <div class="col-8">
                        <div id="main-colorpicker" class="input-group colorpicker-component">
                            {!! Form::text('scaffold_dark_color', setting('scaffold_dark_color',"#2C2C2C"),  ['class' => 'form-control','placeholder'=>  trans("lang.app_setting_scaffold_dark_color_placeholder"),'autocomplete' => 'off']) !!}
                            <div class=" input-group-append ">
                                <span class="input-group-addon input-group-text"><i class="fas fa-square" style="color: {!! setting('scaffold_dark_color',"#2C2C2C") !!}"></i></span>
                            </div>
                        </div>
                        <div class="form-text text-muted">
                            {{ trans("lang.app_setting_scaffold_dark_color_help") }}
                        </div>
                    </div>
                </div>

                <!-- scaffold_color Field -->
                <div class="form-group row col-6">
                    {!! Form::label('scaffold_color', trans("lang.app_setting_scaffold_color"), ['class' => 'col-4 control-label text-right']) !!}
                    <div class="col-8">
                        <div id="main-colorpicker" class="input-group colorpicker-component">
                            {!! Form::text('scaffold_color', setting('scaffold_color',"#FAFAFA"),  ['class' => 'form-control','placeholder'=>  trans("lang.app_setting_scaffold_color_placeholder"),'autocomplete' => 'off']) !!}
                            <div class=" input-group-append ">
                                <span class="input-group-addon input-group-text"><i class="fas fa-square" style="color: {!! setting('scaffold_color',"#FAFAFA") !!}"></i></span>
                            </div>
                        </div>
                        <div class="form-text text-muted">
                            {{ trans("lang.app_setting_scaffold_color_help") }}
                        </div>
                    </div>
                </div>

                <!-- Submit Field -->
                <div class="form-group mt-4 col-12 text-right">
                    <button type="submit" class="btn bg-{{setting('theme_color')}} mx-md-3 my-lg-0 my-xl-0 my-md-0 my-2">
                        <i class="fas fa-save"></i> {{trans('lang.save')}} {{trans('lang.app_setting')}}
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
    <script src="{{asset('vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <script type="text/javascript">
        $(".colorpicker-component, input[name$='color']").colorpicker({
            format: 'hex',
        });
        $('.colorpicker-component').on('colorpickerChange', function (event) {
            $(this).find('.fa-square').css('color', event.color.toString());
        });
        Dropzone.autoDiscover = false;
        var dropzoneFields = [];
    </script>
@endpush
