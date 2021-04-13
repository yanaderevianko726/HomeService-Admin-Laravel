@if($customFields)
    <h5 class="col-12 pb-4">{!! trans('lang.main_fields') !!}</h5>
@endif
<div class="d-flex flex-column col-sm-12 col-md-6">
    <!-- Description Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('description', trans("lang.gallery_description"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::textarea('description', null, ['class' => 'form-control','placeholder'=>
             trans("lang.gallery_description_placeholder")  ]) !!}
            <div class="form-text text-muted">{{ trans("lang.gallery_description_help") }}</div>
        </div>
    </div>

</div>
<div class="d-flex flex-column col-sm-12 col-md-6">
    <!-- Image Field -->
    <div class="form-group align-items-start d-flex flex-column flex-md-row">
        {!! Form::label('image', trans("lang.gallery_image"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            <div style="width: 100%" class="dropzone image" id="image" data-field="image">
                <input type="hidden" name="image">
            </div>
            <a href="#loadMediaModal" data-dropzone="image" data-toggle="modal" data-target="#mediaModal" class="btn btn-outline-{{setting('theme_color','primary')}} btn-sm float-right mt-1">{{ trans('lang.media_select')}}</a>
            <div class="form-text text-muted w-50">
                {{ trans("lang.gallery_image_help") }}
            </div>
        </div>
    </div>
    @prepend('scripts')
        <script type="text/javascript">
            var var16114329331808130067ble = '';
            @if(isset($gallery) && $gallery->hasMedia('image'))
                var16114329331808130067ble = {
                name: "{!! $gallery->getFirstMedia('image')->name !!}",
                size: "{!! $gallery->getFirstMedia('image')->size !!}",
                type: "{!! $gallery->getFirstMedia('image')->mime_type !!}",
                collection_name: "{!! $gallery->getFirstMedia('image')->collection_name !!}"
            };
            @endif
            var dz_var16114329331808130067ble = $(".dropzone.image").dropzone({
                url: "{!!url('uploads/store')!!}",
                addRemoveLinks: true,
                maxFiles: 1,
                init: function () {
                    @if(isset($gallery) && $gallery->hasMedia('image'))
                    dzInit(this, var16114329331808130067ble, '{!! url($gallery->getFirstMediaUrl('image','thumb')) !!}')
                    @endif
                },
                accept: function (file, done) {
                    dzAccept(file, done, this.element, "{!!config('medialibrary.icons_folder')!!}");
                },
                sending: function (file, xhr, formData) {
                    dzSending(this, file, formData, '{!! csrf_token() !!}');
                },
                maxfilesexceeded: function (file) {
                    dz_var16114329331808130067ble[0].mockFile = '';
                    dzMaxfile(this, file);
                },
                complete: function (file) {
                    dzComplete(this, file, var16114329331808130067ble, dz_var16114329331808130067ble[0].mockFile);
                    dz_var16114329331808130067ble[0].mockFile = file;
                },
                removedfile: function (file) {
                    dzRemoveFile(
                        file, var16114329331808130067ble, '{!! url("galleries/remove-media") !!}',
                        'image', '{!! isset($gallery) ? $gallery->id : 0 !!}', '{!! url("uplaods/clear") !!}', '{!! csrf_token() !!}'
                    );
                }
            });
            dz_var16114329331808130067ble[0].mockFile = var16114329331808130067ble;
            dropzoneFields['image'] = dz_var16114329331808130067ble;
        </script>
@endprepend
<!-- E Provider Id Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('e_provider_id', trans("lang.gallery_e_provider_id"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('e_provider_id', $eProvider, null, ['class' => 'select2 form-control']) !!}
            <div class="form-text text-muted">{{ trans("lang.gallery_e_provider_id_help") }}</div>
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
        <i class="fas fa-save"></i> {{trans('lang.save')}} {{trans('lang.gallery')}}</button>
    <a href="{!! route('galleries.index') !!}" class="btn btn-default"><i class="fas fa-undo"></i> {{trans('lang.cancel')}}</a>
</div>
