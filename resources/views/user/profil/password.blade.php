@extends('layouts.app')

@section('title', trans('Ganti Password'))

@section('content')


<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Ganti Password</div>
    <div class="right"></div>
</div>
<!-- * App Header -->

<br>
<br>
<br>
<div class="row">
    <div class="col-md-12">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible show fade">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('user-password.update') }}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="password">{{ __('Password Lama') }}</label>
                        <input type="password" name="current_password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" id="password" placeholder="Password Lama" required>
                        @error('current_password', 'updatePassword')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('Password Baru') }}</label>
                        <input type="password" name="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" id="password" placeholder="Password Baru" required>
                        @error('password', 'updatePassword')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">{{ __('Ulangi Password Baru') }}</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ulangi Password Baru" required>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('Ganti Password') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection