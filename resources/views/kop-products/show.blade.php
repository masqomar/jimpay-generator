@extends('layouts.app')

@section('title', __('Detail of Kop Products'))

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3>{{ __('Kop Products') }}</h3>
                <p class="text-subtitle text-muted">
                    {{ __('Detail of kop product.') }}
                </p>
            </div>

            <x-breadcrumb>
                <li class="breadcrumb-item">
                    <a href="/">{{ __('Dashboard') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('kop-products.index') }}">{{ __('Kop Products') }}</a>
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
                                    <td>{{ $kopProduct->name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Cover') }}</td>
                                    <td>
                                        @if ($kopProduct->cover == null)
                                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Cover" class="rounded" width="200" height="150" style="object-fit: cover">
                                        @else
                                        <img src="{{ asset('storage/uploads/covers/' . $kopProduct->cover) }}" alt="Cover" class="rounded" width="200" height="150" style="object-fit: cover">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Kop Product Type') }}</td>
                                    <td>{{ $kopProduct->kop_product_type ? $kopProduct->kop_product_type->name : '' }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Status') }}</td>
                                    <td>{{ $kopProduct->status == 1 ? 'True' : 'False' }}</td>
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