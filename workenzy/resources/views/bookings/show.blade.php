@extends('layouts.app')
@push('css_lib')
    <link rel="stylesheet" href="{{asset('vendor/bs-stepper/css/bs-stepper.min.css')}}">
@endpush
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="m-0 text-bold">{{trans('lang.booking_plural')}} <small class="mx-3">|</small><small>{{trans('lang.booking_desc')}}</small></h1>
                </div><!-- /.col -->
                <div class="col-md-6">
                    <ol class="breadcrumb bg-white float-sm-right rounded-pill px-4 py-2 d-none d-md-flex">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-tachometer-alt"></i> {{trans('lang.dashboard')}}</a></li>
                        <li class="breadcrumb-item active"><a href="{!! route('bookings.index') !!}">{{trans('lang.booking_plural')}}</a>
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content d-flex flex-column flex-md-row">
        <div class="col-12 col-md-8 col-xl-9">
            <div class="card shadow-sm">
                <div class="card-header">
                    <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('bookings.index') !!}"><i class="fa fa-list mr-2"></i>{{trans('lang.booking_table')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{!! route('bookings.show',$booking->id) !!}"><i class="fas fa-calendar-check mr-2"></i>{{trans('lang.booking_details')}}
                            </a>
                        </li>
                        @can('bookings.edit')
                            <li class="nav-item">
                                <a class="nav-link" href="{!! route('bookings.edit',$booking->id) !!}"><i class="fas fa-edit mr-2"></i>{{trans('lang.booking_edit')}}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
                <div class="card-body p-0">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-light">
                            <b>{{__('lang.booking_status')}}</b>
                            @if($booking->cancel)
                                <span class="badge bg-danger px-2 py-2">{{__('lang.booking_cancel')}}</span>
                            @endif
                        </li>
                        <li class="bs-stepper list-group-item">
                            <div class="bs-stepper-header" role="tablist">
                                @foreach($bookingStatuses as $bookingStatus)
                                    <div class="step">
                                        <span role="tab">
                                            <span class="bs-stepper-circle @if($bookingStatus->id == $booking->booking_status_id) bg-{{setting('theme_color')}} @endif">{{$bookingStatus->order}}</span>
                                            <span class="bs-stepper-label">{{$bookingStatus->status}}</span> </span>
                                    </div>
                                    @if (!$loop->last)
                                        <div class="line"></div>
                                    @endif
                                @endforeach
                            </div>
                        </li>
                        <li class="list-group-item bg-light">
                            <b>{{__('lang.booking_id')}} #{{$booking->id}}</b>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {!! getMediaColumn($booking->e_service,'image','rounded shadow-sm border') !!}
                            <div class="d-flex flex-column mx-3">
                                <small>{{__('lang.booking_e_service')}}</small>
                                <span><b>{{$booking->e_service->name}}</b><small class="mx-3">{{__('lang.by')}} {{$booking->e_provider->name}}</small></span>
                            </div>
                            <div class="d-flex ml-xl-auto flex-column mx-3">
                                <small>{{__('lang.e_service_duration')}}</small>
                                <span><b>{{$booking->getDurationInHours()}} </b><small>{{__('lang.booking_hours')}}</small></span>
                            </div>
                            <div class="text-bold ml-xl-auto my-1 my-xl-0">
                                @if($booking->e_service->hasDiscount())
                                    <del class="text-gray">{!! getPrice($booking->e_service->price) !!}</del>
                                @endif
                                <span class="h5 text-bold">{!! getPrice($booking->e_service->getPrice()) !!} / {{__('lang.e_service_price_unit_'.$booking->e_service->price_unit)}}</span>
                            </div>
                        </li>
                        <li class="list-group-item bg-light">
                            <b>{{__('lang.option_plural')}}</b>
                        </li>
                        @foreach($booking->options as $option)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {!! getMediaColumn($option,'image','rounded shadow-sm border') !!}
                                <span class="mx-3"><b>{{$option->name}}</b><small class="mx-3"> {{getStripedHtmlColumn($option,'description')}}</small></span>
                                <h6 class="text-bold ml-xl-auto my-1 my-xl-0">{!! getPriceColumn($option) !!}</h6>
                            </li>
                        @endforeach
                    </ul>
                    <div class="d-flex flex-column flex-md-row">
                        <ul class="list-group list-group-flush col-12 col-lg-7 p-0">
                            <span class="list-group-item py-0"></span>
                            <li class="list-group-item bg-light">
                                <b>{{__('lang.payment')}}</b>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>{{__('lang.payment_status')}}</b>
                                <small class="badge badge-light px-2 py-1">{{empty(!$booking->payment) ? $booking->payment->paymentStatus->status : '-'}}</small>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>{{__('lang.payment_method')}}</b>
                                <small class="badge badge-light px-2 py-1">{{empty(!$booking->payment) ? $booking->payment->paymentMethod->name : '-'}}</small>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>{{__('lang.booking_hint')}}</b> <small>{{$booking->hint}}</small>
                            </li>
                        </ul>
                        <ul class="list-group list-group-flush col-12 col-lg-5 p-0">
                            <span class="list-group-item py-0"></span>
                            <li class="list-group-item bg-light">
                                <b>{{__('lang.booking_taxes_fees')}}</b>
                            </li>
                            @foreach($booking->taxes as $tax)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><b>{{$tax->name}}</b></span>
                                    <h6 class="text-bold ml-xl-auto my-1 my-xl-0">
                                        @if($tax->type == 'percent')
                                            {{$tax->value .'%'}}
                                        @else
                                            {!! getPriceColumn($tax,'value') !!}
                                        @endif
                                    </h6>
                                </li>
                            @endforeach
                            <li class="list-group-item bg-light">
                                <b>{{__('lang.booking_coupon')}}</b>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><b>{{$booking->coupon->code}}</b><small class="mx-3"> {{getStripedHtmlColumn($booking->coupon,'description')}}</small></span>
                                <h6 class="text-bold ml-xl-auto my-1 my-xl-0">
                                    @if($booking->coupon->discount_type == 'percent')
                                        {{(-$booking->coupon->discount) .'%'}}
                                    @else
                                        {!! getPrice(-$booking->coupon->discount) !!}
                                    @endif
                                </h6>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>{{__('lang.booking_subtotal')}}</b> <h6 class="text-bold">{!! getPrice($booking->getSubtotal()) !!}</h6>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>{{__('lang.booking_total')}}</b> <h5 class="text-bold">{!! getPrice($booking->getTotal()) !!}</h5>
                            </li>
                        </ul>
                    </div>

                    <!-- Back Field -->
                    <div class="form-group col-12 d-flex flex-column flex-md-row justify-content-md-end justify-content-sm-center border-top pt-4">
                        <a href="#" class="btn btn-default mx-md-2 my-md-0 my-2"> <i class="fas fa-print"></i> {{trans('lang.print')}}
                        </a> <a href="{!! route('bookings.edit', $booking->id) !!}" class="btn btn-default mx-md-2">
                            <i class="fas fa-edit"></i> {{trans('lang.booking_edit')}}
                        </a> <a href="{!! route('bookings.index') !!}" class="btn btn-default mx-md-2">
                            <i class="fas fa-list"></i> {{trans('lang.booking_table')}}
                        </a>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-xl-3">
            <div class="card shadow-sm">
                <div class="card-header text-bold">
                    {{__('lang.booking_user_id')}}
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex flex-xl-row flex-column justify-content-between align-items-center align-items-xl-start px-0">
                            {!! getMediaColumn($booking->user,'avatar','img-circle shadow-sm border') !!}
                            <div class="d-flex flex-column align-items-center align-items-xl-start mx-2 my-1 my-xl-0 my-0">
                                <b>{{$booking->user->name}}</b> <small>{{$booking->user->email}}</small> <small>{{$booking->user->phone_number}}</small>
                            </div>
                            <a target="_blank" class="btn btn-sm btn-default ml-xl-auto my-1 my-xl-0" href="{{route('users.edit',$booking->user->id)}}"><i class="fas fa-user-alt mx-1"></i>{{__('lang.user_profile')}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card shadow-sm">
                <div class="card-header text-bold">
                    {{__('lang.booking_time')}}
                </div>
                <div class="card-body px-0 py-1">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b>{{__('lang.booking_booking_at')}}</b> <small>{{$booking->booking_at}}</small>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b>{{__('lang.booking_start_at')}}</b> <small>{{$booking->start_at ?: '-'}}</small>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b>{{__('lang.booking_ends_at')}}</b> <small>{{$booking->ends_at ?: '-'}}</small>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card shadow-sm">
                <div class="card-header text-bold">
                    {{__('lang.booking_address')}}
                </div>
                <div class="card-body  px-0 py-1">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <small>{{$booking->address->address}}</small>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b>{{__('lang.address_open_with')}}</b>
                            <a target="_blank" class="btn btn-sm btn-default" href="{{'https://www.google.com/maps/@'.$booking->address->latitude .','.$booking->address->longitude.',14z'}}"><i class="fas fa-directions mx-1"></i>{{__('lang.address_google_maps')}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
    <!-- /.modal -->
@endsection
@push('scripts_lib')
    {{--    <script src="{{asset('vendor/bs-stepper/js/bs-stepper.min.js')}}"></script>--}}
@endpush
