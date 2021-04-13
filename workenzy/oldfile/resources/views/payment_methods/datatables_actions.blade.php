<div class='btn-group btn-group-sm'>
    @can('paymentMethods.show')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.view_details')}}" href="{{ route('paymentMethods.show', $id) }}" class='btn btn-link'>
            <i class="fas fa-eye"></i> </a>
    @endcan

    @can('paymentMethods.edit')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.payment_method_edit')}}" href="{{ route('paymentMethods.edit', $id) }}" class='btn btn-link'>
            <i class="fas fa-edit"></i> </a>
    @endcan

    @can('paymentMethods.destroy')
        {!! Form::open(['route' => ['paymentMethods.destroy', $id], 'method' => 'delete']) !!}
        {!! Form::button('<i class="fas fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-link text-danger',
        'onclick' => "return confirm('Are you sure?')"
        ]) !!}
        {!! Form::close() !!}
    @endcan
</div>
