@extends('layouts.app')

@section('title', __('Akun PPOB'))

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3>{{ __('Akun Pulsa') }}</h3>
                <p class="text-subtitle text-muted">
                    {{ __('Detail of Akun Pulsa.') }}
                </p>
            </div>

            <x-breadcrumb>
                <li class="breadcrumb-item">
                    <a href="/">{{ __('Dashboard') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('pulsa.akun') }}">{{ __('Akun Pulsa') }}</a>
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
                                    <td class="fw-bold">{{ __('ID Akun') }}</td>
                                    <td>{{$data1['id']}}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Nama Akun') }}</td>
                                    <td>{{$data1['name']}}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Nama Instansi') }}</td>
                                    <td>{{$data1['company_name']}}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Saldo') }}</td>
                                    <td>@rupiah ($data1['balance'])</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('No Telepon') }}</td>
                                    <td>{{$data1['phone']}}</td>
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