@extends('layouts.app')

@section('title', trans('Pencairan Simpanan Sukarela'))

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
    <div class="pageTitle">Pencairan Simpanan Sukarela</div>
    <div class="right"></div>
</div>
<!-- * App Header -->

<br>
<br>
<br>
<div class="text-center">
    <h6>
        Total Simpanan Sukarela <label class="text-primary">@rupiah($saldoSukarela)</label>
    </h6>
</div>
<div class="section mt-1 mb-5">

    <form action="{{ route('user.sim-sukarela.tarikStore') }}" method="POST">
        @csrf
        <div class="form-group boxed">
            <div class="input-wrapper">
                <input type="number" class="form-control" name="nominal_tarik" max="{{$saldoSukarela}}" placeholder="Masukan Nominal Penarikan Dana" required>
                <i class="clear-input">
                    <ion-icon name="close-circle"></ion-icon>
                </i>
            </div>
            @if($errors->has('nominal_tarik'))
            <span class="error">{{ $errors->first('nominal_tarik') }}</span>
            @endif
        </div>

        <div class="form-group boxed">
            <div class="input-wrapper">
                <textarea rows="3" class="form-control" name="keterangan" placeholder="Isi keterangan keperluan kamyu" required></textarea>
                <i class="clear-input">
                    <ion-icon name="close-circle"></ion-icon>
                </i>
            </div>
            @if($errors->has('keterangan'))
            <span class="error">{{ $errors->first('keterangan') }}</span>
            @endif
        </div>
</div>
<br />
<div class="text-center">
    <button class="btn btn-sm btn-primary" type="submit">Tarik Sekarang
    </button>
    <a class="btn btn-sm btn-warning" href="{{url('/')}}" role="button">Batal</a>
</div>

@endsection