@extends('layouts.app')

@section('title', __('Create Paylater Providers'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Paylater Providers') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Create a new paylater provider.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('paylater-providers.index') }}">{{ __('Paylater Providers') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Create') }}
                    </li>
                </x-breadcrumb>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('paylater-providers.store') }}" method="POST">
                                @csrf
                                @method('POST')

                                @include('paylater-providers.include.form')

                                <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Back') }}</a>

                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
