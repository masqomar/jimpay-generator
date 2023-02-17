@extends('layouts.app')

@section('title', __('Detail of User Savings'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('User Savings') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of user saving.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('user-savings.index') }}">{{ __('User Savings') }}</a>
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
                                        <td>{{ $userSaving->user ? $userSaving->user->first_name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Kop Product') }}</td>
                                        <td>{{ $userSaving->kop_product ? $userSaving->kop_product->id : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Period') }}</td>
                                        <td>{{ $userSaving->period ? $userSaving->period->name : '' }}</td>
                                    </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Amount') }}</td>
                                            <td>{{ $userSaving->amount }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Month') }}</td>
                                            <td>{{ isset($userSaving->month) ? $userSaving->month->format('m/Y') : ''  }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Year') }}</td>
                                            <td>{{ $userSaving->year }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Deposit Date') }}</td>
                                            <td>{{ isset($userSaving->deposit_date) ? $userSaving->deposit_date->format('d/m/Y') : ''  }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Description') }}</td>
                                            <td>{{ $userSaving->description }}</td>
                                        </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $userSaving->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $userSaving->updated_at->format('d/m/Y H:i') }}</td>
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
