@extends('layouts.app')

@section('title', trans('Paylater'))

@section('content')


<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Paylater</div>
    <div class="right"></div>
</div>
<!-- * App Header -->

<br>
<br>
<br>
<div class="card-body">
    <div class="col-md-12">

        <a class="btn btn-sm btn-primary" href="{{route('user.paylater.create')}}" role="button">Pengajuan Baru</a>
        <br>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th class="text-center">Provider</th>
                    <th class="text-center">Produk</th>
                    <th class="text-center">Nominal</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($paylaterAll as $paylater)
                @if($anggotaID == Auth::user()->id)
                <tr>
                    <td class="text-center">{{ $paylater->paylater_provider->name}}</td>
                    <td class="text-center">{{ $paylater->product}}</td>
                    <td class="text-center">@rupiah ($paylater->amount)</td>
                    @if ($paylater->status == NULL)
                    <td class="text-center">Diproses</td>
                    @else
                    <td class="text-center">
                        <a class="btn btn-sm btn-info" href="{{route('user.paylater.show', $paylater->id)}}" role="button">Detail</a>
                    </td>
                    @endif

                </tr>
                @endif
                @empty
                <td colspan="4" class="text-center">Belum ada data paylater</td>
                @endforelse
            </tbody>
        </table>
    </div>
    @endsection