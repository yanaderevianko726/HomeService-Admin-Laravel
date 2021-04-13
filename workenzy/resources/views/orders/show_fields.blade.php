<!-- Id Field -->
<div class="form-group row col-md-4 col-sm-12">
    {!! Form::label('id', trans('lang.booking_id'), ['class' => 'col-4 control-label']) !!}
    <div class="col-8">
    <p>#{!! $booking->id !!}</p>
  </div>

    {!! Form::label('booking_customer', trans('lang.booking_customer'), ['class' => 'col-4 control-label']) !!}
    <div class="col-8">
    <p>{!! $booking->user->name !!}</p>
  </div>

    {!! Form::label('booking_customer_phone', trans('lang.booking_customer_phone'), ['class' => 'col-4 control-label']) !!}
    <div class="col-8">
    <p>{!! isset($booking->user->custom_fields['phone']) ? $booking->user->custom_fields['phone']['view'] : "" !!}</p>
  </div>

    {!! Form::label('delivery_address', trans('lang.delivery_address'), ['class' => 'col-4 control-label']) !!}
    <div class="col-8">
    <p>{!! $booking->deliveryAddress ? $booking->deliveryAddress->address : '' !!}</p>
  </div>

    {!! Form::label('booking_date', trans('lang.booking_date'), ['class' => 'col-4 control-label']) !!}
    <div class="col-8">
    <p>{!! $booking->created_at !!}</p>
  </div>


</div>

<!-- Booking Status Id Field -->
<div class="form-group row col-md-4 col-sm-12">
    {!! Form::label('booking_status_id', trans('lang.booking_status_status'), ['class' => 'col-4 control-label']) !!}
    <div class="col-8">
    <p>{!! $booking->bookingStatus->status  !!}</p>
  </div>

    {!! Form::label('active', trans('lang.booking_active'), ['class' => 'col-4 control-label']) !!}
    <div class="col-8">
    @if($booking->active)
      <p><span class='badge badge-success'> {{trans('lang.yes')}}</span></p>
      @else
      <p><span class='badge badge-danger'>{{trans('lang.booking_canceled')}}</span></p>
      @endif
  </div>

    {!! Form::label('payment_method', trans('lang.payment_method'), ['class' => 'col-4 control-label']) !!}
    <div class="col-8">
    <p>{!! isset($booking->payment) ? $booking->payment->method : ''  !!}</p>
  </div>

    {!! Form::label('payment_status', trans('lang.payment_status'), ['class' => 'col-4 control-label']) !!}
    <div class="col-8">
    <p>{!! isset($booking->payment) ? $booking->payment->status : trans('lang.booking_not_paid')  !!}</p>
  </div>
    {!! Form::label('booking_updated_date', trans('lang.booking_updated_at'), ['class' => 'col-4 control-label']) !!}
    <div class="col-8">
        <p>{!! $booking->updated_at !!}</p>
    </div>

</div>

<!-- Id Field -->
<div class="form-group row col-md-4 col-sm-12">
    {!! Form::label('eprovider', trans('lang.eprovider'), ['class' => 'col-4 control-label']) !!}
    <div class="col-8">
        @if(isset($booking->eserviceBookings[0]))
            <p>{!! $booking->eserviceBookings[0]->eservice->eprovider->name !!}</p>
        @endif
    </div>

    {!! Form::label('eprovider_address', trans('lang.eprovider_address'), ['class' => 'col-4 control-label']) !!}
    <div class="col-8">
        @if(isset($booking->eserviceBookings[0]))
            <p>{!! $booking->eserviceBookings[0]->eservice->eprovider->address !!}</p>
        @endif
    </div>

    {!! Form::label('eprovider_phone', trans('lang.eprovider_phone'), ['class' => 'col-4 control-label']) !!}
    <div class="col-8">
        @if(isset($booking->eserviceBookings[0]))
            <p>{!! $booking->eserviceBookings[0]->eservice->eprovider->phone !!}</p>
        @endif
    </div>

    {!! Form::label('driver', trans('lang.driver'), ['class' => 'col-4 control-label']) !!}
    <div class="col-8">
        @if(isset($booking->driver))
            <p>{!! $booking->driver->name !!}</p>
        @else
            <p>{{trans('lang.booking_driver_not_assigned')}}</p>
        @endif

    </div>

    {!! Form::label('hint', 'Hint:', ['class' => 'col-4 control-label']) !!}
    <div class="col-8">
        <p>{!! $booking->hint !!}</p>
    </div>

</div>

{{--<!-- Tax Field -->--}}
{{--<div class="form-group row col-md-6 col-sm-12">--}}
{{--  {!! Form::label('tax', 'Tax:', ['class' => 'col-4 control-label']) !!}--}}
{{--  <div class="col-8">--}}
{{--    <p>{!! $booking->tax !!}</p>--}}
{{--  </div>--}}
{{--</div>--}}


