<td>
    @can('user saving transaction view')
    <a href="{{ route('user-saving-transactions.show', $model->id) }}" class="btn btn-outline-success btn-sm">
        <i class="fa fa-eye"></i>
    </a>
    @endcan

    @can('user saving transaction edit')
    @if ($model->status == null)
    <a href="{{ route('user-saving-transactions.edit', $model->id) }}" class="btn btn-outline-primary btn-sm">
        <i class="fa fa-pencil-alt"></i>
    </a>
    @endif
    @endcan
</td>