@extends('layouts.app')

@section('title', __('Detail of Withdraw Requests'))

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3>{{ __('Withdraw Requests') }}</h3>
                <p class="text-subtitle text-muted">
                    {{ __('Detail of withdraw request.') }}
                </p>
            </div>

            <x-breadcrumb>
                <li class="breadcrumb-item">
                    <a href="/">{{ __('Dashboard') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('withdraw-requests.index') }}">{{ __('Withdraw Requests') }}</a>
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
                                    <td class="fw-bold">{{ __('Nominal') }}</td>
                                    <td>{{ $withdrawRequest->amount }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Mitra') }}</td>
                                    <td>{{ $withdrawRequest->user ? $withdrawRequest->user->first_name : '' }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Bank') }}</td>
                                    <td>{{ $withdrawRequest->bank_id }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('No Rekening') }}</td>
                                    <td>{{ $withdrawRequest->bank_account_number }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Atas Nama Rekening') }}</td>
                                    <td>{{ $withdrawRequest->bank_account_name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Bukti Pencairan') }}</td>
                                    <td>
                                        @if ($withdrawRequest->image == null)
                                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Image" class="rounded" width="200" height="150" style="object-fit: cover">
                                        @else
                                        <img src="{{ asset('storage/uploads/images/' . $withdrawRequest->image) }}" alt="Image" class="rounded" width="200" height="150" style="object-fit: cover">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Status') }}</td>
                                    <td>{{ $withdrawRequest->extra_field }}</td>
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