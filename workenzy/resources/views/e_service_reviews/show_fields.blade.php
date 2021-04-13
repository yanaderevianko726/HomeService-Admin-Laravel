<!-- Id Field -->
<div class="form-group align-items-baseline d-flex flex-column flex-md-row">
    {!! Form::label('id', 'Id:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $eServiceReview->id !!}</p>
    </div>
</div>

<!-- Review Field -->
<div class="form-group align-items-baseline d-flex flex-column flex-md-row">
    {!! Form::label('review', 'Review:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $eServiceReview->review !!}</p>
    </div>
</div>

<!-- Rate Field -->
<div class="form-group align-items-baseline d-flex flex-column flex-md-row">
    {!! Form::label('rate', 'Rate:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $eServiceReview->rate !!}</p>
    </div>
</div>

<!-- User Id Field -->
<div class="form-group align-items-baseline d-flex flex-column flex-md-row">
    {!! Form::label('user_id', 'User Id:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $eServiceReview->user_id !!}</p>
    </div>
</div>

<!-- E Service Id Field -->
<div class="form-group align-items-baseline d-flex flex-column flex-md-row">
    {!! Form::label('e_service_id', 'E Service Id:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $eServiceReview->e_service_id !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group align-items-baseline d-flex flex-column flex-md-row">
    {!! Form::label('created_at', 'Created At:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $eServiceReview->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group align-items-baseline d-flex flex-column flex-md-row">
    {!! Form::label('updated_at', 'Updated At:', ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
    <div class="col-md-9">
        <p>{!! $eServiceReview->updated_at !!}</p>
    </div>
</div>


