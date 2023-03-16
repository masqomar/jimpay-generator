@extends('layouts.app')

@section('title', trans('Pencairan Saldo Mitra'))

@section('content')
@if (auth()->user()->type == 'store')


<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Pencairan Saldo Mitra</div>
    <div class="right"></div>
</div>
<!-- * App Header -->

<br>
<br>
<br>
<div class="text-center">
    <h6>
        Total Saldo Mitra <label class="text-primary">@rupiah($wallets)</label>
    </h6>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('user.mitra.store') }}" method="POST">
                    @csrf

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="number" class="form-control" name="amount" max="{{$wallets}}" placeholder="Masukan Nominal Penarikan Dana" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                        @if($errors->has('amount'))
                        <span class="error">{{ $errors->first('amount') }}</span>
                        @endif
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <select name="bank_id" class="form-control">
                                <option value="">--Pilih Bank--</option>
                                @foreach ($banks as $bank)
                                <option value="{{$bank->id}}">{{$bank->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <sup> *Silahkan pilih bank jika pencairan melalui transfer</sup>
                        @if($errors->has('bank_id'))
                        <span class="error">{{ $errors->first('bank_id') }}</span>
                        @endif
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="number" class="form-control" name="bank_account_number" placeholder="Tuliskan no rekening">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                        <sup>*Silahkan isi no rekening jika pencairan melalui transfer</sup>
                        @if($errors->has('bank_account_number'))
                        <span class="error">{{ $errors->first('bank_account_number') }}</span>
                        @endif
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="text" class="form-control" name="bank_account_name" placeholder="Tuliskan atas nama rekening">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                        <sup>*Silahkan isi nama rekening jika pencairan melalui transfer</sup>
                        @if($errors->has('bank_account_name'))
                        <span class="error">{{ $errors->first('bank_account_name') }}</span>
                        @endif
                    </div>
            </div>
            <br />
            <div class="text-center">
                <button class="btn btn-sm btn-primary" type="submit">Tarik Sekarang
                </button>
                <a class="btn btn-sm btn-warning" href="{{url('/')}}" role="button">Batal</a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection