<!-- Name Field -->
<div class="form-group row col-6">
    {!! Form::label('name', 'Name:', ['class' => 'col-4 control-label text-right']) !!}
    <div class="col-8">
        {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>
        (Lang::has("lang.role_name_placeholder")) ? trans("lang.role_name_placeholder") : "Name here"]) !!}
        <div class="form-text text-muted">
            {{(Lang::has("lang.role_name_help")) ? trans("lang.role_name_help") : "Insert the Name"}}
        </div>
    </div>
</div>

<!-- Guard Name Field -->
<div class="form-group row col-6">
    {!! Form::label('guard_name', 'Guard Name:', ['class' => 'col-4 control-label text-right']) !!}
    <div class="col-8">
        {!! Form::text('guard_name', null, ['class' => 'form-control','placeholder'=>
      (Lang::has("lang.role_name_placeholder")) ? trans("lang.role_guard_name_placeholder") : "Name guard_name"]) !!}
        <div class="form-text text-muted">
            {{(Lang::has("lang.role_guard_name_help")) ? trans("lang.role_guard_name_help") : "Insert the guard_name"}}
        </div>
    </div>
</div>

<!-- 'Boolean Default Field' -->
<div class="form-group row col-6">
    {!! Form::label('default', trans("lang.role_default"),['class' => 'col-4 control-label text-right']) !!} {!! Form::hidden('default', 0, ['id'=>"hidden_default"]) !!}
    <div class="col-8 icheck-{{setting('theme_color')}}">
        {!! Form::checkbox('default', 1, null) !!} <label for="default"></label>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-right">
    <button type="submit" class="btn bg-{{setting('theme_color')}} mx-md-3 my-lg-0 my-xl-0 my-md-0 my-2">
        <i class="fas fa-save"></i> {{trans('lang.save')}} {{trans('lang.role')}}</button>
    <a href="{!! route('roles.index') !!}" class="btn btn-default"><i class="fas fa-undo"></i> {{trans('lang.cancel')}}</a>
</div>
