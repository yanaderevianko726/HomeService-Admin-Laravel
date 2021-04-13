<!-- Id Field -->
<div class="form-group row col-6">
    {!! Form::label('id', 'Id:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $award->id !!}</p>
    </div>
</div>

<!-- Title Field -->
<div class="form-group row col-6">
    {!! Form::label('title', 'Title:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $award->title !!}</p>
    </div>
</div>

<!-- Description Field -->
<div class="form-group row col-6">
    {!! Form::label('description', 'Description:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $award->description !!}</p>
    </div>
</div>

<!-- E Provider Id Field -->
<div class="form-group row col-6">
    {!! Form::label('e_provider_id', 'E Provider Id:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $award->e_provider_id !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group row col-6">
    {!! Form::label('created_at', 'Created At:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $award->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group row col-6">
    {!! Form::label('updated_at', 'Updated At:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $award->updated_at !!}</p>
    </div>
</div>

