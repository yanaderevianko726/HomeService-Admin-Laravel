@if($customFields)
    <h5 class="col-12 pb-4">{!! trans('lang.main_fields') !!}</h5>
@endif
<div class="d-flex flex-column col-sm-12 col-md-6">
    <!-- Logo Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('logo', trans("lang.payment_method_logo"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            <div style="width: 100%" class="dropzone logo" id="logo" data-field="logo">
                <input type="hidden" name="logo">
            </div>
            <a href="#loadMediaModal" data-dropzone="logo" data-toggle="modal" data-target="#mediaModal" class="btn btn-outline-{{setting('theme_color','primary')}} btn-sm float-right mt-1">{{ trans('lang.media_select')}}</a>
            <div class="form-text text-muted w-50">
                {{ trans("lang.payment_method_logo_help") }}
            </div>
        </div>
    </div>
    @prepend('scripts')
        <script type="text/javascript">
            var var1610036818671499439ble = '';
            @if(isset($payment_method) && $payment_method->hasMedia('logo'))
                var1610036818671499439ble = {
                name: "{!! $payment_method->getFirstMedia('logo')->name !!}",
                size: "{!! $payment_method->getFirstMedia('logo')->size !!}",
                type: "{!! $payment_method->getFirstMedia('logo')->mime_type !!}",
                collection_name: "{!! $payment_method->getFirstMedia('logo')->collection_name !!}"
            };
            @endif
            var dz_var1610036818671499439ble = $(".dropzone.logo").dropzone({
                url: "{!!url('uploads/store')!!}",
                addRemoveLinks: true,
                maxFiles: 1,
                init: function () {
                    @if(isset($payment_method) && $payment_method->hasMedia('logo'))
                    dzInit(this, var1610036818671499439ble, '{!! url($payment_method->getFirstMediaUrl('logo','thumb')) !!}')
                    @endif
                },
                accept: function (file, done) {
                    dzAccept(file, done, this.element, "{!!config('medialibrary.icons_folder')!!}");
                },
                sending: function (file, xhr, formData) {
                    dzSending(this, file, formData, '{!! csrf_token() !!}');
                },
                maxfilesexceeded: function (file) {
                    dz_var1610036818671499439ble[0].mockFile = '';
                    dzMaxfile(this, file);
                },
                complete: function (file) {
                    dzComplete(this, file, var1610036818671499439ble, dz_var1610036818671499439ble[0].mockFile);
                    dz_var1610036818671499439ble[0].mockFile = file;
                },
                removedfile: function (file) {
                    dzRemoveFile(
                        file, var1610036818671499439ble, '{!! url("payment_methods/remove-media") !!}',
                        'logo', '{!! isset($payment_method) ? $payment_method->id : 0 !!}', '{!! url("uplaods/clear") !!}', '{!! csrf_token() !!}'
                    );
                }
            });
            dz_var1610036818671499439ble[0].mockFile = var1610036818671499439ble;
            dropzoneFields['logo'] = dz_var1610036818671499439ble;
        </script>
@endprepend

<!-- Name Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('name', trans("lang.payment_method_name"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::text('name', null,  ['class' => 'form-control','placeholder'=>  trans("lang.payment_method_name_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.payment_method_name_help") }}
            </div>
        </div>
    </div>

    <!-- Description Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('description', trans("lang.payment_method_description"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::text('description', null,  ['class' => 'form-control','placeholder'=>  trans("lang.payment_method_description_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.payment_method_description_help") }}
            </div>
        </div>
    </div>

    <!-- Route Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('route', trans("lang.payment_method_route"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::text('route', null,  ['class' => 'form-control','placeholder'=>  trans("lang.payment_method_route_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.payment_method_route_help") }}
            </div>
        </div>
    </div>
</div>
<div class="d-flex flex-column col-sm-12 col-md-6">

    <!-- Order Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('order', trans("lang.payment_method_order"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::number('order', null,  ['class' => 'form-control','min'=> '0', 'placeholder' =>  trans("lang.payment_method_order_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.payment_method_order_help") }}
            </div>
        </div>
    </div>

    <!-- Boolean Default Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('default', trans("lang.payment_method_default"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        {!! Form::hidden('default', 0, ['id'=>"hidden_default"]) !!}
        <div class="col-9 icheck-{{setting('theme_color')}}">
            {!! Form::checkbox('default', 1, null) !!}
            <label for="default"></label>
        </div>
    </div>

    <!-- Boolean Enabled Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('enabled', trans("lang.payment_method_enabled"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
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
        <i class="fas fa-save"></i> {{trans('lang.save')}} {{trans('lang.payment_method')}}</button>
    <a href="{!! route('paymentMethods.index') !!}" class="btn btn-default"><i class="fas fa-undo"></i> {{trans('lang.cancel')}}</a>
</div>
