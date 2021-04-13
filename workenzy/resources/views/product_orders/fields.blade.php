@if($customFields)
    <h5 class="col-12 pb-4">{!! trans('lang.main_fields') !!}</h5>
@endif
<div class="d-flex flex-column col-sm-12 col-md-6">
    <!-- Price Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('price', trans("lang.eservice_booking_price"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::number('price', null,  ['class' => 'form-control','placeholder'=>  trans("lang.eservice_booking_price_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.eservice_booking_price_help") }}
            </div>
        </div>
    </div>

    <!-- Quantity Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('quantity', trans("lang.eservice_booking_quantity"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::number('quantity', null,  ['class' => 'form-control','placeholder'=>  trans("lang.eservice_booking_quantity_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.eservice_booking_quantity_help") }}
            </div>
        </div>
    </div>

    <!-- EService Id Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('eservice_id', trans("lang.eservice_booking_eservice_id"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('eservice_id', $eservice, null, ['class' => 'select2 form-control']) !!}
            <div class="form-text text-muted">{{ trans("lang.eservice_booking_eservice_id_help") }}</div>
        </div>
    </div>

</div>
<div class="d-flex flex-column col-sm-12 col-md-6">

    <!-- Options Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('options[]', trans("lang.eservice_booking_options"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('options[]', $option, $optionsSelected, ['class' => 'select2 form-control' , 'multiple'=>'multiple']) !!}
            <div class="form-text text-muted">{{ trans("lang.eservice_booking_options_help") }}</div>
        </div>
    </div>

    <!-- Booking Id Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('booking_id', trans("lang.eservice_booking_booking_id"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('booking_id', $booking, null, ['class' => 'select2 form-control']) !!}
            <div class="form-text text-muted">{{ trans("lang.eservice_booking_booking_id_help") }}</div>
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
        <i class="fas fa-save"></i> {{trans('lang.save')}} {{trans('lang.eservice_booking')}}
    </button>
    <a href="{!! route('eserviceBookings.index') !!}" class="btn btn-default"><i class="fas fa-undo"></i> {{trans('lang.cancel')}}</a>
</div>
