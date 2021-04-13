<!-- Id Field -->
<div class="form-group row col-6">
    {!! Form::label('id', 'Id:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $availabilityHour->id !!}</p>
    </div>
</div>

<!-- Day Field -->
<div class="form-group row col-6">
    {!! Form::label('day', 'Day:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $availabilityHour->day !!}</p>
    </div>
</div>

<!-- Start At Field -->
<div class="form-group row col-6">
    {!! Form::label('start_at', 'Start At:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $availabilityHour->start_at !!}</p>
    </div>
</div>

<!-- End At Field -->
<div class="form-group row col-6">
    {!! Form::label('end_at', 'End At:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $availabilityHour->end_at !!}</p>
    </div>
</div>

<!-- Data Field -->
<div class="form-group row col-6">
    {!! Form::label('data', 'Data:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $availabilityHour->data !!}</p>
    </div>
</div>

<!-- E Provider Id Field -->
<div class="form-group row col-6">
    {!! Form::label('e_provider_id', 'E Provider Id:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $availabilityHour->e_provider_id !!}</p>
    </div>
</div>

