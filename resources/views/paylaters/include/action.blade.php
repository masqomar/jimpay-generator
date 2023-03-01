<td>
    @can('paylater view')
    <a href="{{ route('paylaters.show', $model->id) }}" class="btn btn-outline-success btn-sm">
        <i class="fa fa-eye"></i>
    </a>
    @endcan

    @can('paylater edit')
    @if ($model->status == null)
    <a href="{{ route('paylaters.edit', $model->id) }}" class="btn btn-outline-primary btn-sm">
        <i class="fa fa-pencil-alt"></i>
    </a>
    @endif
    @endcan

</td>