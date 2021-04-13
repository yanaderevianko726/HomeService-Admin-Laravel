@if($customFields)
    <h5 class="col-12 pb-4">{!! trans('lang.main_fields') !!}</h5>
@endif
<div class="d-flex flex-column col-sm-12 col-md-6">
    <!-- Review Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('review', trans("lang.e_service_review_review"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::textarea('review', null, ['class' => 'form-control','placeholder'=>
             trans("lang.e_service_review_review_placeholder")  ]) !!}
            <div class="form-text text-muted">{{ trans("lang.e_service_review_review_help") }}</div>
        </div>
    </div>

    <!-- Rate Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('rate', trans("lang.e_service_review_rate"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('rate', [1=>1,2=>2,3=>3,4=>4,5=>5], null, ['class' => 'select2 form-control']) !!}
            <div class="form-text text-muted">{{ trans("lang.e_service_review_rate_help") }}</div>
        </div>
    </div>

</div>
<div class="d-flex flex-column col-sm-12 col-md-6">

    <!-- User Id Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('user_id', trans("lang.e_service_review_user_id"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('user_id', $user, null, ['class' => 'select2 form-control']) !!}
            <div class="form-text text-muted">{{ trans("lang.e_service_review_user_id_help") }}</div>
        </div>
    </div>

    <!-- E Service Id Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('e_service_id', trans("lang.e_service_review_e_service_id"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('e_service_id', $eService, null, ['class' => 'select2 form-control']) !!}
            <div class="form-text text-muted">{{ trans("lang.e_service_review_e_service_id_help") }}</div>
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
        <i class="fas fa-save"></i> {{trans('lang.save')}} {{trans('lang.e_service_review')}}</button>
    <a href="{!! route('eServiceReviews.index') !!}" class="btn btn-default"><i class="fas fa-undo"></i> {{trans('lang.cancel')}}</a>
</div>
