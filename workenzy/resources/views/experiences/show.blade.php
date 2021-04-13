@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-bold">{{trans('lang.experience_plural')}} <small class="mx-3">|</small> <small>{{trans('lang.experience_desc')}}</small>
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb bg-white float-sm-right rounded-pill px-4 py-2 d-none d-md-flex">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fas fa-tachometer-alt"></i> {{trans('lang.dashboard')}}</a></li>
                        <li class="breadcrumb-item"><a href="{!! route('experiences.index') !!}">{{trans('lang.experience_plural')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{trans('lang.experience_edit')}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="card shadow-sm">
            <div class="card-header">
                <ul class="nav nav-tabs d-flex flex-row align-items-start card-header-tabs">
                    @can('experiences.index')
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('experiences.index') !!}"><i class="fas fa-list mr-2"></i>{{trans('lang.experience_table')}}</a>
                        </li>
                    @endcan
                    @can('experiences.create')
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('experiences.create') !!}"><i class="fas fa-plus mr-2"></i>{{trans('lang.experience_create')}}
                            </a>
                        </li>
                    @endcan
                    @can('experiences.edit')
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('experiences.edit', $experience->id) !!}"><i class="fas fa-edit mr-2"></i>{{trans('lang.experience_edit')}}
                            </a>
                        </li>
                    @endcan
                    <li class="nav-item">
                        <a class="nav-link active" href="{!! route('experiences.show', $experience->id) !!}"><i class="fas fa-eye mr-2"></i>{{trans('lang.experience_show')}}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="row">
                    @include('experiences.show_fields')
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="card-footer text-right">
                <a href="{!! route('experiences.index') !!}" class="btn btn-default"><i class="fa fa-undo"></i> {{trans('lang.back')}}</a>
            </div>
        </div>
    </div>
@endsection
