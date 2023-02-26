@extends('layouts.app')

@section('title', trans('Detail Simpanan Sukarela'))

@section('content')
<!-- loader -->
<div id="loader">
    <div class="spinner-border text-primary" role="status"></div>
</div>
<!-- * loader -->

<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Detail Simpanan Sukarela</div>
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
                <th class="text-center">Tanggal Setor</th>
                <th class="text-center">Periode</th>
                <th class="text-center">Nominal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($simpananSukarela as $sukarela)
            @if($anggotaID == Auth::user()->id)
            <tr>
                <td class="text-center">{{ $sukarela->deposit_date->format('Y-m-d')}}</td>
                <td class="text-center">{{ $sukarela->month}} {{ $sukarela->year}}</td>
                <td class="text-center">@rupiah ($sukarela->amount)</td>
            </tr>
            @endif
            @endforeach


        </tbody>
    </table>

    <br>
    Saldo Simpanan Sukarela : {{ $saldoSukarela }} <br /><br />
    Halaman : {{ $simpananSukarela->currentPage() }} <br />
    Jumlah Data : {{ $simpananSukarela->total() }} <br />
    Data Per Halaman : {{ $simpananSukarela->perPage() }} <br />


    {{ $simpananSukarela->links() }}
</div>
@endsection