<div class='btn-group btn-group-sm'>
    @can('bookingStatuses.show')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.view_details')}}" href="{{ route('bookingStatuses.show', $id) }}" class='btn btn-link'>
            <i class="fas fa-eye"></i> </a> @endcan

    @can('bookingStatuses.edit')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.booking_status_edit')}}" href="{{ route('bookingStatuses.edit', $id) }}" class='btn btn-link'>
            <i class="fas fa-edit"></i> </a> @endcan

    @can('bookingStatuses.destroy') {!! Form::open(['route' => ['bookingStatuses.destroy', $id], 'method' => 'delete']) !!} {!! Form::button('<i class="fas fa-trash"></i>', [ 'type' => 'submit', 'class' => 'btn btn-link text-danger', 'onclick' => "return confirm('Are you sure?')" ]) !!} {!! Form::close() !!} @endcan
</div>
