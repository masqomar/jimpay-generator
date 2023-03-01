@extends('layouts.app')

@section('title', trans('Detail Paylater'))

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
    <div class="pageTitle">Detail Paylater</div>
    <div class="right"></div>
</div>
<!-- * App Header -->

<br>
<br>
<br>
<div class="section mt-1 mb-5">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Nominal</th>
                        <th class="text-center">Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paylaterDetails as $paylaterDetail)
                    <tr>
                        <td class="text-center">{{ $paylaterDetail->date->format('d-m-Y') }}</td>
                        <td class="text-center">@rupiah ($paylaterDetail->amount )</td>
                        <td class="text-center">{{ $paylaterDetail->note }}</td>

                    </tr>

                    @endforeach
                    <tr>
                        <th class="text-center">Nominal Pembiayaan</th>
                        <td colspan="2" class="text-center"><strong>@rupiah ($nominalPaylater)</strong></td>
                    </tr>
                    <tr>
                        <th class="text-center">Total Pembayaran Angsuran</th>
                        <td colspan="2" class="text-center"><strong>@rupiah ($totalAngsuran)</strong></td>
                    </tr>
                    <tr>
                        <th class="text-center">Kekurangan</th>
                        <td colspan="2" class="text-center"><strong>- @rupiah ($kurangBayar)</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endsection