@extends('layouts.app')

@section('title', __('Detail of Periods'))

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3>{{ __('Periods') }}</h3>
                <p class="text-subtitle text-muted">
                    {{ __('Detail of period.') }}
                </p>
            </div>

            <x-breadcrumb>
                <li class="breadcrumb-item">
                    <a href="/">{{ __('Dashboard') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('periods.index') }}">{{ __('Periods') }}</a>
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
                                    <td class="fw-bold">{{ __('Name') }}</td>
                                    <td>{{ $period->name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Open Date') }}</td>
                                    <td>{{ isset($period->open_date) ? $period->open_date->format('d/m/Y') : ''  }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Close Date') }}</td>
                                    <td>{{ isset($period->close_date) ? $period->close_date->format('d/m/Y') : ''  }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Status') }}</td>
                                    <td>{{ $period->status == 1 ? 'True' : 'False' }}</td>
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