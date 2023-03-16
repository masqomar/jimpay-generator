@extends('layouts.app')

@section('title', __('Detail User'))

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3>{{ __('User') }}</h3>
                <p class="text-subtitle text-muted">
                    {{ __('Detail user information.') }}
                </p>
            </div>

            <x-breadcrumb>
                <li class="breadcrumb-item">
                    <a href="/">{{ __('Dashboard') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('users.index') }}">{{ __('User') }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ __('Detail') }}
                </li>
            </x-breadcrumb>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <tr>
                                    <td colspan="2" class="text-center">
                                        <div class="avatar avatar-xl">
                                            @if ($user->avatar == null)
                                            <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($user->email))) }}&s=500" alt="Avatar">
                                            @else
                                            <img src="{{ asset("uploads/images/avatars/$user->avatar") }}" alt="Avatar">
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('First Name') }}</td>
                                    <td>{{ $user->first_name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Last Name') }}</td>
                                    <td>{{ $user->last_name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Member Id') }}</td>
                                    <td>{{ $user->member_id }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Email') }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Status') }}</td>
                                    <td>{{ $user->status }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Role') }}</td>
                                    <td>{{ $user->getRoleNames()->toArray() !== [] ? $user->getRoleNames()[0] : '-' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center fw-bold">Total Simpanan @rupiah($totalSimpanan)</h5>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <tr>
                                    <td class="fw-bold">{{ __('Simpanan Pokok') }}</td>
                                    <td>@rupiah ($totalSimPokok)</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Simpanan Wajib') }}</td>
                                    <td>@rupiah ($totalSimWajib)</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Simpanan Sukarela') }}</td>
                                    <td>@rupiah ($saldoSukarela)</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="text-center fw-bold">Total Aktifitas @rupiah($totalAktifitasAnggota)</h5>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <tr>
                                    <td class="fw-bold">{{ __('Aktifitas Anggota') }}</td>
                                    <td>@rupiah ($totalAktifitas)</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">{{ __('Pembiayan') }}</td>
                                    <td>@rupiah ($pembiayaan)</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center fw-bold">SHU DITERIMAKAN</h4>

                        <h1 class="text-center fw-bold text-primary">1999999</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection