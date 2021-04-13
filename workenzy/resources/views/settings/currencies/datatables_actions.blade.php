<div class='btn-group btn-group-sm'>
    @can('currencies.show')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.view_details')}}" href="{{ route('currencies.show', $id) }}" class='btn btn-link'>
            <i class="fas fa-eye"></i> </a>
    @endcan

    @can('currencies.edit')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.currency_edit')}}" href="{{ route('currencies.edit', $id) }}" class='btn btn-link'>
            <i class="fas fa-edit"></i> </a>
    @endcan

    @can('currencies.destroy')
        {!! Form::open(['route' => ['currencies.destroy', $id], 'method' => 'delete']) !!}
        {!! Form::button('<i class="fas fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-link text-danger',
        'onclick' => "return confirm('Are you sure?')"
        ]) !!}
        {!! Form::close() !!}
  @endcan
</div>
