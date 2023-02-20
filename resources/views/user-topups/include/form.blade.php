<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="user-id">{{ __('User') }}</label>
            <select class="form-select @error('user_id') is-invalid @enderror" name="user_id" id="user-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select user') }} --</option>

                @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ isset($userTopup) && $userTopup->user_id == $user->id ? 'selected' : (old('user_id') == $user->id ? 'selected' : '') }}>
                    {{ $user->first_name }}
                </option>
                @endforeach
            </select>
            @error('user_id')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="amount">{{ __('Amount') }}</label>
            <input type="number" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ isset($userTopup) ? $userTopup->amount : old('amount') }}" placeholder="{{ __('Amount') }}" required />
            @error('amount')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="note">{{ __('Note') }}</label>
            <select class="form-select @error('note') is-invalid @enderror" name="note" id="note" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Pilih Jenis Topup') }} --</option>

                <option value="Voucher Bulanan" {{ isset($userTopup) && $userTopup->note ? 'selected' : (old('note') ? 'selected' : '') }}>
                    {{ __('Voucher Bulanan') }}
                </option>
                <option value="Topup Cash" {{ isset($userTopup) && $userTopup->note ? 'selected' : (old('note') ? 'selected' : '') }}>
                    {{ __('Topup Cash') }}
                </option>
            </select>
            @error('note')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
</div>