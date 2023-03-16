@extends('layouts.app')

@section('title', trans('Pengajuan Paylater'))

@section('content')


<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Pengajuan Paylater</div>
    <div class="right"></div>
</div>
<!-- * App Header -->
<br>
<br>
<br>

<div class="section mt-1 mb-5">

    <form action="{{ route('user.paylater.store') }}" method="POST">
        @csrf
        <div class="form-group boxed">
            <div class="input-wrapper">
                <select name="paylater_provider_id" class="form-control">
                    <option value="">--Pilih Mitra--</option>
                    @foreach ($paylaterProviders as $paylaterProvider)
                    <option value="{{$paylaterProvider->id}}">{{$paylaterProvider->name}}</option>
                    @endforeach
                </select>
            </div>
            @if($errors->has('paylater_provider_id'))
            <span class="error">{{ $errors->first('paylater_provider_id') }}</span>
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
            @if($errors->has('bank_id'))
            <span class="error">{{ $errors->first('bank_id') }}</span>
            @endif
        </div>

        <div class="form-group boxed">
            <div class="input-wrapper">
                <input type="number" class="form-control" name="bank_account_number" placeholder="Tuliskan no rekening provider" required>
                <i class="clear-input">
                    <ion-icon name="close-circle"></ion-icon>
                </i>
            </div>
            @if($errors->has('bank_account_number'))
            <span class="error">{{ $errors->first('bank_account_number') }}</span>
            @endif
        </div>

        <div class="form-group boxed">
            <div class="input-wrapper">
                <input type="text" class="form-control" name="bank_account_name" placeholder="Tuliskan atas nama rekening" required>
                <i class="clear-input">
                    <ion-icon name="close-circle"></ion-icon>
                </i>
            </div>
            @if($errors->has('bank_account_name'))
            <span class="error">{{ $errors->first('bank_account_name') }}</span>
            @endif
        </div>

        <div class="form-group boxed">
            <div class="input-wrapper">
                <input type="text" class="form-control" name="product" placeholder="Tuliskan nama barang" required>
                <i class="clear-input">
                    <ion-icon name="close-circle"></ion-icon>
                </i>
            </div>
            @if($errors->has('product'))
            <span class="error">{{ $errors->first('product') }}</span>
            @endif
        </div>

        <div class="form-group boxed">
            <div class="input-wrapper">
                <textarea rows="3" class="form-control" name="product_specification" placeholder="Tuliskan spesifikasi barang yang kamu mau"></textarea>
                <i class="clear-input">
                    <ion-icon name="close-circle"></ion-icon>
                </i>
            </div>
            @if($errors->has('product_specification'))
            <span class="error">{{ $errors->first('product_specification') }}</span>
            @endif
        </div>

        <div class="form-group boxed">
            <div class="input-wrapper">
                <input type="number" class="form-control" name="amount" placeholder="Tuliskan nominal harga beserta kode unik (jika ada)" required>
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
                <input type="number" class="form-control" name="duration" placeholder="Tuliskan jangka waktu angsuran MAX=>6" required>
                <i class="clear-input">
                    <ion-icon name="close-circle"></ion-icon>
                </i>
            </div>
            @if($errors->has('duration'))
            <span class="error">{{ $errors->first('duration') }}</span>
            @endif
        </div>

        <div class="form-group boxed">
            <div class="input-wrapper">
                <textarea rows="3" class="form-control" name="note" placeholder="Tuliskan catatan sesuai kebutuhan kamu" required></textarea>
                <i class="clear-input">
                    <ion-icon name="close-circle"></ion-icon>
                </i>
            </div>
            @if($errors->has('note'))
            <span class="error">{{ $errors->first('note') }}</span>
            @endif
        </div>

        <div class="form-links mt-2">
            <div>
                <input type="checkbox" name="extra_field"> I agree to the <a data-toggle="modal" data-target="#myModal" href="#exampleModal">terms of service</a>
            </div>
        </div>
</div>
<div class="text-center">
    <button class="btn btn-sm btn-primary" type="submit">Ajukan Sekarang!
    </button>
    <a class="btn btn-sm btn-warning" href="{{url('/')}}" role="button">Batal</a>
</div>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            @forelse ($terms as $term)

            <div class="modal-header">
                <h4 class="modal-title">{{$term->title}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>


            <div class="modal-body">
                {!! $term->description !!}
            </div>

            @empty
            <div class="modal-header">
                <h4 class="modal-title">Paylater</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>


            <div class="modal-body">
                Silahkan hubungi admin untuk info syarat dan ketentuan paylater
            </div>

            @endforelse
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<br />
<br />
<br />
@endsection