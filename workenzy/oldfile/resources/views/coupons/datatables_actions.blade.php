<div class='btn-group btn-group-sm'>
    @can('coupons.show')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.view_details')}}" href="{{ route('coupons.show', $id) }}" class='btn btn-link'>
            <i class="fas fa-eye"></i> </a>
    @endcan

    @can('coupons.edit')
        <a data-toggle="tooltip" data-placement="left" title="{{trans('lang.coupon_edit')}}" href="{{ route('coupons.edit', $id) }}" class='btn btn-link'>
            <i class="fas fa-edit"></i> </a>
    @endcan

    @can('coupons.destroy')
        {!! Form::open(['route' => ['coupons.destroy', $id], 'method' => 'delete']) !!}
        {!! Form::button('<i class="fas fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-link text-danger',
        'onclick' => "return confirm('Are you sure?')"
        ]) !!}
        {!! Form::close() !!}
    @endcan
</div>
