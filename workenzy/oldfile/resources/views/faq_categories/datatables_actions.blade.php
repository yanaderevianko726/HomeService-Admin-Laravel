<div class='btn-group btn-group-sm'>
    @can('faqCategories.show')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.view_details')}}" href="{{ route('faqCategories.show', $id) }}" class='btn btn-link'>
            <i class="fas fa-eye"></i> </a>
    @endcan

    @can('faqCategories.edit')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.faq_category_edit')}}" href="{{ route('faqCategories.edit', $id) }}" class='btn btn-link'>
            <i class="fas fa-edit"></i> </a>
    @endcan

    @can('faqCategories.destroy')
        {!! Form::open(['route' => ['faqCategories.destroy', $id], 'method' => 'delete']) !!}
        {!! Form::button('<i class="fas fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-link text-danger',
        'onclick' => "return confirm('Are you sure?')"
        ]) !!}
        {!! Form::close() !!}
  @endcan
</div>
