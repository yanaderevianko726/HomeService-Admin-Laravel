@extends('layouts.app')
@push('css_lib')
    <!-- icheck-bootstrap -->
    <link rel="stylesheet" href="{{asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- select2 -->
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('vendor/summernote/summernote-lite.min.css')}}">
    {{--dropzone--}}
    <link rel="stylesheet" href="{{asset('vendor/dropzone/min/dropzone.min.css')}}">
@endpush
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{!! trans('lang.user_profile') !!} <small>{{trans('lang.media_desc')}}</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb bg-white float-sm-right rounded-pill px-4 py-2 d-none d-md-flex">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fas fa-tachometer-alt"></i> {{trans('lang.dashboard')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('lang.user_profile')}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-user mr-2"></i> {{trans('lang.user_about_me')}}</h3>
                        </div>
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img src="{{auth()->user()->getFirstMediaUrl('avatar','icon')}}" class="profile-user-img img-fluid img-circle" alt="{{auth()->user()->name}}">
                            </div>
                            <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>
                            <p class="text-muted text-center">{{implode(', ',$rolesSelected)}}</p>
                            <a class="btn btn-outline-{{setting('theme_color')}} btn-block" href="mailto:{{auth()->user()->email}}"><i class="fas fa-envelope mr-2"></i>{{auth()->user()->email}}
                            </a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                @if($customFields)
                    <!-- About Me Box -->
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-list mr-2"></i>{{trans('lang.custom_field_plural')}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @foreach($customFieldsValues as $value)
                                    <strong>{{trans('lang.user_'.$value->customField->name)}}</strong>
                                    <p class="text-muted">
                                        {!! $value->view !!}
                                    </p>
                                    @if(!$loop->last)
                                        <hr> @endif
                                @endforeach
                            </div>
                            <!-- /.card-body -->
                        </div>
                    <!-- /.card -->
                    @endif
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    @include('flash::message')
                    @include('adminlte-templates::common.errors')
                    <div class="clearfix"></div>
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <ul class="nav nav-tabs d-flex flex-row align-items-start card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="{!! url()->current() !!}"><i class="fas fa-cog mr-2"></i>{{trans('lang.app_setting')}}</a>
                                </li>
                                @hasrole('customer')
                                <div class="ml-auto d-inline-flex">
                                    <li class="nav-item">
                                        <a class="nav-link pt-1" href="{{-- route('eproviders.create') --}}#"><i class="fas fa-check-o"></i> {{trans('lang.app_setting_become_store_owner')}}
                                        </a>
                                    </li>
                                </div>
                                @endhasrole
                            </ul>
                        </div>
                        <div class="card-body">
                            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}
                            <div class="row">
                                @include('settings.users.fields')
                            </div>
                            {!! Form::close() !!}
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.media_modal',['collection'=>null])
@endsection
@push('scripts_lib')
    <!-- select2 -->
    <script src="{{asset('vendor/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('vendor/summernote/summernote-lite.min.js')}}"></script>
    {{--dropzone--}}
    <script src="{{asset('vendor/dropzone/min/dropzone.min.js')}}"></script>
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        var dropzoneFields = [];
    </script>
@endpush
