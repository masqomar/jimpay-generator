@extends('layouts.auth')

@section('title', __('Log in'))

@push('css')
<link rel="stylesheet" href="{{ asset('mazer') }}/css/pages/auth.css">
@endpush

@section('content')
<div class="login-form mt-1">
    <div class="section">
        <img src="assets/img/sample/photo/logo.png" alt="image" class="form-image">
    </div>
    <div class="section mt-1">
        <h1>Get started</h1>
        <h4>Fill the form to log in</h4>
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

        <form method="POST" action="{{ route('login') }}" id="logForm">
            @csrf

            <div class="form-group boxed">

                <div class="input-wrapper">
                    <input type="email" class="form-control" id="email1" name="email" placeholder="Email address">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
            </div>

            <div class="form-group boxed">
                <div class="input-wrapper">
                    <input type="password" class="form-control" id="password1" name="password" placeholder="Password">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
            </div>

            <div class="form-links mt-2">
                <div>
                    <input type="checkbox" id="checkbox" name="remember"> Keep me logged in
                </div>
                <div><input type="checkbox" id="checkboxPassword"> Show Password</div>
            </div>

            <div class="form-links mt-2">
                <div>
                    <a href="{{ route('password.request') }}">Lupa Password?</a>
                </div>
            </div>

            <div class="form-button-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Log in</button>
            </div>

        </form>
    </div>
</div>


</div>
<!-- * App Capsule -->


@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#checkboxPassword').on('change', function() {
            $('#password1').attr('type', $('#checkboxPassword').prop('checked') == true ? "text" : "password");
        });
    });
</script>
@endpush