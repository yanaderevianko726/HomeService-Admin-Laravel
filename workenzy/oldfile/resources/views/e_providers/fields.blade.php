@if($customFields)
    <h5 class="col-12 pb-4">{!! trans('lang.main_fields') !!}</h5>
@endif
<div class="d-flex flex-column col-sm-12 col-md-6">
    <!-- Image Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('image', trans("lang.e_provider_image"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            <div style="width: 100%" class="dropzone image" id="image" data-field="image">
            </div>
            <a href="#loadMediaModal" data-dropzone="image" data-toggle="modal" data-target="#mediaModal" class="btn btn-outline-{{setting('theme_color','primary')}} btn-sm float-right mt-1">{{ trans('lang.media_select')}}</a>
            <div class="form-text text-muted w-50">
                {{ trans("lang.e_provider_image_help") }}
            </div>
        </div>
    </div>
    @prepend('scripts')
        <script type="text/javascript">
            var var16105363151854745906ble = [];
            @if(isset($eProvider) && $eProvider->hasMedia('image'))
            @forEach($eProvider->getMedia('image') as $media)
            var16105363151854745906ble.push({
                name: "{!! $media->name !!}",
                size: "{!! $media->size !!}",
                type: "{!! $media->mime_type !!}",
                uuid: "{!! $media->getCustomProperty('uuid'); !!}",
                thumb: "{!! $media->getUrl('thumb'); !!}",
                collection_name: "{!! $media->collection_name !!}"
            });
            @endforeach
            @endif
            var dz_var16105363151854745906ble = $(".dropzone.image").dropzone({
                url: "{!!url('uploads/store')!!}",
                addRemoveLinks: true,
                maxFiles: 5 - var16105363151854745906ble.length,
                init: function () {
                    @if(isset($eProvider) && $eProvider->hasMedia('image'))
                    var16105363151854745906ble.forEach(media => {
                        dzInit(this, media, media.thumb);
                    });
                    @endif
                },
                accept: function (file, done) {
                    dzAccept(file, done, this.element, "{!!config('medialibrary.icons_folder')!!}");
                },
                sending: function (file, xhr, formData) {
                    dzSendingMultiple(this, file, formData, '{!! csrf_token() !!}');
                },
                complete: function (file) {
                    dzCompleteMultiple(this, file);
                    dz_var16105363151854745906ble[0].mockFile = file;
                },
                removedfile: function (file) {
                    dzRemoveFileMultiple(
                        file, var16105363151854745906ble, '{!! url("eProviders/remove-media") !!}',
                        'image', '{!! isset($eProvider) ? $eProvider->id : 0 !!}', '{!! url("uploads/clear") !!}', '{!! csrf_token() !!}'
                    );
                }
            });
            dz_var16105363151854745906ble[0].mockFile = var16105363151854745906ble;
            dropzoneFields['image'] = dz_var16105363151854745906ble;
        </script>
@endprepend

<!-- Name Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('name', trans("lang.e_provider_name"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::text('name', null,  ['class' => 'form-control','placeholder'=>  trans("lang.e_provider_name_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.e_provider_name_help") }}
            </div>
        </div>
    </div>

    <!-- E Provider Type Id Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('e_provider_type_id', trans("lang.e_provider_e_provider_type_id"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('e_provider_type_id', $eProviderType, null, ['class' => 'select2 form-control']) !!}
            <div class="form-text text-muted">{{ trans("lang.e_provider_e_provider_type_id_help") }}</div>
        </div>
    </div>

    <!-- Description Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('description', trans("lang.e_provider_description"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::textarea('description', null, ['class' => 'form-control','placeholder'=>
             trans("lang.e_provider_description_placeholder")  ]) !!}
            <div class="form-text text-muted">{{ trans("lang.e_provider_description_help") }}</div>
        </div>
    </div>

    <!-- Users Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('users[]', trans("lang.e_provider_users"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('users[]', $user, $usersSelected, ['class' => 'select2 form-control' , 'multiple'=>'multiple']) !!}
            <div class="form-text text-muted">{{ trans("lang.e_provider_users_help") }}</div>
        </div>
    </div>

</div>
<div class="d-flex flex-column col-sm-12 col-md-6">

    <!-- Phone Number Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('phone_number', trans("lang.e_provider_phone_number"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::text('phone_number', null,  ['class' => 'form-control','placeholder'=>  trans("lang.e_provider_phone_number_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.e_provider_phone_number_help") }}
            </div>
        </div>
    </div>
    <!-- Mobile Number Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('mobile_number', trans("lang.e_provider_mobile_number"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::text('mobile_number', null,  ['class' => 'form-control','placeholder'=>  trans("lang.e_provider_mobile_number_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.e_provider_mobile_number_help") }}
            </div>
        </div>
    </div>

    <!-- Addresses Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('addresses[]', trans("lang.e_provider_addresses"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('addresses[]', $address, $addressesSelected, ['class' => 'select2 form-control' , 'multiple'=>'multiple']) !!}
            <div class="form-text text-muted">{{ trans("lang.e_provider_addresses_help") }}</div>
        </div>
    </div>

    <!-- Taxes Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('taxes[]', trans("lang.e_provider_taxes"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('taxes[]', $tax, $taxesSelected, ['class' => 'select2 form-control' , 'multiple'=>'multiple']) !!}
            <div class="form-text text-muted">{{ trans("lang.e_provider_taxes_help") }}</div>
        </div>
    </div>

    <!-- Availability Range Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('availability_range', trans("lang.e_provider_availability_range"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::number('availability_range', null,  ['class' => 'form-control','step'=>'any', 'min'=>'0', 'placeholder'=>  trans("lang.e_provider_availability_range_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.e_provider_availability_range_help") }}
            </div>
        </div>
    </div>

    <!-- Available Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('available', trans("lang.e_provider_available"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        {!! Form::hidden('available', 0, ['id'=>"hidden_available"]) !!}
        <div class="col-9 icheck-{{setting('theme_color')}}">
            {!! Form::checkbox('available', 1, null) !!}
            <label for="available"></label>
        </div>
    </div>

    <!-- Featured Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('featured', trans("lang.e_provider_featured"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        {!! Form::hidden('featured', 0, ['id'=>"hidden_featured"]) !!}
        <div class="col-9 icheck-{{setting('theme_color')}}">
            {!! Form::checkbox('featured', 1, null) !!}
            <label for="featured"></label>
        </div>
    </div>

    <!-- Accepted Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('accepted', trans("lang.e_provider_accepted"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        {!! Form::hidden('accepted', 0, ['id'=>"hidden_accepted"]) !!}
        <div class="col-9 icheck-{{setting('theme_color')}}">
            {!! Form::checkbox('accepted', 1, null) !!}
            <label for="accepted"></label>
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
        <i class="fa fa-save"></i> {{trans('lang.save')}} {{trans('lang.e_provider')}}</button>
    <a href="{!! route('eProviders.index') !!}" class="btn btn-default"><i class="fa fa-undo"></i> {{trans('lang.cancel')}}</a>
</div>
