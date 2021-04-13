@if($customFields)
    <h5 class="col-12 pb-4">{!! trans('lang.main_fields') !!}</h5>
@endif
<div class="d-flex flex-column col-sm-12 col-md-6">
    <!-- Title Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('title', trans("lang.notification_title"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::text('title', null,  ['class' => 'form-control','placeholder'=>  trans("lang.notification_title_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.notification_title_help") }}
            </div>
        </div>
    </div>

    <!-- Notification Type Id Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('notification_type_id', trans("lang.notification_notification_type_id"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('notification_type_id', $notificationType, null, ['class' => 'select2 form-control']) !!}
            <div class="form-text text-muted">{{ trans("lang.notification_notification_type_id_help") }}</div>
        </div>
    </div>

</div>
<div class="d-flex flex-column col-sm-12 col-md-6">

    <!-- User Id Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('user_id', trans("lang.notification_user_id"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('user_id', $user, null, ['class' => 'select2 form-control']) !!}
            <div class="form-text text-muted">{{ trans("lang.notification_user_id_help") }}</div>
        </div>
    </div>

    <!-- 'Boolean Read Field' -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('read', trans("lang.notification_read"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="checkbox icheck">
            <label class="col-9 ml-2 form-check-inline">
                {!! Form::hidden('read', 0) !!}
                {!! Form::checkbox('read', 1, null) !!}
            </label>
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
        <i class="fas fa-save"></i> {{trans('lang.save')}} {{trans('lang.notification')}}</button>
    <a href="{!! route('notifications.index') !!}" class="btn btn-default"><i class="fas fa-undo"></i> {{trans('lang.cancel')}}</a>
</div>
