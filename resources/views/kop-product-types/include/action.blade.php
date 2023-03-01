<td>
    @can('kop product type view')
    <a href="{{ route('kop-product-types.show', $model->id) }}" class="btn btn-outline-success btn-sm">
        <i class="fa fa-eye"></i>
    </a>
    @endcan

    @can('kop product type edit')
    <a href="{{ route('kop-product-types.edit', $model->id) }}" class="btn btn-outline-primary btn-sm">
        <i class="fa fa-pencil-alt"></i>
    </a>
    @endcan

</td>