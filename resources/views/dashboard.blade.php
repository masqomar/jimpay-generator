@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
@if (auth()->user()->type == 'admin')
<div class="page-heading">
    <h3>Dashboard</h3>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-md-12">
            @if (session('status'))
            <div class="alert alert-success alert-dismissible show fade">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <h4>Hi 👋, {{ auth()->user()->first_name }}</h4>
                    <p>{{ __('You are logged in!') }}</p>
                </div>
            </div>
        </div>
    </section>
</div>
@else

<body style="background-color:#e9ecef;">

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Capsule -->
    <div id="jimApp">
        <div class="section" id="user-section">
            <div id="user-detail">
                <a href="{{ route('user.profil.index') }}">
                    <div class="avatar">
                        <img src="{{ asset ('assets') }}//img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged w64 rounded">
                    </div>
                </a>
                <div id="user-info">

                    <h2 id="user-name">{{ Auth::user()->first_name }} || {{ Auth::user()->member_id }}</h2>
                    <span id="user-role">@rupiah ($saldo)</span>
                </div>
            </div>
        </div>

        <div class="section" id="menu-section">
            <div class="card">
                <div class="card-body text-center">
                    <div class="list-menu">
                        <div class="item-menu text-center">
                            <div class="menu-icon">
                                <a href="{{ route('user.bayar.index') }}" class="green" style="font-size: 40px;">
                                    <ion-icon name="scan-outline"></ion-icon>
                                </a>
                            </div>
                            <div class="menu-name">
                                <span class="text-center">Scan</span>
                            </div>
                        </div>
                        <div class="item-menu text-center">
                            <div class="menu-icon">
                                <a href="{{ route('user.topup.index') }}" class="danger" style="font-size: 40px;">
                                    <ion-icon name="duplicate-outline"></ion-icon>
                                </a>
                            </div>
                            <div class="menu-name">
                                <span class="text-center">Topup</span>
                            </div>
                        </div>
                        <div class="item-menu text-center">
                            <div class="menu-icon">
                                <a href="{{ route('user.transfer.index') }}" class="warning" style="font-size: 40px;">
                                    <ion-icon name="bluetooth-outline"></ion-icon>
                                </a>
                            </div>
                            <div class="menu-name">
                                <span class="text-center">Transfer</span>
                            </div>
                        </div>
                        <div class="item-menu text-center">
                            <div class="menu-icon">
                                <a href="{{ route('user.riwayat-transaksi.index') }}" class="orange" style="font-size: 40px;">
                                    <ion-icon name="document-attach-outline"></ion-icon>
                                </a>
                            </div>
                            <div class="menu-name">
                                Riwayat
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section mt-2" id="jimApp-section">
            <div class="todayjimApp">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body text-center">

                                <div class="list-menu">
                                    <div class="item-menu text-center">
                                        <div class="menu-icon">
                                            <a href="{{ route('user.sim-wajib.index') }}" class="green" style="font-size: 40px;">
                                                <ion-icon name="bookmark-outline"></ion-icon>
                                            </a>
                                        </div>
                                        <div class="menu-name">
                                            <span class="text-center">Simp Wajib</span>
                                        </div>
                                    </div>
                                    <div class="item-menu text-center">
                                        <div class="menu-icon">
                                            <a href="{{ route('user.sim-sukarela.index') }}" class="danger" style="font-size: 40px;">
                                                <ion-icon name="wallet-outline"></ion-icon>
                                            </a>
                                        </div>
                                        <div class="menu-name">
                                            <span class="text-center">Simp Sukarela</span>
                                        </div>
                                    </div>
                                    <div class="item-menu text-center">
                                        <div class="menu-icon">
                                            <a href="{{ route('user.tabungan.index') }}" class="green" style="font-size: 40px;">
                                                <ion-icon name="save-outline"></ion-icon>
                                            </a>
                                        </div>
                                        <div class="menu-name">
                                            <span class="text-center">Tabungan</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="list-menu">
                                    <div class="item-menu text-center">
                                        <div class="menu-icon">
                                            <a href="{{ route('user.paylater.index') }}" class="danger" style="font-size: 40px;">
                                                <ion-icon name="card-outline"></ion-icon>
                                            </a>
                                        </div>
                                        <div class="menu-name">
                                            <span class="text-center">Paylater</span>
                                        </div>
                                    </div>
                                    <div class="item-menu text-center">
                                        <div class="menu-icon">
                                            <a href="{{ route('user.pembiayaan.index') }}" class="warning" style="font-size: 40px;">
                                                <ion-icon name="cash-outline"></ion-icon>
                                            </a>
                                        </div>
                                        <div class="menu-name">
                                            <span class="text-center">Pembiayaan</span>
                                        </div>
                                    </div>
                                    <div class="item-menu text-center">
                                        <div class="menu-icon">
                                            <a href="{{ route('user.produk.index') }}" class="warning" style="font-size: 40px;">
                                                <ion-icon name="ellipsis-horizontal-outline"></ion-icon>
                                            </a>
                                        </div>
                                        <div class="menu-name">
                                            <span class="text-center">Semua</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rekapjimApp">
                <div class="row">
                    <div class="col-6">
                        <div class="card gradasigreen">
                            <div class="card-body">
                                <div class="jimAppcontent">
                                    <div class="iconjimApp">
                                        <ion-icon name="arrow-down-circle"></ion-icon>
                                    </div>
                                    <div class="jimAppdetail">
                                        <h4 class="jimApptitle">Total Masuk</h4>
                                        <span>@rupiah ($totalHistoryIn)</span>
                                    </div>
                                </div>
                            </div>
                            <!-- <a href="#" class="text-center" style="font-size: 25px;">
                                <div class="action-button">
                                    Show All
                                </div>
                            </a> -->
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card gradasired">
                            <div class="card-body">
                                <div class="jimAppcontent">
                                    <div class="iconjimApp">
                                        <ion-icon name="arrow-up-circle"></ion-icon>
                                    </div>
                                    <div class="jimAppdetail">
                                        <h4 class="jimApptitle">Total Keluar</h4>
                                        <span>@rupiah ($totalHistoryOut)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="jimApptab mt-1">
                <div class="tab-pane fade show active" id="pilled" role="tabpanel">
                    <ul class="nav nav-tabs style1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#history" role="tab">
                                Riwayat
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#shu" role="tab">
                                SHU
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content mt-1" style="margin-bottom:100px;">
                    <div class="tab-pane fade show active" id="history" role="tabpanel">
                        <ul class="listview image-listview">
                            @forelse ($histories as $history)
                            <li>
                                <div class="item">
                                    @if ($history->type == 'deposit')
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="arrow-down"></ion-icon>
                                    </div>
                                    @else
                                    <div class="icon-box bg-danger">
                                        <ion-icon name="arrow-up"></ion-icon>
                                    </div>
                                    @endif
                                    <div class="in">
                                        <div>{{ $history->meta['description'] ?? 'Tidak Ada Keterangan' }}</div>
                                        @if ($history->type == 'deposit')
                                        <span class="badge badge-primary">@rupiah ($history->amount)</span>
                                        @else
                                        <span class="badge badge-danger">@rupiah ($history->amount)</span>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            @empty
                            <li>
                                <div class="item">
                                    <div class="in">
                                        <div>belum ada transaksi masuk</div>
                                    </div>
                                </div>
                            </li>
                            @endforelse
                        </ul>
                    </div>

                    <div class="tab-pane fade" id="shu" role="tabpanel">
                        <ul class="listview image-listview">
                            <li>
                                <div class="item">
                                    <img src="{{ asset ('assets') }}//img/sample/avatar/avatar1.jpg" alt="image" class="image">
                                    <div class="in">
                                        <div>Sabar Yes!</div>
                                        <span class="text-muted">Masih Dihitung</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>

    </div>
    <!-- * App Capsule -->
    @endif
    @endsection