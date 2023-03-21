@extends('layouts.app')

@section('title', __('Detail User'))

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3>{{ __('User') }}</h3>
                <p class="text-subtitle text-muted">
                    {{ __('Detail user information.') }}
                </p>
            </div>

            <x-breadcrumb>
                <li class="breadcrumb-item">
                    <a href="/">{{ __('Dashboard') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('users.index') }}">{{ __('User') }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ __('Detail') }}
                </li>
            </x-breadcrumb>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                @foreach ($store as $mitra)
                                <tr>
                                    <td colspan="2" class="text-center">
                                        <div class="avatar avatar-xl">
                                            @if ($mitra->avatar == null)
                                            <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($mitra->email))) }}&s=500" alt="Avatar">
                                            @else
                                            <img src="{{ asset("uploads/images/avatars/$mitra->avatar") }}" alt="Avatar">
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('First Name') }}</td>
                                    <td>{{ $mitra->first_name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Last Name') }}</td>
                                    <td>{{ $mitra->last_name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Member Id') }}</td>
                                    <td>{{ $mitra->member_id }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Email') }}</td>
                                    <td>{{ $mitra->email }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Status') }}</td>
                                    <td>{{ $mitra->status }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                @foreach ($store as $mitra)
                                <tr>
                                    <td colspan="2" class="text-center">
                                        <div class="avatar avatar-xl">
                                            @if ($mitra->avatar == null)
                                            <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($mitra->email))) }}&s=500" alt="Avatar">
                                            @else
                                            <img src="{{ asset("uploads/images/avatars/$mitra->avatar") }}" alt="Avatar">
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('First Name') }}</td>
                                    <td>{{ $mitra->first_name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Last Name') }}</td>
                                    <td>{{ $mitra->last_name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Member Id') }}</td>
                                    <td>{{ $mitra->member_id }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Email') }}</td>
                                    <td>{{ $mitra->email }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Status') }}</td>
                                    <td>{{ $mitra->status }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive p-1">
                            <table class="table table-striped" id="data-table" width="100%">
                                <thead>
                                    <tr>
                                        <th>{{ __('No') }}</th>
                                        <th>{{ __('Tanggal') }}</th>
                                        <th>{{ __('Nominal') }}</th>
                                        <th>{{ __('Keterangan') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($histories as $riwayat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $riwayat->created_at->format('d-m-Y')}}</td>
                                        <td>@rupiah ($riwayat->amount)</td>
                                        <td>{{ $riwayat->meta['description'] ?? 'Tidak Ada Keterangan' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            Halaman : {{ $histories->currentPage() }} <br />
                            Jumlah Data : {{ $histories->total() }} <br />
                            Data Per Halaman : {{ $histories->perPage() }} <br />


                            {{ $histories->links() }}
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection