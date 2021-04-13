<!-- Id Field -->
<div class="form-group align-items-baseline d-flex flex-column flex-md-row">
    {!! Form::label('id', 'Id:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $option->id !!}</p>
    </div>
</div>

<!-- Name Field -->
<div class="form-group align-items-baseline d-flex flex-column flex-md-row">
    {!! Form::label('name', 'Name:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $option->name !!}</p>
    </div>
</div>

<!-- Image Field -->
<div class="form-group align-items-baseline d-flex flex-column flex-md-row">
    {!! Form::label('image', 'Image:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $option->image !!}</p>
    </div>
</div>

<!-- Description Field -->
<div class="form-group align-items-baseline d-flex flex-column flex-md-row">
    {!! Form::label('description', 'Description:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $option->description !!}</p>
    </div>
</div>

<!-- Price Field -->
<div class="form-group align-items-baseline d-flex flex-column flex-md-row">
    {!! Form::label('price', 'Price:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $option->price !!}</p>
    </div>
</div>

<!-- E Service Id Field -->
<div class="form-group align-items-baseline d-flex flex-column flex-md-row">
    {!! Form::label('e_service_id', 'E Service Id:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $option->e_service_id !!}</p>
    </div>
</div>

<!-- Option Group Id Field -->
<div class="form-group align-items-baseline d-flex flex-column flex-md-row">
    {!! Form::label('option_group_id', 'Option Group Id:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $option->option_group_id !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group align-items-baseline d-flex flex-column flex-md-row">
    {!! Form::label('created_at', 'Created At:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $option->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group align-items-baseline d-flex flex-column flex-md-row">
    {!! Form::label('updated_at', 'Updated At:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $option->updated_at !!}</p>
    </div>
</div>


