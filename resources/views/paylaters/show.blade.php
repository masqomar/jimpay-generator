@extends('layouts.app')

@section('title', __('Detail of Paylaters'))

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3>{{ __('Paylaters') }}</h3>
                <p class="text-subtitle text-muted">
                    {{ __('Detail of paylater.') }}
                </p>
            </div>

            <x-breadcrumb>
                <li class="breadcrumb-item">
                    <a href="/">{{ __('Dashboard') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('paylaters.index') }}">{{ __('Paylaters') }}</a>
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
                                <tr>
                                    <td class="fw-bold">{{ __('Anggota') }}</td>
                                    <td>{{ $paylater->user ? $paylater->user->first_name : '' }} || {{ $paylater->user ? $paylater->user->member_id : '' }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Mitra') }}</td>
                                    <td>{{ $paylater->paylater_provider ? $paylater->paylater_provider->name : '' }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Bank') }}</td>
                                    <td>{{ $paylater->bank ? $paylater->bank->code : '' }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Rekekning') }}</td>
                                    <td>{{ $paylater->bank_account_number }} || {{ $paylater->bank_account_name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Nominal') }}</td>
                                    <td>@rupiah ($paylater->amount)</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Catatan') }}</td>
                                    <td>{{ $paylater->note }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Barang') }}</td>
                                    <td>{{ $paylater->product }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Spesifikasi Barang') }}</td>
                                    <td>{{ $paylater->product_specification }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('SnK') }}</td>
                                    <td>{{ $paylater->extra_field }}</td>
                                </tr>
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

                                <tr>
                                    <td class="fw-bold">{{ __('Mulai Angsuran') }}</td>
                                    <td>{{ isset($paylater->start_date) ? $paylater->start_date->format('d/m/Y') : ''  }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Selesai Angsuran') }}</td>
                                    <td>{{ isset($paylater->finish_date) ? $paylater->finish_date->format('d/m/Y') : ''  }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Durasi') }}</td>
                                    <td>{{ $paylater->duration }} Bulan</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Status') }}</td>
                                    <td>{{ $paylater->status == 1 ? 'Disetujui' : 'Diproses' }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Bukti Transaksi') }}</td>
                                    <td>
                                        @if ($paylater->image == null)
                                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Image" class="rounded" width="200" height="150" style="object-fit: cover">
                                        @else
                                        <img src="{{ asset('storage/uploads/images/' . $paylater->image) }}" alt="Image" class="rounded" width="200" height="150" style="object-fit: cover">
                                        @endif
                                    </td>
                                </tr>


                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Tabel Angsuran</h4>
                        @can('paylater create')
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('paylaters.bayar', $paylater->id) }}" class="btn btn-primary mb-3">
                                <i class="fas fa-plus"></i>
                                {{ __('Bayar Angsuran') }}
                            </a>
                        </div>
                        @endcan
                        <div style="overflow-x:auto;">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Tanggal Setor</th>
                                        <th class="text-center">Nominal</th>
                                        <th class="text-center">Catatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($paylaterTransactions as $paylaterTransaction)
                                    <tr>
                                        <td class="text-center">{{ $paylaterTransaction->date->format('d-m-Y') }}</td>
                                        <td class="text-center">@rupiah ($paylaterTransaction->amount)</td>
                                        <td class="text-center">{{ $paylaterTransaction->note }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Belum ada data angsuran</td>
                                    </tr>
                                    @endforelse
                                    <tr>
                                        <th class="text-center">Total Pembayaran Angsuran</th>
                                        <td colspan="2" class="text-center"><strong>@rupiah($totalAngsuran)</strong></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Kekurangan</th>
                                        <td colspan="2" class="text-center"><strong>- @rupiah($kurangBayar)</strong></td>
                                    </tr>
                                </tbody>
                            </table>

                            <br>
                        </div>
                    </div>
                </div>

                <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Back') }}</a>
            </div>
        </div>
</div>
</div>
</section>
</div>
@endsection