<div class='btn-group btn-group-sm'>
    @can('eServiceReviews.show')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.view_details')}}" href="{{ route('eServiceReviews.show', $id) }}" class='btn btn-link'>
            <i class="fas fa-eye"></i> </a> @endcan

    @can('eServiceReviews.edit')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.e_service_review_edit')}}" href="{{ route('eServiceReviews.edit', $id) }}" class='btn btn-link'>
            <i class="fas fa-edit"></i> </a> @endcan

    @can('eServiceReviews.destroy') {!! Form::open(['route' => ['eServiceReviews.destroy', $id], 'method' => 'delete']) !!} {!! Form::button('<i class="fas fa-trash"></i>', [ 'type' => 'submit', 'class' => 'btn btn-link text-danger', 'onclick' => "return confirm('Are you sure?')" ]) !!} {!! Form::close() !!} @endcan
</div>
