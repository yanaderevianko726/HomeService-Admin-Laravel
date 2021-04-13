@if($customFields)
    <h5 class="col-12 pb-4">{!! trans('lang.main_fields') !!}</h5>
@endif
<div class="d-flex flex-column col-sm-12 col-md-6">
    <!-- Day Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('day', trans("lang.availability_hour_day"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('day', getDaysArray(), null, ['class' => 'select2 form-control']) !!}
            <div class="form-text text-muted">{{ trans("lang.availability_hour_day_help") }}</div>
        </div>
    </div>

    <!-- Start At Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('start_at', trans("lang.availability_hour_start_at"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            <div class="input-group timepicker start_at" data-target-input="nearest">
                {!! Form::text('start_at', null,  ['class' => 'form-control datetimepicker-input','placeholder'=>  trans("lang.availability_hour_start_at_placeholder"), 'data-target'=>'.timepicker.start_at','data-toggle'=>'datetimepicker','autocomplete'=>'off']) !!}
                <div id="widgetParentId"></div>
                <div class="input-group-append" data-target=".timepicker.start_at" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fas fa-business-time"></i></div>
                </div>
            </div>
            <div class="form-text text-muted">
                {{ trans("lang.availability_hour_start_at_help") }}
            </div>
        </div>
    </div>

    <!-- End At Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('end_at', trans("lang.availability_hour_end_at"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            <div class="input-group timepicker end_at" data-target-input="nearest">
                {!! Form::text('end_at', null,  ['class' => 'form-control datetimepicker-input','placeholder'=>  trans("lang.availability_hour_end_at_placeholder"), 'data-target'=>'.timepicker.end_at','data-toggle'=>'datetimepicker','autocomplete'=>'off']) !!}
                <div id="widgetParentId"></div>
                <div class="input-group-append" data-target=".timepicker.end_at" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fas fa-business-time"></i></div>
                </div>
            </div>
            <div class="form-text text-muted">
                {{ trans("lang.availability_hour_end_at_help") }}
            </div>
        </div>
    </div>
</div>
<div class="d-flex flex-column col-sm-12 col-md-6">

    <!-- E Provider Id Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('e_provider_id', trans("lang.availability_hour_e_provider_id"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('e_provider_id', $eProvider, null, ['class' => 'select2 form-control']) !!}
            <div class="form-text text-muted">{{ trans("lang.availability_hour_e_provider_id_help") }}</div>
        </div>
    </div>

    <!-- Data Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('data', trans("lang.availability_hour_data"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::text('data', null, ['class' => 'form-control','placeholder'=>
             trans("lang.availability_hour_data_placeholder")  ]) !!}
            <div class="form-text text-muted">{{ trans("lang.availability_hour_data_help") }}</div>
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
        <i class="fa fa-save"></i> {{trans('lang.save')}} {{trans('lang.availability_hour')}}
    </button>
    <a href="{!! route('availabilityHours.index') !!}" class="btn btn-default"><i class="fa fa-undo"></i> {{trans('lang.cancel')}}</a>
</div>
