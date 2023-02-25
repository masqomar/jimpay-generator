@extends('layouts.app')

@section('title', trans('Edit Profil'))

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
    <div class="pageTitle">Edit Profil</div>
    <div class="right"></div>
</div>
<!-- * App Header -->

<br>
<br>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('user-profile-information.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="first_name">{{ __('Nama Keren / Panggilan') }}</label>
                        <input type="text" name="first_name" class="form-control  @error('first_name', 'updateProfileInformation') is-invalid @enderror" id="first_name" placeholder="{{ __('Nama Keren / Panggilan') }}" value="{{ old('first_name') ?? auth()->user()->first_name }}" required>
                        @error('first_name', 'updateProfileInformation')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="last_name">{{ __('Nama Lengkap') }}</label>
                        <input type="text" name="last_name" class="form-control  @error('last_name', 'updateProfileInformation') is-invalid @enderror" id="last_name" placeholder="{{ __('Nama Lengkap') }}" value="{{ old('last_name') ?? auth()->user()->last_name }}" required>
                        @error('last_name', 'updateProfileInformation')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('E-mail Address') }}</label>
                        <input type="email" name="email" class="form-control @error('email', 'updateProfileInformation') is-invalid @enderror" id="email" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') ?? auth()->user()->email }}" required>

                        @error('email', 'updateProfileInformation')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="mobile">{{ __('No Telepon') }} <sup>tanpa angka '0' contoh: 85790702476</sup> </label>
                        <input type="text" name="mobile" class="form-control  @error('mobile', 'updateProfileInformation') is-invalid @enderror" id="mobile" placeholder="{{ __('No Telepon') }}" value="{{ old('mobile') ?? auth()->user()->mobile }}" required>
                        @error('mobile', 'updateProfileInformation')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <select class="form-select @error('gender') is-invalid @enderror" name="gender" id="gender" class="form-control" required>
                            <option value="" selected disabled>-- {{ __('Jenis Kelamin') }} --</option>

                            <option value="1" {{ auth()->user()->gender ? 'selected' : (old('gender') ? 'selected' : '') }}>
                                {{ __('Laki - laki') }}
                            </option>
                            <option value="0" {{ auth()->user()->gender ? 'selected' : (old('gender') ? 'selected' : '') }}>
                                {{ __('Perempuan') }}
                            </option>
                        </select>
                        @error('gender', 'updateProfileInformation')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-1">
                            <div class="avatar avatar-xl mb-3">
                                @if (auth()->user()->avatar == null)
                                <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim(auth()->user()->email))) }}&s=500" alt="Avatar">
                                @else
                                <img src="{{ asset('uploads/images/avatars/' . auth()->user()->avatar) }}" alt="Avatar" style="border-radius: 30px; width: 70px; height: 70px;">
                                @endif
                            </div>
                        </div>

                        <div class="col-md-11">
                            <div class="form-group">
                                <label for="avatar">{{ __('Avatar') }}</label>
                                <input type="file" name="avatar" class="form-control @error('avatar', 'updateProfileInformation') is-invalid @enderror" id="avatar">

                                @error('avatar', 'updateProfileInformation')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary">{{ __('Update Profil') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection