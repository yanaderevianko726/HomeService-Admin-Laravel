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
                    <a class="nav-link" href="{!! url('settings/payment/payment') !!}"><i class="fas fa-money mr-2"></i>{{trans('lang.app_setting_payment')}}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{!! url('settings/payment/paypal') !!}"><i class="fas fa-envelope mr-2"></i>{{trans('lang.app_setting_paypal')}}@if(setting('enable_paypal', false))
                            <span class="badge ml-2 badge-success">{{trans('lang.active')}}</span>@endif</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{!! url('settings/payment/stripe') !!}"><i class="fas fa-envelope-o mr-2"></i>{{trans('lang.app_setting_stripe')}}@if(setting('enable_stripe',false))
                            <span class="badge ml-2 badge-success">{{trans('lang.active')}}</span>@endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{!! url('settings/payment/razorpay') !!}"><i class="fas fa-envelope-o mr-2"></i>{{trans('lang.app_setting_razorpay')}}@if(setting('enable_razorpay',false))
                            <span class="badge ml-2 badge-success">{{trans('lang.active')}}</span>@endif
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            {!! Form::open(['url' => ['settings/update'], 'method' => 'patch']) !!}
            <div class="row">
                <div style="flex: 70%;max-width: 70%;padding: 0 4px;" class="column">
                    <!-- 'Boolean enable_facebook Field' -->
                    <div class="form-group row col-12">
                        {!! Form::label('enable_razorpay', trans('lang.app_setting_enable_razorpay'),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
                        <div class="checkbox icheck">
                            <label class="w-100 ml-2 form-check-inline">
                                {!! Form::hidden('enable_razorpay', null) !!}
                                {!! Form::checkbox('enable_razorpay', 1, setting('enable_razorpay', false)) !!}
                                <span class="ml-2">{!! trans('lang.app_setting_enable_razorpay_help') !!}</span> </label>
                        </div>
                    </div>
                    <!-- facebook_app_id Field -->
                    <div class="form-group row col-12">
                        {!! Form::label('razorpay_key', trans('lang.app_setting_razorpay_key'), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
                        <div class="col-md-9">
                            {!! Form::text('razorpay_key', setting('razorpay_key'),  ['class' => 'form-control','placeholder'=>  trans('lang.app_setting_razorpay_key_placeholder')]) !!}
                            <div class="form-text text-muted">
                                {!! trans('lang.app_setting_razorpay_key_help') !!}
                            </div>
                        </div>
                    </div>

                    <!-- facebook_app_secret Field -->
                    <div class="form-group row col-12">
                        {!! Form::label('razorpay_secret', trans('lang.app_setting_razorpay_secret'), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
                        <div class="col-md-9">
                            {!! Form::text('razorpay_secret', setting('razorpay_secret'),  ['class' => 'form-control','placeholder'=>  trans('lang.app_setting_razorpay_secret_placeholder')]) !!}
                            <div class="form-text text-muted">
                                {!! trans('lang.app_setting_razorpay_secret_help') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div style="flex: 30%;max-width: 30%;padding: 0 4px;" class="column">
                    <!-- TODO explain razorpay here-->
                </div>
                <!-- Submit Field -->
                <div class="form-group mt-4 col-12 text-right">
                    <button type="submit" class="btn bg-{{setting('theme_color')}} mx-md-3 my-lg-0 my-xl-0 my-md-0 my-2">
                        <i class="fas fa-save"></i> {{trans('lang.save')}} {{trans('lang.app_setting_payment')}}</button>
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
