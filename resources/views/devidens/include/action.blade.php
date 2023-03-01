<td>
    @can('deviden view')
    <a href="{{ route('devidens.show', $model->id) }}" class="btn btn-outline-success btn-sm">
        <i class="fa fa-eye"></i>
    </a>
    @endcan

    @can('deviden edit')
    <a href="{{ route('devidens.edit', $model->id) }}" class="btn btn-outline-primary btn-sm">
        <i class="fa fa-pencil-alt"></i>
    </a>
    @endcan
</td>