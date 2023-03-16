@extends('layouts.app')

@section('title', trans('Riwayat Transaksi'))

@section('content')


<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Riwayat Transaksi</div>
    <div class="right"></div>
</div>
<!-- * App Header -->
<br>
<br>
<br>
<div style="overflow-x:auto;">
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center" width=30%>Tanggal</th>
                <th class="text-center" width=30%>Nominal</th>
                <th class="text-center" width=40%>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riwayatTransaksiAll as $riwayatTransaksi)
            <tr>
                <td>{{ $riwayatTransaksi->created_at->format('d-m-Y')}}</td>
                <td>@rupiah ($riwayatTransaksi->amount)</td>
                <td>{{ $riwayatTransaksi->meta['description'] ?? 'Tidak Ada Keterangan' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    Halaman : {{ $riwayatTransaksiAll->currentPage() }} <br />
    Jumlah Data : {{ $riwayatTransaksiAll->total() }} <br />
    Data Per Halaman : {{ $riwayatTransaksiAll->perPage() }} <br />


    {{ $riwayatTransaksiAll->links() }}
</div>
@endsection