<!-- Id Field -->
<div class="form-group align-items-baseline d-flex flex-column flex-md-row">
    {!! Form::label('id', 'Id:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $favorite->id !!}</p>
    </div>
</div>

<!-- E Service Id Field -->
<div class="form-group align-items-baseline d-flex flex-column flex-md-row">
    {!! Form::label('e_service_id', 'E Service Id:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $favorite->e_service_id !!}</p>
    </div>
</div>

<!-- Options Field -->
<div class="form-group align-items-baseline d-flex flex-column flex-md-row">
    {!! Form::label('options', 'Options:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $favorite->options !!}</p>
    </div>
</div>

<!-- User Id Field -->
<div class="form-group align-items-baseline d-flex flex-column flex-md-row">
    {!! Form::label('user_id', 'User Id:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $favorite->user_id !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group align-items-baseline d-flex flex-column flex-md-row">
    {!! Form::label('created_at', 'Created At:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $favorite->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group align-items-baseline d-flex flex-column flex-md-row">
    {!! Form::label('updated_at', 'Updated At:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $favorite->updated_at !!}</p>
    </div>
</div>


