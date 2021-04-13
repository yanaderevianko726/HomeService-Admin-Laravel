@if($customFields)
    <h5 class="col-12 pb-4">{!! trans('lang.main_fields') !!}</h5>
@endif
<div class="d-flex flex-column col-sm-12 col-md-6">
    <!-- User Id Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('user_id', trans("lang.booking_user_id"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('user_id', $user, null, ['class' => 'select2 form-control']) !!}
            <div class="form-text text-muted">{{ trans("lang.booking_user_id_help") }}</div>
        </div>
    </div>

    <!-- Driver Id Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('driver_id', trans("lang.booking_driver_id"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('driver_id', $driver, null, ['data-empty'=>trans("lang.booking_driver_id_placeholder"),'class' => 'select2 not-required form-control']) !!}
            <div class="form-text text-muted">{{ trans("lang.booking_driver_id_help") }}</div>
        </div>
    </div>

    <!-- Booking Status Id Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('booking_status_id', trans("lang.booking_booking_status_id"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('booking_status_id', $bookingStatus, null, ['class' => 'select2 form-control']) !!}
            <div class="form-text text-muted">{{ trans("lang.booking_booking_status_id_help") }}</div>
        </div>
    </div>

    <!-- Status Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('status', trans("lang.payment_status"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('status',
            [
            'Waiting for Client' => trans('lang.booking_pending'),
            'Not Paid' => trans('lang.booking_not_paid'),
            'Paid' => trans('lang.booking_paid'),
            ]
            , isset($booking->payment) ? $booking->payment->status : '', ['class' => 'select2 form-control']) !!}
            <div class="form-text text-muted">{{ trans("lang.payment_status_help") }}</div>
        </div>
    </div>
    <!-- 'Boolean active Field' -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('active', trans("lang.booking_active"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="checkbox icheck">
            <label class="col-9 ml-2 form-check-inline">
                {!! Form::hidden('active', 0) !!}
                {!! Form::checkbox('active', 1, null) !!}
            </label>
        </div>
    </div>

</div>
<div class="d-flex flex-column col-sm-12 col-md-6">

    <!-- Tax Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('tax', trans("lang.booking_tax"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::number('tax', null,  ['class' => 'form-control', 'step'=>"any",'placeholder'=>  trans("lang.booking_tax_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.booking_tax_help") }}
            </div>
        </div>
    </div>

    <!-- additional_fee Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('additional_fee', trans("lang.booking_additional_fee"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::number('additional_fee', null,  ['class' => 'form-control','step'=>"any",'placeholder'=>  trans("lang.booking_additional_fee_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.booking_additional_fee_help") }}
            </div>
        </div>
    </div>
    <!-- Hint Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('hint', trans("lang.booking_hint"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::textarea('hint', null, ['class' => 'form-control','placeholder'=>
             trans("lang.booking_hint_placeholder")  ]) !!}
            <div class="form-text text-muted">{{ trans("lang.booking_hint_help") }}</div>
        </div>
    </div>
</div>
@if($customFields)
    <div class="clearfix"></div>
    <div class="col-12 custom-field-container">
        <h5 class="col-12 pb-4">{!! trans('lang.custom_field_plural') !!}</h5>
        {!! $customFields !!}
    </div>
@endif
<!-- Submit Field -->
<div class="form-group col-12 d-flex flex-column flex-md-row justify-content-md-end justify-content-sm-center border-top pt-4">
    <button type="submit" class="btn bg-{{setting('theme_color')}} mx-md-3 my-lg-0 my-xl-0 my-md-0 my-2">
        <i class="fas fa-save"></i> {{trans('lang.save')}} {{trans('lang.booking')}}</button>
    <a href="{!! route('bookings.index') !!}" class="btn btn-default"><i class="fas fa-undo"></i> {{trans('lang.cancel')}}</a>
</div>
