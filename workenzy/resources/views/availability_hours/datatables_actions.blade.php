<div class='btn-group btn-group-sm'>
    @can('availabilityHours.show')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.view_details')}}" href="{{ route('availabilityHours.show', $id) }}" class='btn btn-link'>
            <i class="fas fa-eye"></i> </a>
    @endcan

    @can('availabilityHours.edit')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.availability_hour_edit')}}" href="{{ route('availabilityHours.edit', $id) }}" class='btn btn-link'>
            <i class="fas fa-edit"></i> </a>
    @endcan

    @can('availabilityHours.destroy')
        {!! Form::open(['route' => ['availabilityHours.destroy', $id], 'method' => 'delete']) !!}
        {!! Form::button('<i class="fas fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-link text-danger',
        'onclick' => "return confirm('Are you sure?')"
        ]) !!}
        {!! Form::close() !!}
    @endcan
</div>
