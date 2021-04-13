@if($customFields)
    <h5 class="col-12 pb-4">{!! trans('lang.main_fields') !!}</h5>
@endif
<div class="d-flex flex-column col-sm-12">
    <!-- Title Field -->
    <div class="form-group align-items-baseline d-flex flex-column">
        {!! Form::label('title', trans("lang.custom_page_title"), ['class' => 'col-md-3 control-label mx-1']) !!}
        <div class="col-md-4">
            {!! Form::text('title', null,  ['class' => 'form-control','placeholder'=>  trans("lang.custom_page_title_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.custom_page_title_help") }}
            </div>
        </div>
    </div>

    <!-- Content Field -->
    <div class="form-group align-items-baseline d-flex flex-column">
        {!! Form::label('content', trans("lang.custom_page_content"), ['class' => 'col-md-3 control-label mx-1']) !!}
        <div class="col-12">
            {!! Form::textarea('content', null, ['class' => 'form-control','placeholder'=>
             trans("lang.custom_page_content_placeholder")  ]) !!}
            <div class="form-text text-muted">{{ trans("lang.custom_page_content_help") }}</div>
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
        {!! Form::label('published', trans("lang.custom_page_published"),['class' => 'control-label my-0 mx-3']) !!} {!! Form::hidden('published', 0, ['id'=>"hidden_published"]) !!}
        <span class="icheck-{{setting('theme_color')}}">
            {!! Form::checkbox('published', 1, null) !!} <label for="published"></label> </span>
    </div>
    <button type="submit" class="btn bg-{{setting('theme_color')}} mx-md-3 my-lg-0 my-xl-0 my-md-0 my-2">
        <i class="fas fa-save"></i> {{trans('lang.save')}} {{trans('lang.custom_page')}}</button>
    <a href="{!! route('customPages.index') !!}" class="btn btn-default"><i class="fas fa-undo"></i> {{trans('lang.cancel')}}</a>
</div>
