@extends('layouts.app')

@section('title', __('Penarikan Saldo Mitra'))

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3>{{ __('Penarikan Saldo Mitra') }}</h3>
                <p class="text-subtitle text-muted">
                    {{ __('Below is a list of all Penarikan Saldo Mitra.') }}
                </p>
            </div>
            <x-breadcrumb>
                <li class="breadcrumb-item"><a href="/">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Penarikan Saldo Mitra') }}</li>
            </x-breadcrumb>
        </div>
    </div>

    <section class="section">
        <x-alert></x-alert>

        @can('withdraw request create')
        <div class="d-flex justify-content-end">
            <a href="{{ route('withdraw-requests.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i>
                {{ __('Create a new withdraw request') }}
            </a>
        </div>
        @endcan

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive p-1">
                            <table class="table table-striped" id="data-table" width="100%">
                                <thead>
                                    <tr>
                                        <th>{{ __('Id') }}</th>
                                        <th>{{ __('Mitra') }}</th>
                                        <th>{{ __('Nominal') }}</th>
                                        <th>{{ __('Bank') }}</th>
                                        <th>{{ __('No Rekening') }}</th>
                                        <th>{{ __('Atas Nama') }}</th>
                                        <th>{{ __('Bukti Pencairan') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.0/datatables.min.css" />
@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.0/datatables.min.js"></script>
<script>
    $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('withdraw-requests.index') }}",
        columns: [{
                data: 'id',
                name: 'id',
            },
            {
                data: 'user',
                name: 'user.first_name'
            },
            {
                data: 'amount',
                name: 'amount',
            },
            {
                data: 'bank',
                name: 'bank',
            },
            {
                data: 'bank_account_number',
                name: 'bank_account_number',
            },
            {
                data: 'bank_account_name',
                name: 'bank_account_name',
            },
            {
                data: 'image',
                name: 'image',
                orderable: false,
                searchable: false,
                render: function(data, type, full, meta) {
                    return `<div class="avatar">
                            <img src="${data}" alt="Image">
                        </div>`;
                }
            },
            {
                data: 'extra_field',
                name: 'extra_field',
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ],
    });
</script>
@endpush