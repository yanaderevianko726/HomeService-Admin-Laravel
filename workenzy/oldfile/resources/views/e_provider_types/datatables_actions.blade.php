<div class='btn-group btn-group-sm'>
    @can('eProviderTypes.show')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.view_details')}}" href="{{ route('eProviderTypes.show', $id) }}" class='btn btn-link'>
            <i class="fas fa-eye"></i> </a>
    @endcan

    @can('eProviderTypes.edit')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.e_provider_type_edit')}}" href="{{ route('eProviderTypes.edit', $id) }}" class='btn btn-link'>
            <i class="fas fa-edit"></i> </a>
    @endcan

    @can('eProviderTypes.destroy')
        {!! Form::open(['route' => ['eProviderTypes.destroy', $id], 'method' => 'delete']) !!}
        {!! Form::button('<i class="fas fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-link text-danger',
        'onclick' => "return confirm('Are you sure?')"
        ]) !!}
        {!! Form::close() !!}
    @endcan
</div>
