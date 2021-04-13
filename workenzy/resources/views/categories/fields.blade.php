@if($customFields)
    <h5 class="col-12 pb-4">{!! trans('lang.main_fields') !!}</h5>
@endif
<div class="d-flex flex-column col-sm-12 col-md-6">
    <!-- Name Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('name', trans("lang.category_name"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::text('name', null,  ['class' => 'form-control','placeholder'=>  trans("lang.category_name_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.category_name_help") }}
            </div>
        </div>
    </div>

    <!-- Color Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('color', trans("lang.category_color"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::text('color', null,  ['class' => 'form-control','placeholder'=>  trans("lang.category_color_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.category_color_help") }}
            </div>
        </div>
    </div>

    <!-- Description Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('description', trans("lang.category_description"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::textarea('description', null, ['class' => 'form-control','placeholder'=>
             trans("lang.category_description_placeholder")  ]) !!}
            <div class="form-text text-muted">{{ trans("lang.category_description_help") }}</div>
        </div>
    </div>
</div>
<div class="d-flex flex-column col-sm-12 col-md-6">
    <!-- Image Field -->
    <div class="form-group align-items-start d-flex flex-column flex-md-row">
        {!! Form::label('image', trans("lang.category_image"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            <div style="width: 100%" class="dropzone image" id="image" data-field="image">
                <input type="hidden" name="image">
            </div>
            <a href="#loadMediaModal" data-dropzone="image" data-toggle="modal" data-target="#mediaModal" class="btn btn-outline-{{setting('theme_color','primary')}} btn-sm float-right mt-1">{{ trans('lang.media_select')}}</a>
            <div class="form-text text-muted w-50">
                {{ trans("lang.category_image_help") }}
            </div>
        </div>
    </div>
    @prepend('scripts')
        <script type="text/javascript">
            var var16110650672130312723ble = '';
            @if(isset($category) && $category->hasMedia('image'))
                var16110650672130312723ble = {
                name: "{!! $category->getFirstMedia('image')->name !!}",
                size: "{!! $category->getFirstMedia('image')->size !!}",
                type: "{!! $category->getFirstMedia('image')->mime_type !!}",
                collection_name: "{!! $category->getFirstMedia('image')->collection_name !!}"
            };
            @endif
            var dz_var16110650672130312723ble = $(".dropzone.image").dropzone({
                url: "{!!url('uploads/store')!!}",
                addRemoveLinks: true,
                maxFiles: 1,
                init: function () {
                    @if(isset($category) && $category->hasMedia('image'))
                    dzInit(this, var16110650672130312723ble, '{!! url($category->getFirstMediaUrl('image','thumb')) !!}')
                    @endif
                },
                accept: function (file, done) {
                    dzAccept(file, done, this.element, "{!!config('medialibrary.icons_folder')!!}");
                },
                sending: function (file, xhr, formData) {
                    dzSending(this, file, formData, '{!! csrf_token() !!}');
                },
                maxfilesexceeded: function (file) {
                    dz_var16110650672130312723ble[0].mockFile = '';
                    dzMaxfile(this, file);
                },
                complete: function (file) {
                    dzComplete(this, file, var16110650672130312723ble, dz_var16110650672130312723ble[0].mockFile);
                    dz_var16110650672130312723ble[0].mockFile = file;
                },
                removedfile: function (file) {
                    dzRemoveFile(
                        file, var16110650672130312723ble, '{!! url("categories/remove-media") !!}',
                        'image', '{!! isset($category) ? $category->id : 0 !!}', '{!! url("uplaods/clear") !!}', '{!! csrf_token() !!}'
                    );
                }
            });
            dz_var16110650672130312723ble[0].mockFile = var16110650672130312723ble;
            dropzoneFields['image'] = dz_var16110650672130312723ble;
        </script>
@endprepend

<!-- Order Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('order', trans("lang.category_order"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::number('order', null,  ['class' => 'form-control','step'=>'1','min'=>'0', 'placeholder'=>  trans("lang.category_order_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.category_order_help") }}
            </div>
        </div>
    </div>

    <!-- Parent Id Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('parent_id', trans("lang.category_parent_id"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('parent_id', $parentCategory, null, ['data-empty'=>trans("lang.category_parent_id_placeholder"), 'class' => 'select2 not-required form-control']) !!}
            <div class="form-text text-muted">{{ trans("lang.category_parent_id_help") }}</div>
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
    <div class="d-flex flex-row justify-content-between align-items-center">
        {!! Form::label('featured', trans("lang.category_featured_help"),['class' => 'control-label my-0 mx-3'],false) !!} {!! Form::hidden('featured', 0, ['id'=>"hidden_featured"]) !!}
        <span class="icheck-{{setting('theme_color')}}">
            {!! Form::checkbox('featured', 1, null) !!} <label for="featured"></label> </span>
    </div>
    <button type="submit" class="btn bg-{{setting('theme_color')}} mx-md-3 my-lg-0 my-xl-0 my-md-0 my-2">
        <i class="fa fa-save"></i> {{trans('lang.save')}} {{trans('lang.category')}}
    </button>
    <a href="{!! route('categories.index') !!}" class="btn btn-default"><i class="fa fa-undo"></i> {{trans('lang.cancel')}}</a>
</div>
