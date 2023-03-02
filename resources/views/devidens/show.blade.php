@extends('layouts.app')

@section('title', __('Detail of Devidens'))

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3>{{ __('Devidens') }}</h3>
                <p class="text-subtitle text-muted">
                    {{ __('Detail of deviden.') }}
                </p>
            </div>

            <x-breadcrumb>
                <li class="breadcrumb-item">
                    <a href="/">{{ __('Dashboard') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('devidens.index') }}">{{ __('Devidens') }}</a>
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
                                    <td class="fw-bold">{{ __('Operational Reserve') }}</td>
                                    <td>{{ $deviden->operational_reserve }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Capital') }}</td>
                                    <td>{{ $deviden->capital }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('User Capital') }}</td>
                                    <td>{{ $deviden->user_capital }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('User Activity') }}</td>
                                    <td>{{ $deviden->user_activity }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Management') }}</td>
                                    <td>{{ $deviden->management }}</td>
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