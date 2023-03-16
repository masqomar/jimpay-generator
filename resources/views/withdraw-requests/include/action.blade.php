<td>
    @can('withdraw request view')
    <a href="{{ route('withdraw-requests.show', $model->id) }}" class="btn btn-outline-success btn-sm">
        <i class="fa fa-eye"></i>
    </a>
    @endcan

    @can('withdraw request edit')
    @if ($model->extra_field == 'Diproses')
    <a href="{{ route('withdraw-requests.edit', $model->id) }}" class="btn btn-outline-primary btn-sm">
        <i class="fa fa-pencil-alt"></i>
    </a>
    @endif
    @endcan

</td>