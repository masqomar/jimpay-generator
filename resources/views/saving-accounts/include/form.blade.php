<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="saving-account-type-id">{{ __('Saving Account Type') }}</label>
            <select class="form-select @error('saving_account_type_id') is-invalid @enderror" name="saving_account_type_id" id="saving-account-type-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select saving account type') }} --</option>
                
                        @foreach ($savingAccountTypes as $savingAccountType)
                            <option value="{{ $savingAccountType->id }}" {{ isset($savingAccount) && $savingAccount->saving_account_type_id == $savingAccountType->id ? 'selected' : (old('saving_account_type_id') == $savingAccountType->id ? 'selected' : '') }}>
                                {{ $savingAccountType->code }}
                            </option>
                        @endforeach
            </select>
            @error('saving_account_type_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="code">{{ __('Code') }}</label>
            <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{ isset($savingAccount) ? $savingAccount->code : old('code') }}" placeholder="{{ __('Code') }}" required />
            @error('code')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($savingAccount) ? $savingAccount->name : old('name') }}" placeholder="{{ __('Name') }}" required />
            @error('name')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>