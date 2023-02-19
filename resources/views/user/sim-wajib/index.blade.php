@extends('layouts.app')

@section('title', trans('Simpanan Wajib'))

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
    <div class="pageTitle">Simpanan Wajib</div>
    <div class="right"></div>
</div>
<!-- * App Header -->

<br>
<br>
<br>
@if($anggotaID == Auth::user()->id)

<h3 class="text-center"><strong>Total Simpanan Wajib @rupiah($totalSimpananWajib)</strong></h3>
@endif

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
            @foreach ($simpananWajib as $wajib)
            @if($anggotaID == Auth::user()->id)
            <tr>
                <td>{{ $wajib->deposit_date}}</td>
                <td>{{ $wajib->month}} {{ $wajib->year}}</td>
                <td>@rupiah ($wajib->amount)</td>
            </tr>
            @endif
            @endforeach


        </tbody>
    </table>

    <br>
    Halaman : {{ $simpananWajib->currentPage() }} <br />
    Jumlah Data : {{ $simpananWajib->total() }} <br />
    Data Per Halaman : {{ $simpananWajib->perPage() }} <br />


    {{ $simpananWajib->links() }}
</div>
@endsection