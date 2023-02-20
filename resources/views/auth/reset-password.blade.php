@extends('layouts.auth')

@section('title', __('Reset Password'))

@push('css')
<link rel="stylesheet" href="{{ asset('mazer') }}/css/pages/auth.css">
@endpush

@section('content')
<div class="login-form mt-1">
    <div class="section">
        <img src="{{asset('assets')}}/img/sample/photo/logo.png" alt="image" class="form-image">
    </div>
    <div class="section mt-1">
        <h4>Enter your new password below.</h4>
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

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ request()->token }}">

            <div class="form-group boxed">

                <div class="input-wrapper">
                    <input type="email" class="form-control" id="email1" name="email" placeholder="Email address" required autocomplete="current-email" value="{{ request()->email ?? old('email') }}" readonly>
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

            <div class="form-group boxed">
                <div class="input-wrapper">
                    <input type="password" class="form-control" id="password2" name="password_confirmation" placeholder="Confirm Password">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
            </div>

            <div class="form-links mt-2">
                <div>
                    <input type="checkbox" id="checkboxPassword"> Show Password
                </div>
                <div><input type="checkbox" id="checkboxPasswordConfirm"> Show Confirm Password</div>
            </div>


            <div class="form-button-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Reset Password</button>
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
        $('#checkboxPasswordConfirm').on('change', function() {
            $('#password2').attr('type', $('#checkboxPasswordConfirm').prop('checked') == true ? "text" : "password");
        });
        $('#checkboxPassword').on('change', function() {
            $('#password1').attr('type', $('#checkboxPassword').prop('checked') == true ? "text" : "password");
        });
    });
</script>
@endpush