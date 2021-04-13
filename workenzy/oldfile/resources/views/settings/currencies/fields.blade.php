@if($customFields)
    <h5 class="col-12 pb-4">{!! trans('lang.main_fields') !!}</h5>
@endif
<div class="d-flex flex-column col-sm-12 col-md-6">
    <!-- Name Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('name', trans("lang.currency_name"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::text('name', null,  ['class' => 'form-control','placeholder'=>  trans("lang.currency_name_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.currency_name_help") }}
            </div>
        </div>
    </div>

    <!-- Symbol Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('symbol', trans("lang.currency_symbol"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::text('symbol', null,  ['class' => 'form-control','placeholder'=>  trans("lang.currency_symbol_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.currency_symbol_help") }}
            </div>
        </div>
    </div>

    <!-- Code Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('code', trans("lang.currency_code"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::text('code', null,  ['class' => 'form-control','placeholder'=>  trans("lang.currency_code_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.currency_code_help") }}
            </div>
        </div>
    </div>
</div>
<div class="d-flex flex-column col-sm-12 col-md-6">

    <!-- Decimal Digits Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('decimal_digits', trans("lang.currency_decimal_digits"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::number('decimal_digits', null,  ['class' => 'form-control','placeholder'=>  trans("lang.currency_decimal_digits_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.currency_decimal_digits_help") }}
            </div>
        </div>
    </div>

    <!-- Rounding Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('rounding', trans("lang.currency_rounding"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::number('rounding', null,  ['class' => 'form-control','placeholder'=>  trans("lang.currency_rounding_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.currency_rounding_help") }}
            </div>
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
        <i class="fas fa-save"></i> {{trans('lang.save')}} {{trans('lang.currency')}}</button>
    <a href="{!! route('currencies.index') !!}" class="btn btn-default"><i class="fas fa-undo"></i> {{trans('lang.cancel')}}</a>
</div>
