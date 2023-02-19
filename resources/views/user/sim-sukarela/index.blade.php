@extends('layouts.app')

@section('title', trans('Simpanan Sukarela'))

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
    <div class="pageTitle">Simpanan Sukarela</div>
    <div class="right"></div>
</div>
<!-- * App Header -->

<br>
<br>
<br>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table mb-0">
    <tbody>
        @if($anggotaID == Auth::user()->id)
        <tr>
            <th scope="col">Total Simpanan Sukarela</th>
            <td>
                <h4 class="text-warning"> @rupiah($totalSimpananSukarela)</h4>
            </td>
        </tr>
        <tr>
            <th scope="col">Total TopUp JIMPay</th>
            <td>
                <h4 class="text-danger"> @rupiah($totalTopUpSukarela)</h4>
            </td>
        </tr>
        <tr>
            <th scope="col">Total Penarikan Simpanan</th>
            <td>
                <h4 class="text-danger"> @rupiah($totalTopUpSukarela)</h4>
                <a href="#" class="btn btn-sm btn-primary w-100 d-flex align-items-center justify-content-center">Detail</a>
            </td>
        </tr>
        <tr>
            <th scope="col">Saldo Simpanan Sukarela</th>
            <td>
                <h4 class="text-primary"> @rupiah($saldoSukarela)</h4>
            </td>
        </tr>
        @endif
    </tbody>
</table>
<div class="text-center">
    <a class="btn btn-info" href="{{ route('user.sim-sukarela.show', $anggotaID) }}" role="button">Detail</a>
    <a class="btn btn-warning" href="" role="button">Cairkan</a>
</div>
@endsection