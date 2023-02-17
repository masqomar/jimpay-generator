@extends('layouts.app')

@section('title', __('Detail of User Saving Transactions'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('User Saving Transactions') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of user saving transaction.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('user-saving-transactions.index') }}">{{ __('User Saving Transactions') }}</a>
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
                                        <td class="fw-bold">{{ __('User') }}</td>
                                        <td>{{ $userSavingTransaction->user ? $userSavingTransaction->user->first_name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Kop Product') }}</td>
                                        <td>{{ $userSavingTransaction->kop_product ? $userSavingTransaction->kop_product->name : '' }}</td>
                                    </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Amount') }}</td>
                                            <td>{{ $userSavingTransaction->amount }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Transaction Date') }}</td>
                                            <td>{{ isset($userSavingTransaction->transaction_date) ? $userSavingTransaction->transaction_date->format('d/m/Y') : ''  }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Description') }}</td>
                                            <td>{{ $userSavingTransaction->description }}</td>
                                        </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Saving Transaction Image') }}</td>
                                        <td>
                                            @if ($userSavingTransaction->saving_transaction_image == null)
                                            <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Saving Transaction Image"  class="rounded" width="200" height="150" style="object-fit: cover">
                                            @else
                                                <img src="{{ asset('storage/uploads/saving_transaction_images/' . $userSavingTransaction->saving_transaction_image) }}" alt="Saving Transaction Image" class="rounded" width="200" height="150" style="object-fit: cover">
                                            @endif
                                        </td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Status') }}</td>
                                        <td>{{ $userSavingTransaction->status == 1 ? 'True' : 'False' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $userSavingTransaction->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $userSavingTransaction->updated_at->format('d/m/Y H:i') }}</td>
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
