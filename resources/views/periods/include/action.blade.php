<td>
    @can('period view')
    <a href="{{ route('periods.show', $model->id) }}" class="btn btn-outline-success btn-sm">
        <i class="fa fa-eye"></i>
    </a>
    @endcan

    @can('period edit')
    <a href="{{ route('periods.edit', $model->id) }}" class="btn btn-outline-primary btn-sm">
        <i class="fa fa-pencil-alt"></i>
    </a>
    @endcan
</td>