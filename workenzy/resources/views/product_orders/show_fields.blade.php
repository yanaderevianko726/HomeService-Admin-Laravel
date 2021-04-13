<!-- Id Field -->
<div class="form-group row col-6">
    {!! Form::label('id', 'Id:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $eserviceBooking->id !!}</p>
    </div>
</div>

<!-- Price Field -->
<div class="form-group row col-6">
    {!! Form::label('price', 'Price:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $eserviceBooking->price !!}</p>
    </div>
</div>

<!-- Quantity Field -->
<div class="form-group row col-6">
    {!! Form::label('quantity', 'Quantity:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $eserviceBooking->quantity !!}</p>
    </div>
</div>

<!-- EService Id Field -->
<div class="form-group row col-6">
    {!! Form::label('eservice_id', 'EService Id:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $eserviceBooking->eservice_id !!}</p>
    </div>
</div>

<!-- Options Field -->
<div class="form-group row col-6">
    {!! Form::label('options', 'Options:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $eserviceBooking->options !!}</p>
    </div>
</div>

<!-- Booking Id Field -->
<div class="form-group row col-6">
    {!! Form::label('booking_id', 'Booking Id:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $eserviceBooking->booking_id !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group row col-6">
    {!! Form::label('created_at', 'Created At:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $eserviceBooking->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group row col-6">
    {!! Form::label('updated_at', 'Updated At:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $eserviceBooking->updated_at !!}</p>
    </div>
</div>

