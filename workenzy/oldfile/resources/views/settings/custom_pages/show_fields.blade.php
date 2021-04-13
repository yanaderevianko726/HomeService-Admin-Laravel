<!-- Title Field -->
<div class="d-flex w-100 border-bottom mb-4 mt-1">
    <div class="col-12">
        <h5>{{$customPage->title}}</h5>
    </div>
</div>

<!-- Content Field -->
<div class="d-flex flex-column">
    <div class="col-12">
        {!! $customPage->content !!}
    </div>
</div>

<!-- Published Field -->
<div class="form-group d-flex flex-column col-12">
    {!! Form::label('published', 'Published:', ['class' => 'col-md-3 control-label mx-1']) !!}
    <div class="col-md-9">
        <p>{!! getBooleanColumn($customPage,'published') !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group d-flex flex-column col-12">
    {!! Form::label('created_at', 'Created At:', ['class' => 'col-md-3 control-label mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $customPage->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group d-flex flex-column col-12">
    {!! Form::label('updated_at', 'Updated At:', ['class' => 'col-md-3 control-label mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $customPage->updated_at !!}</p>
    </div>
</div>


