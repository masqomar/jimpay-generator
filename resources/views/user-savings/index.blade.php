@extends('layouts.app')

@section('title', __('User Savings'))

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3>{{ __('User Savings') }}</h3>
                <p class="text-subtitle text-muted">
                    {{ __('Below is a list of all user savings.') }}
                </p>
            </div>
            <x-breadcrumb>
                <li class="breadcrumb-item"><a href="/">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('User Savings') }}</li>
            </x-breadcrumb>
        </div>
    </div>

    <section class="section">
        <x-alert></x-alert>

        @can('user saving create')
        <div class="d-flex justify-content-end">
            <a href="{{ route('user-savings.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i>
                {{ __('Create a new user saving') }}
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
                                        <th>{{ __('User') }}</th>
                                        <th>{{ __('Kop Product') }}</th>
                                        <th>{{ __('Period') }}</th>
                                        <th>{{ __('Amount') }}</th>
                                        <th>{{ __('Month') }}</th>
                                        <th>{{ __('Year') }}</th>
                                        <th>{{ __('Deposit Date') }}</th>
                                        <th>{{ __('Description') }}</th>
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
        ajax: "{{ route('user-savings.index') }}",
        columns: [{
                data: 'id',
                name: 'id',
            },
            {
                data: 'user',
                name: 'user.first_name'
            },
            {
                data: 'kop_product',
                name: 'kop_product.name'
            },
            {
                data: 'period',
                name: 'period.name'
            },
            {
                data: 'amount',
                name: 'amount',
            },
            {
                data: 'month',
                name: 'month',
            },
            {
                data: 'year',
                name: 'year',
            },
            {
                data: 'deposit_date',
                name: 'deposit_date',
            },
            {
                data: 'description',
                name: 'description',
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