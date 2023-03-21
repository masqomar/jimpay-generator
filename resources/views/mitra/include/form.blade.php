<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="first_name">{{ __('Nama Depan') }}</label>
            <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="{{ __('Nama Depan') }}" value="{{ isset($user) ? $user->first_name : old('first_name') }}" required autofocus>
            @error('first_name')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="last_name">{{ __('Nama Belakang') }}</label>
            <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="{{ __('Nama Belakang') }}" value="{{ isset($user) ? $user->last_name : old('last_name') }}" required autofocus>
            @error('last_name')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" value="{{ isset($user) ? $user->email : old('email') }}" required>
            @error('email')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" {{ empty($user) ? 'required' : '' }}>
            @error('password')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
            @isset($user)
            <div id="passwordHelpBlock" class="form-text">
                {{ __('Leave the password & password confirmation blank if you don`t want to change them.') }}
            </div>
            @endisset
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="password-confirmation">{{ __('Password Confirmation') }}</label>
            <input type="password" name="password_confirmation" id="password-confirmation" class="form-control" placeholder="{{ __('Password Confirmation') }}" {{ empty($user) ? 'required' : '' }}>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="mobile">{{ __('No Telepon') }}</label>
            <input type="text" name="mobile" id="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="{{ __('No Telepon') }}" value="{{ isset($user) ? $user->mobile : old('mobile') }}" required autofocus>
            @error('mobile')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="member_id">{{ __('No Anggota') }}</label>
            <input type="text" name="member_id" id="member_id" class="form-control @error('member_id') is-invalid @enderror" placeholder="{{ __('No Anggota') }}" value="{{ isset($user) ? $user->member_id : old('member_id') }}" required autofocus>
            @error('member_id')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>



    @empty($user)
    <div class="col-md-6">
        <div class="form-group">
            <label for="role">{{ __('Role') }}</label>
            <select class="form-select" name="role" id="role" class="form-control" required>
                <option value="" selected disabled>-- Select role --</option>
                @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
                @error('role')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="avatar">{{ __('Poto') }}</label>
            <input type="file" name="avatar" id="avatar" class="form-control @error('avatar') is-invalid @enderror">
            @error('avatar')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    @endempty

    @isset($user)
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="role">{{ __('Role') }}</label>
                <select class="form-select" name="role" id="role" class="form-control" required>
                    <option value="" selected disabled>{{ __('-- Select role --') }}</option>
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->getRoleNames()->toArray() !== [] && $user->getRoleNames()[0] == $role->name ? 'selected' : '-' }}>
                        {{ $role->name }}
                    </option>
                    @endforeach
                </select>
                @error('role')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>

        <div class="col-md-1 text-center">
            <div class="avatar avatar-xl">
                @if ($user->avatar == null)
                <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($user->email))) }}&s=500" alt="avatar">
                @else
                <img src="{{ asset("uploads/images/avatars/$user->avatar") }}" alt="avatar">
                @endif
            </div>
        </div>

        <div class="col-md-5 me-0 pe-0">
            <div class="form-group">
                <label for="avatar">{{ __('Avatar') }}</label>
                <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror" id="avatar">
                @error('avatar')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
                @if ($user->avatar == null)
                <div id="passwordHelpBlock" class="form-text">
                    {{ __('Leave the avatar blank if you don`t want to change it.') }}
                </div>
                @endif
            </div>
        </div>
    </div>
    @endisset
</div>