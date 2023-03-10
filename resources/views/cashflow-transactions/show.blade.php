@extends('layouts.app')

@section('title', __('Detail of Cashflow Transactions'))

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3>{{ __('Cashflow Transactions') }}</h3>
                <p class="text-subtitle text-muted">
                    {{ __('Detail of cashflow transaction.') }}
                </p>
            </div>

            <x-breadcrumb>
                <li class="breadcrumb-item">
                    <a href="/">{{ __('Dashboard') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('cashflow-transactions.index') }}">{{ __('Cashflow Transactions') }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ __('Detail') }}
                </li>
            </x-breadcrumb>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <tr>
                                    <td class="fw-bold">{{ __('Cashflow') }}</td>
                                    <td>{{ $cashflowTransaction->cashflow ? $cashflowTransaction->cashflow->saving_account_id : '' }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Bank') }}</td>
                                    <td>{{ $cashflowTransaction->bank ? $cashflowTransaction->bank->code : '' }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Description') }}</td>
                                    <td>{{ $cashflowTransaction->description }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Extra Field') }}</td>
                                    <td>{{ $cashflowTransaction->extra_field }}</td>
                                </tr>
                            </table>
                        </div>

                        <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection