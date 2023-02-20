@extends('layouts.auth')

@section('title', __('Forgot Password'))

@push('css')
<link rel="stylesheet" href="{{ asset('mazer') }}/css/pages/auth.css">
@endpush

@section('content')
<div class="login-form mt-1">
    <div class="section">
        <img src="assets/img/sample/photo/logo.png" alt="image" class="form-image">
    </div>


    <div class="section mt-1 mb-5">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible show fade">
            <ul class="ms-0 mb-0">
                @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('status'))
        <div class="alert alert-success alert-dismissible show fade">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group boxed">

                <div class="input-wrapper">
                    <input type="email" class="form-control" id="email1" name="email" placeholder="Email address" required autocomplete="current-email">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
            </div>

            <div class="form-links mt-2">
                <div>
                    <a href="/login">{{ __('Already have an account') }}?</a>
                </div>
            </div>

            <div class="form-button-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg">{{ __('Send Password Reset Link') }}</button>
            </div>

        </form>
    </div>
</div>


</div>
<!-- * App Capsule -->


@endsection