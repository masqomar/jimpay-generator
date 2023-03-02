@extends('layouts.app')

@section('title', trans('Pengajuan Pembiayaan'))

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
    <div class="pageTitle">Pengajuan Pembiayaan</div>
    <div class="right"></div>
</div>
<!-- * App Header -->
<br>
<br>
<br>

<div class="section mt-1 mb-5">

    <form action="{{ route('user.pembiayaan.store') }}" method="POST">
        @csrf

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
                <input type="number" class="form-control" name="amount" placeholder="Tuliskan kisaran harga " required>
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
                <h4 class="modal-title">Pembiayaan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>


            <div class="modal-body">
                Silahkan hubungi admin untuk info syarat dan ketentuan pembiayaan
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