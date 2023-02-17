@extends('layouts.app')

@section('title', __('Detail of Kop Product Types'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Kop Product Types') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of kop product type.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('kop-product-types.index') }}">{{ __('Kop Product Types') }}</a>
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
                                            <td>{{ $kopProductType->name }}</td>
                                        </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Cover') }}</td>
                                        <td>
                                            @if ($kopProductType->cover == null)
                                            <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Cover"  class="rounded" width="200" height="150" style="object-fit: cover">
                                            @else
                                                <img src="{{ asset('storage/uploads/covers/' . $kopProductType->cover) }}" alt="Cover" class="rounded" width="200" height="150" style="object-fit: cover">
                                            @endif
                                        </td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Status') }}</td>
                                        <td>{{ $kopProductType->status == 1 ? 'True' : 'False' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $kopProductType->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $kopProductType->updated_at->format('d/m/Y H:i') }}</td>
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
