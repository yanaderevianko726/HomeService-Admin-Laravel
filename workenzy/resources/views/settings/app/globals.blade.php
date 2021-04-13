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
                @if(!env('APP_DEMO',false))
                    <div class="ml-auto d-inline-flex">
                        <li class="nav-item">
                            <a class="nav-link pt-1" href="{{url('settings/clear-cache')}}"><i class="fas fa-trash-o"></i> {{trans('lang.app_setting_clear_cache')}}
                            </a>
                        </li>
                        @if($containsUpdate)
                            <li class="nav-item">
                                <a class="nav-link pt-1" href="{{url('update/'.config('installer.currentVersion','v100'))}}"><i class="fas fa-redo-alt"></i> {{trans('lang.app_setting_check_for')}}
                                </a>
                            </li>
                        @endif
                    </div>
                @endif
            </ul>
        </div>
        <div class="card-body">
            {!! Form::open(['url' => ['settings/update'], 'method' => 'patch']) !!}
            <div class="row">
                <div class="d-flex flex-column col-sm-12 col-md-6">
                    <!-- app_name Field -->
                    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
                        {!! Form::label('app_name', trans("lang.app_setting_app_name"), ['class' => 'col-4 control-label text-right']) !!}
                        <div class="col-8">
                            {!! Form::text('app_name', setting('app_name'),  ['class' => 'form-control','placeholder'=>  trans("lang.app_setting_app_name_placeholder")]) !!}
                            <div class="form-text text-muted">
                                {{ trans("lang.app_setting_app_name_help") }}
                            </div>
                        </div>
                    </div>

                    <!-- app_short_description Field -->
                    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
                        {!! Form::label('app_short_description', trans("lang.app_setting_app_short_description"), ['class' => 'col-4 control-label text-right']) !!}
                        <div class="col-8">
                            {!! Form::text('app_short_description', setting('app_short_description'),  ['class' => 'form-control','placeholder'=>  trans("lang.app_setting_app_short_description_placeholder")]) !!}
                            <div class="form-text text-muted">
                                {{ trans("lang.app_setting_app_short_description_help") }}
                            </div>
                        </div>
                    </div>

                    <!-- Theme Contrast Field -->
                    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
                        {!! Form::label('theme_contrast', trans("lang.app_setting_theme_contrast"),['class' => 'col-4 control-label text-right']) !!}
                        <div class="col-8">
                            {!! Form::select('theme_contrast',
                            [
                            'dark' => trans('lang.app_setting_dark_theme'),
                            'light' => trans('lang.app_setting_light_theme'),
                            ]
                            , setting('theme_contrast'), ['class' => 'select2 form-control']) !!}
                            <div class="form-text text-muted">{{ trans("lang.app_setting_theme_contrast_help") }}</div>
                        </div>
                    </div>

                    <!-- Theme Color Field -->
                    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
                        {!! Form::label('theme_color', trans("lang.app_setting_theme_color"),['class' => 'col-4 control-label text-right']) !!}
                        <div class="col-8">
                            {!! Form::select('theme_color',
                            [
                            'primary' => trans('lang.app_setting_blue'),
                            'secondary' => trans('lang.app_setting_gray'),
                            'danger' => trans('lang.app_setting_red'),
                            'warning' => trans('lang.app_setting_yellow'),
                            'info' => trans('lang.app_setting_sky_blue'),
                            'success' => trans('lang.app_setting_green'),
                            'indigo' => trans('lang.app_setting_indigo'),
                            'purple' => trans('lang.app_setting_purple'),
                            'fuchsia' => trans('lang.app_setting_fuchsia'),
                            'pink' => trans('lang.app_setting_pink'),
                            'maroon' => trans('lang.app_setting_maroon'),
                            'navy' => trans('lang.app_setting_navy'),
                            'lime' => trans('lang.app_setting_lime'),
                            'teal' => trans('lang.app_setting_teal'),
                            'lightblue' => trans('lang.app_setting_lightblue'),
                            'cyan' => trans('lang.app_setting_cyan'),
                            'orange' => trans('lang.app_setting_orange'),
                            'olive' => trans('lang.app_setting_olive'),
                            ]
                            , setting('theme_color'), ['class' => 'select2 form-control']) !!}
                            <div class="form-text text-muted">{{ trans("lang.app_setting_theme_color_help") }}</div>
                        </div>
                    </div>

                    <!-- Navbar Color Field -->
                    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
                        {!! Form::label('nav_color', trans("lang.app_setting_nav_color"),['class' => 'col-4 control-label text-right']) !!}
                        <div class="col-8">
                            {!! Form::select('nav_color',
                            [
                            'navbar-dark navbar-primary' => trans('lang.app_setting_blue'),
                            'navbar-dark navbar-gray' => trans('lang.app_setting_gray'),
                            'navbar-dark navbar-dark' => trans('lang.app_setting_dark'),
                            'navbar-light navbar-white' => trans('lang.app_setting_white'),
                            'navbar-dark navbar-danger' => trans('lang.app_setting_red'),
                            'navbar-light navbar-warning' => trans('lang.app_setting_yellow'),
                            'navbar-dark navbar-info' => trans('lang.app_setting_sky_blue'),
                            'navbar-dark navbar-success' => trans('lang.app_setting_green'),
                            'navbar-dark navbar-indigo' => trans('lang.app_setting_indigo'),
                            'navbar-dark navbar-purple' => trans('lang.app_setting_purple'),
                            'navbar-dark navbar-pink' => trans('lang.app_setting_pink'),
                            'navbar-dark navbar-navy' => trans('lang.app_setting_navy'),
                            'navbar-light navbar-teal' => trans('lang.app_setting_teal'),
                            'navbar-dark navbar-lightblue' => trans('lang.app_setting_lightblue'),
                            'navbar-dark navbar-cyan' => trans('lang.app_setting_cyan'),
                            'navbar-light navbar-orange' => trans('lang.app_setting_orange'),
                            'navbar-light' => trans('lang.app_setting_transparent'),
                            ]
                            , setting('nav_color'), ['class' => 'select2 form-control']) !!}
                            <div class="form-text text-muted">{{ trans("lang.app_setting_nav_color_help") }}</div>
                        </div>
                    </div>

                    <!-- logo_bg Color Field -->
                    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
                        {!! Form::label('logo_bg_color', trans("lang.app_setting_logo_bg_color"),['class' => 'col-4 control-label text-right']) !!}
                        <div class="col-8">
                            {!! Form::select('logo_bg_color',
                            [
                            '' => trans('lang.app_setting_clear'),
                            'text-light  navbar-primary' => trans('lang.app_setting_blue'),
                            'text-light  navbar-gray' => trans('lang.app_setting_gray'),
                            'text-light  navbar-dark' => trans('lang.app_setting_dark'),
                            'text-dark  navbar-white' => trans('lang.app_setting_white'),
                            'text-light  navbar-danger' => trans('lang.app_setting_red'),
                            'text-dark  navbar-warning' => trans('lang.app_setting_yellow'),
                            'text-light  navbar-info' => trans('lang.app_setting_sky_blue'),
                            'text-light  navbar-success' => trans('lang.app_setting_green'),
                            'text-light  navbar-indigo' => trans('lang.app_setting_indigo'),
                            'text-light  navbar-purple' => trans('lang.app_setting_purple'),
                            'text-light  navbar-pink' => trans('lang.app_setting_pink'),
                            'text-light  navbar-navy' => trans('lang.app_setting_navy'),
                            'text-dark  navbar-teal' => trans('lang.app_setting_teal'),
                            'text-light  navbar-lightblue' => trans('lang.app_setting_lightblue'),
                            'text-light  navbar-cyan' => trans('lang.app_setting_cyan'),
                            'text-dark  navbar-orange' => trans('lang.app_setting_orange'),
                            'text-dark navbar-light' => trans('lang.app_setting_light'),
                            ]
                            , setting('logo_bg_color'), ['class' => 'select2 form-control']) !!}
                            <div class="form-text text-muted">{{ trans("lang.app_setting_logo_bg_color_help") }}</div>
                        </div>
                    </div>

                    <!-- custom_field_models Field -->
                    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
                        {!! Form::label('custom_field_models[]', trans("lang.app_setting_custom_field_models"),['class' => 'col-4 control-label text-right']) !!}
                        <div class="col-8">
                            {!! Form::select('custom_field_models[]',$customFieldModels
                            , setting('custom_field_models',[]), ['multiple'=>'multiple', 'class' => 'select2 form-control']) !!}
                            <div class="form-text text-muted">{{ trans("lang.app_setting_custom_field_models_help") }}</div>
                        </div>
                    </div>

                    <!-- blocked_ips Field -->
                    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
                        {!! Form::label('blocked_ips[]', trans("lang.app_setting_blocked_ips"),['class' => 'col-4 control-label text-right']) !!}
                        <div class="col-8">
                            {!! Form::select('blocked_ips[]',array_combine(setting('blocked_ips',[]),setting('blocked_ips',[])), setting('blocked_ips',[]), ['multiple'=>'multiple', 'data-tags'=>'true','class' => 'select2 form-control']) !!}
                            <div class="form-text text-muted">{{ trans("lang.app_setting_blocked_ips_help") }}</div>
                        </div>
                    </div>

                </div>
                <div class="d-flex flex-column col-sm-12 col-md-6">

                    <!-- App Logo Field -->
                    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
                        {!! Form::label('app_logo', trans("lang.upload_app_logo"), ['class' => 'col-4 control-label text-right']) !!}
                        <div class="col-8">
                            <div style="width: 100%" class="dropzone app_logo" id="app_logo" data-field="app_logo">
                                <input type="hidden" name="app_logo">
                            </div>
                            <a href="#loadMediaModal" data-dropzone="app_logo" data-toggle="modal" data-target="#mediaModal" class="btn btn-outline-{{setting('theme_color')}} btn-sm float-right mt-1">{{ trans('lang.media_select')}}</a>
                            <div class="form-text text-muted w-50">
                                {{ trans("lang.upload_app_logo_help") }}
                            </div>
                        </div>
                    </div>
                    @prepend('scripts')
                        <script type="text/javascript">
                            var dzAppLogo = '';
                            @if(isset($upload) && $upload->hasMedia('app_logo'))
                                dzAppLogo = {
                                name: "{!! $upload->getFirstMedia('app_logo')->name !!}",
                                size: "{!! $upload->getFirstMedia('app_logo')->size !!}",
                                type: "{!! $upload->getFirstMedia('app_logo')->mime_type !!}",
                                collection_name: "{!! $upload->getFirstMedia('app_logo')->collection_name !!}"
                            };
                            @endif
                            var dz_dzAppLogo = $(".dropzone.app_logo").dropzone({
                                url: "{!!url('uploads/store')!!}",
                                addRemoveLinks: true,
                                maxFiles: 1,
                                init: function () {
                                    @if(isset($upload) && $upload->hasMedia('app_logo'))
                                    dzInit(this, dzAppLogo, '{!! url($upload->getFirstMediaUrl('app_logo','thumb')) !!}')
                                    @endif
                                },
                                accept: function (file, done) {
                                    dzAccept(file, done, this.element, "{!!config('medialibrary.icons_folder')!!}");
                                },
                                sending: function (file, xhr, formData) {
                                    dzSending(this, file, formData, '{!! csrf_token() !!}');
                                },
                                maxfilesexceeded: function (file) {
                                    dz_dzAppLogo[0].mockFile = '';
                                    dzMaxfile(this, file);
                                },
                                complete: function (file) {
                                    dzComplete(this, file, dzAppLogo, dz_dzAppLogo[0].mockFile);
                                    dz_dzAppLogo[0].mockFile = file;
                                },
                                removedfile: function (file) {
                                    dzRemoveFile(
                                        file, dzAppLogo, '{!! url("uploads/remove-media") !!}',
                                        'app_logo', '{!! isset($upload) ? $upload->id : 0 !!}', '{!! url("uplaods/clear") !!}', '{!! csrf_token() !!}'
                                    );
                                }
                            });
                            dz_dzAppLogo[0].mockFile = dzAppLogo;
                            dropzoneFields['app_logo'] = dz_dzAppLogo;
                        </script>
                @endprepend

                <!-- 'fixed_header Field' -->
                    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
                        {!! Form::label('fixed_header', trans("lang.app_setting_fixed_header"),['class' => 'col-4 control-label text-right']) !!}
                        {!! Form::hidden('fixed_header', 0, ['id'=>"hidden_fixed_header"]) !!}
                        <div class="col-8 icheck-{{setting('theme_color')}}">
                            {!! Form::checkbox('fixed_header', 1, setting('fixed_header', true)) !!}
                            <label for="fixed_header">{!! trans("lang.app_setting_fixed_header_help") !!}</label>
                        </div>
                    </div>

                    <!-- 'fixed_footer Field' -->
                    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
                        {!! Form::label('fixed_footer', trans("lang.app_setting_fixed_footer"),['class' => 'col-4 control-label text-right']) !!}
                        {!! Form::hidden('fixed_footer', 0, ['id'=>"hidden_fixed_footer"]) !!}
                        <div class="col-8 icheck-{{setting('theme_color')}}">
                            {!! Form::checkbox('fixed_footer', 1, setting('fixed_footer', true)) !!}
                            <label for="fixed_footer">{!! trans("lang.app_setting_fixed_footer_help") !!}</label>
                        </div>
                    </div>

                </div>
                <!-- Submit Field -->
                <div class="form-group mt-4 col-12 text-right">
                    <button type="submit" class="btn bg-{{setting('theme_color')}} mx-md-3 my-lg-0 my-xl-0 my-md-0 my-2">
                        <i class="fas fa-save"></i> {{trans('lang.save')}} {{trans('lang.app_setting_globals')}}
                    </button>
                    <a href="{!! route('users.index') !!}" class="btn btn-default"><i class="fas fa-undo"></i> {{trans('lang.cancel')}}</a>
                </div>
            </div>
            {!! Form::close() !!}
            <div class="clearfix"></div>
        </div>
    </div>
    @include('layouts.media_modal',['collection'=>'default'])
@endsection
@push('scripts_lib')
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

