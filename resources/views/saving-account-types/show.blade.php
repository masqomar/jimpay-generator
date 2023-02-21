@extends('layouts.app')

@section('title', __('Detail of Saving Account Types'))

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3>{{ __('Saving Account Types') }}</h3>
                <p class="text-subtitle text-muted">
                    {{ __('Detail of saving account type.') }}
                </p>
            </div>

            <x-breadcrumb>
                <li class="breadcrumb-item">
                    <a href="/">{{ __('Dashboard') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('saving-account-types.index') }}">{{ __('Saving Account Types') }}</a>
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
                                    <td class="fw-bold">{{ __('Code') }}</td>
                                    <td>{{ $savingAccountType->code }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Name') }}</td>
                                    <td>{{ $savingAccountType->name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Description') }}</td>
                                    <td>{{ $savingAccountType->description }}</td>
                                </tr>
                                <tr>
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