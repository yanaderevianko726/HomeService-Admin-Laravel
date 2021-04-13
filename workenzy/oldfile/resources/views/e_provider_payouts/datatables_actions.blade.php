<div class='btn-group btn-group-sm'>
    @can('eProviderPayouts.show')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.view_details')}}" href="{{ route('eProviderPayouts.show', $id) }}" class='btn btn-link'>
            <i class="fas fa-eye"></i> </a> @endcan

    @can('eProviderPayouts.edit')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.e_provider_payout_edit')}}" href="{{ route('eProviderPayouts.edit', $id) }}" class='btn btn-link'>
            <i class="fas fa-edit"></i> </a> @endcan

    @can('eProviderPayouts.destroy') {!! Form::open(['route' => ['eProviderPayouts.destroy', $id], 'method' => 'delete']) !!} {!! Form::button('<i class="fas fa-trash"></i>', [ 'type' => 'submit', 'class' => 'btn btn-link text-danger', 'onclick' => "return confirm('Are you sure?')" ]) !!} {!! Form::close() !!} @endcan
</div>
