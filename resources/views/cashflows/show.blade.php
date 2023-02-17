@extends('layouts.app')

@section('title', __('Detail of Cashflows'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Cashflows') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of cashflow.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('cashflows.index') }}">{{ __('Cashflows') }}</a>
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
                                        <td class="fw-bold">{{ __('Saving Account') }}</td>
                                        <td>{{ $cashflow->saving_account ? $cashflow->saving_account->saving_account_type_id : '' }}</td>
                                    </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Amount') }}</td>
                                            <td>{{ $cashflow->amount }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Type') }}</td>
                                            <td>{{ $cashflow->type }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Description') }}</td>
                                            <td>{{ $cashflow->description }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Date') }}</td>
                                            <td>{{ isset($cashflow->date) ? $cashflow->date->format('d/m/Y') : ''  }}</td>
                                        </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Cashflow Image') }}</td>
                                        <td>
                                            @if ($cashflow->cashflow_image == null)
                                            <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Cashflow Image"  class="rounded" width="200" height="150" style="object-fit: cover">
                                            @else
                                                <img src="{{ asset('storage/uploads/cashflow_images/' . $cashflow->cashflow_image) }}" alt="Cashflow Image" class="rounded" width="200" height="150" style="object-fit: cover">
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $cashflow->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $cashflow->updated_at->format('d/m/Y H:i') }}</td>
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
