<div class='btn-group btn-group-sm'>
    @can('optionGroups.show')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.view_details')}}" href="{{ route('optionGroups.show', $id) }}" class='btn btn-link'>
            <i class="fas fa-eye"></i> </a> @endcan

    @can('optionGroups.edit')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.option_group_edit')}}" href="{{ route('optionGroups.edit', $id) }}" class='btn btn-link'>
            <i class="fas fa-edit"></i> </a> @endcan

    @can('optionGroups.destroy') {!! Form::open(['route' => ['optionGroups.destroy', $id], 'method' => 'delete']) !!} {!! Form::button('<i class="fas fa-trash"></i>', [ 'type' => 'submit', 'class' => 'btn btn-link text-danger', 'onclick' => "return confirm('Are you sure?')" ]) !!} {!! Form::close() !!} @endcan
</div>
