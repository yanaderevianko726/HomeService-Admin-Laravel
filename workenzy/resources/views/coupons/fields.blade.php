@if($customFields)
    <h5 class="col-12 pb-4">{!! trans('lang.main_fields') !!}</h5>
@endif
<div class="d-flex flex-column col-sm-12 col-md-6">
    <!-- Code Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('code', trans("lang.coupon_code"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            @if(isset($coupon['code']))
                <p>{!! $coupon->code !!}</p>
            @else
                {!! Form::text('code', null,  ['class' => 'form-control','placeholder'=>  trans("lang.coupon_code_placeholder")]) !!}
                <div class="form-text text-muted">
                    {{ trans("lang.coupon_code_help") }}
                </div>
            @endif
        </div>
    </div>

    <!-- Discount Type Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('discount_type', trans("lang.coupon_discount_type"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('discount_type', ['percent' => trans('lang.coupon_percent'),'fixed' => trans('lang.coupon_fixed')], null, ['class' => 'select2 form-control']) !!}
            <div class="form-text text-muted">{{ trans("lang.coupon_discount_type_help") }}</div>
        </div>
    </div>

    <!-- Discount Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('discount', trans("lang.coupon_discount"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::number('discount', null,  ['class' => 'form-control','placeholder'=>  trans("lang.coupon_discount_placeholder"),'step'=>"any", 'min'=>"0"]) !!}
            <div class="form-text text-muted">
                {!! trans("lang.coupon_discount_help")   !!}
            </div>
        </div>
    </div>

    <!-- Description Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('description', trans("lang.coupon_description"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::textarea('description', null, ['class' => 'form-control','placeholder'=>
             trans("lang.coupon_description_placeholder")  ]) !!}
            <div class="form-text text-muted">{{ trans("lang.coupon_description_help") }}</div>
        </div>
    </div>

</div>
<div class="d-flex flex-column col-sm-12 col-md-6">

    <!-- EService Id Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('eServices[]', trans("lang.coupon_e_service_id"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('eServices[]', $eService, $eServicesSelected, ['class' => 'select2 form-control', 'multiple'=>'multiple']) !!}
            <div class="form-text text-muted">{{ trans("lang.coupon_e_service_id_help") }}</div>
        </div>
    </div>

    <!-- EProvider Id Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('eProviders[]', trans("lang.coupon_e_provider_id"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('eProviders[]', $eProvider, $eProvidersSelected, ['class' => 'select2 form-control', 'multiple'=>'multiple']) !!}
            <div class="form-text text-muted">{{ trans("lang.coupon_e_provider_id_help") }}</div>
        </div>
    </div>

    <!-- Category Id Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('categories[]', trans("lang.coupon_category_id"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('categories[]', $category, $categoriesSelected, ['class' => 'select2 form-control', 'multiple'=>'multiple']) !!}
            <div class="form-text text-muted">{{ trans("lang.coupon_category_id_help") }}</div>
        </div>
    </div>

    <!-- Start At Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('expires_at', trans("lang.coupon_expires_at"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            <div class="input-group datepicker expires_at" data-target-input="nearest">
                {!! Form::text('expires_at', null,  ['class' => 'form-control datetimepicker-input','placeholder'=>  trans("lang.coupon_expires_at_placeholder"), 'data-target'=>'.datepicker.expires_at','data-toggle'=>'datetimepicker','autocomplete'=>'off']) !!}
                <div id="widgetParentId"></div>
                <div class="input-group-append" data-target=".datepicker.expires_at" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fas fa-business-time"></i></div>
                </div>
            </div>
            <div class="form-text text-muted">
                {{ trans("lang.coupon_expires_at_help") }}
            </div>
        </div>
    </div>

    <!-- 'Boolean Enabled Field' -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('enabled', trans("lang.coupon_enabled"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        {!! Form::hidden('enabled', 0, ['id'=>"hidden_enabled"]) !!}
        <div class="col-9 icheck-{{setting('theme_color')}}">
            {!! Form::checkbox('enabled', 1, null) !!}
            <label for="enabled"></label>
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
        <i class="fas fa-save"></i> {{trans('lang.save')}} {{trans('lang.coupon')}}</button>
    <a href="{!! route('coupons.index') !!}" class="btn btn-default"><i class="fas fa-undo"></i> {{trans('lang.cancel')}}</a>
</div>
