<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($paylaterProvider) ? $paylaterProvider->name : old('name') }}" placeholder="{{ __('Name') }}" required />
            @error('name')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="kop-product-id">{{ __('Kop Product') }}</label>
            <select class="form-select @error('kop_product_id') is-invalid @enderror" name="kop_product_id" id="kop-product-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select kop product') }} --</option>
                
                        @foreach ($kopProducts as $kopProduct)
                            <option value="{{ $kopProduct->id }}" {{ isset($paylaterProvider) && $paylaterProvider->kop_product_id == $kopProduct->id ? 'selected' : (old('kop_product_id') == $kopProduct->id ? 'selected' : '') }}>
                                {{ $kopProduct->name }}
                            </option>
                        @endforeach
            </select>
            @error('kop_product_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>