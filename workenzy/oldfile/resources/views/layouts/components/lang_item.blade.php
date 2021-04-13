{{--$name = $filename.'|'.$key --}}
{{--$key = $key.'...' --}}
{{--$keyWithFileName = $filename.'.'.$key --}}

<div class="form-group align-items-baseline d-flex flex-column flex-md-row ">
    {!! Form::label($name, $key,['class' => $item ? 'col-md-4 control-label text-md-right mx-1':'col-md-4 control-label text-md-right mx-1 text-danger']) !!}
    <div class="col-md-8">
        <div class="input-group">
            {!! Form::text($name, $item,  ['class' => 'form-control','placeholder'=>  $keyWithFileName]) !!}
            <div class="input-group-append">
                <button class="btn btn-outline-danger delete-lang-item" type="button">{{__('lang.delete')}}</button>
            </div>
        </div>
        <div class="form-text text-muted">
            {!! trans($keyWithFileName) !!}
        </div>
    </div>
</div>
