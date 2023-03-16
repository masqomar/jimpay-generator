<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($ppobAccount) ? $ppobAccount->name : old('name') }}" placeholder="{{ __('Name') }}" required />
            @error('name')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="api-token">{{ __('Api Token') }}</label>
            <input type="text" name="api_token" id="api-token" class="form-control @error('api_token') is-invalid @enderror" value="{{ isset($ppobAccount) ? $ppobAccount->api_token : old('api_token') }}" placeholder="{{ __('Api Token') }}" required />
            @error('api_token')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>