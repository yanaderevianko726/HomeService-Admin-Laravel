<!-- Name Field -->
<div class="form-group row col-6">
    {!! Form::label('name', 'Name:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>trans("lang.permission_name_placeholder")]) !!}
        <small class="form-text text-muted">
            {{trans("lang.permission_name_help")}}
        </small>
    </div>
</div>

<!-- Guard Name Field -->
<div class="form-group row col-6">
    {!! Form::label('guard_name', 'Guard Name:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        {!! Form::text('guard_name', null, ['class' => 'form-control','placeholder'=>
        (Lang::has("lang.permission_name_placeholder")) ? trans("lang.permission_guard_name_placeholder") : "Name guard_name"]) !!}
        <small class="form-text text-muted">
            {{(Lang::has("lang.permission_guard_name_help")) ? trans("lang.permission_guard_name_help") : "Insert the guard_name"}}
        </small>
    </div>
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12 text-right">
    <button type="submit" class="btn bg-{{setting('theme_color')}} mx-md-3 my-lg-0 my-xl-0 my-md-0 my-2">
        <i class="fas fa-save"></i> {{trans('lang.save')}} {{trans('lang.permission')}}</button>
    <a href="{!! route('permissions.index') !!}" class="btn btn-default"><i class="fas fa-undo"></i> {{trans('lang.cancel')}}</a>
</div>
