<!-- Id Field -->
<div class="form-group row col-6">
    {!! Form::label('id', 'Id:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $paymentMethod->id !!}</p>
    </div>
</div>

<!-- Logo Field -->
<div class="form-group row col-6">
    {!! Form::label('logo', 'Logo:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $paymentMethod->logo !!}</p>
    </div>
</div>

<!-- Name Field -->
<div class="form-group row col-6">
    {!! Form::label('name', 'Name:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $paymentMethod->name !!}</p>
    </div>
</div>

<!-- Description Field -->
<div class="form-group row col-6">
    {!! Form::label('description', 'Description:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $paymentMethod->description !!}</p>
    </div>
</div>

<!-- Route Field -->
<div class="form-group row col-6">
    {!! Form::label('route', 'Route:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $paymentMethod->route !!}</p>
    </div>
</div>

<!-- Order Field -->
<div class="form-group row col-6">
    {!! Form::label('order', 'Order:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $paymentMethod->order !!}</p>
    </div>
</div>

<!-- Default Field -->
<div class="form-group row col-6">
    {!! Form::label('default', 'Default:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $paymentMethod->default !!}</p>
    </div>
</div>

<!-- Enabled Field -->
<div class="form-group row col-6">
    {!! Form::label('enabled', 'Enabled:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $paymentMethod->enabled !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group row col-6">
    {!! Form::label('created_at', 'Created At:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $paymentMethod->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group row col-6">
    {!! Form::label('updated_at', 'Updated At:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $paymentMethod->updated_at !!}</p>
    </div>
</div>

