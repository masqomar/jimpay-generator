@extends('layouts.app')

@section('title', trans('Pembayaran Sukses'))

@section('content')


<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Pembayaran Sukses</div>
    <div class="right"></div>
</div>
<!-- * App Header -->
<br>
<br>
<br>
<div class="order-done-content">
    <br>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
        <br>
        <h6>
            <a class="btn btn-sm btn-warning text-center" href="{{url('/')}}" role="button">Kembali</a>
        </h6>
    </div>
    @endif
</div>

@endsection