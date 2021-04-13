<div class='btn-group btn-group-sm'>
    @can('deliveryAddresses.show')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.view_details')}}" href="{{ route('deliveryAddresses.show', $id) }}" class='btn btn-link'>
            <i class="fas fa-eye"></i> </a>
    @endcan

    @can('deliveryAddresses.edit')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.delivery_address_edit')}}" href="{{ route('deliveryAddresses.edit', $id) }}" class='btn btn-link'>
            <i class="fas fa-edit"></i> </a>
    @endcan

    @can('deliveryAddresses.destroy')
        {!! Form::open(['route' => ['deliveryAddresses.destroy', $id], 'method' => 'delete']) !!}
        {!! Form::button('<i class="fas fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-link text-danger',
        'onclick' => "return confirm('Are you sure?')"
        ]) !!}
        {!! Form::close() !!}
  @endcan
</div>
