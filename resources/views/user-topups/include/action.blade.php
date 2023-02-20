<td>
    @can('user topup view')
    <a href="{{ route('user-topups.show', $model->id) }}" class="btn btn-outline-success btn-sm">
        <i class="fa fa-eye"></i>
    </a>
    @endcan
</td>