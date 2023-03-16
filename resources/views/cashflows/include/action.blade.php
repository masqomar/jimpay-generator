<td>
    @can('cashflow view')
    <a href="{{ route('cashflows.show', $model->id) }}" class="btn btn-outline-success btn-sm">
        <i class="fa fa-eye"></i>
    </a>
    @endcan

    @can('cashflow edit')
    <a href="{{ route('cashflows.edit', $model->id) }}" class="btn btn-outline-primary btn-sm">
        <i class="fa fa-pencil-alt"></i>
    </a>
    @endcan
</td>