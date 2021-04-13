<div class='btn-group btn-group-sm'>
    @can('eserviceBookings.show')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.view_details')}}" href="{{ route('eserviceBookings.show', $id) }}" class='btn btn-link'>
            <i class="fas fa-eye"></i> </a>
    @endcan

    @can('eserviceBookings.edit')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.eservice_booking_edit')}}" href="{{ route('eserviceBookings.edit', $id) }}" class='btn btn-link'>
            <i class="fas fa-edit"></i> </a>
    @endcan

    @can('bookings.edit')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.booking_edit')}}" href="{{ route('bookings.edit', $booking['id']) }}" class='btn btn-link'>
            <i class="fas fa-tasks"></i> </a>
    @endcan

    @can('eserviceBookings.destroy')
        {!! Form::open(['route' => ['eserviceBookings.destroy', $id], 'method' => 'delete']) !!}
        {!! Form::button('<i class="fas fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-link text-danger',
        'onclick' => "return confirm('Are you sure?')"
        ]) !!}
        {!! Form::close() !!}
  @endcan
</div>
