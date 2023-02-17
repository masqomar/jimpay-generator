<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="operational-reserve">{{ __('Operational Reserve') }}</label>
            <input type="number" name="operational_reserve" id="operational-reserve" class="form-control @error('operational_reserve') is-invalid @enderror" value="{{ isset($deviden) ? $deviden->operational_reserve : old('operational_reserve') }}" placeholder="{{ __('Operational Reserve') }}" required />
            @error('operational_reserve')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="capital">{{ __('Capital') }}</label>
            <input type="number" name="capital" id="capital" class="form-control @error('capital') is-invalid @enderror" value="{{ isset($deviden) ? $deviden->capital : old('capital') }}" placeholder="{{ __('Capital') }}" required />
            @error('capital')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="user-capital">{{ __('User Capital') }}</label>
            <input type="number" name="user_capital" id="user-capital" class="form-control @error('user_capital') is-invalid @enderror" value="{{ isset($deviden) ? $deviden->user_capital : old('user_capital') }}" placeholder="{{ __('User Capital') }}" required />
            @error('user_capital')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="user-activity">{{ __('User Activity') }}</label>
            <input type="number" name="user_activity" id="user-activity" class="form-control @error('user_activity') is-invalid @enderror" value="{{ isset($deviden) ? $deviden->user_activity : old('user_activity') }}" placeholder="{{ __('User Activity') }}" required />
            @error('user_activity')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="management">{{ __('Management') }}</label>
            <input type="number" name="management" id="management" class="form-control @error('management') is-invalid @enderror" value="{{ isset($deviden) ? $deviden->management : old('management') }}" placeholder="{{ __('Management') }}" required />
            @error('management')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>