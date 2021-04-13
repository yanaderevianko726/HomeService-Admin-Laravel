<!-- Id Field -->
<div class="form-group row col-6">
    {!! Form::label('id', 'Id:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $eProviderType->id !!}</p>
    </div>
</div>

<!-- Name Field -->
<div class="form-group row col-6">
    {!! Form::label('name', 'Name:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $eProviderType->name !!}</p>
    </div>
</div>

<!-- Commission Field -->
<div class="form-group row col-6">
    {!! Form::label('commission', 'Commission:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $eProviderType->commission !!}</p>
    </div>
</div>

<!-- Disabled Field -->
<div class="form-group row col-6">
    {!! Form::label('disabled', 'Disabled:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $eProviderType->disabled !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group row col-6">
    {!! Form::label('created_at', 'Created At:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $eProviderType->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group row col-6">
    {!! Form::label('updated_at', 'Updated At:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $eProviderType->updated_at !!}</p>
    </div>
</div>

