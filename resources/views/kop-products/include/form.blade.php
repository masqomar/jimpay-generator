<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($kopProduct) ? $kopProduct->name : old('name') }}" placeholder="{{ __('Name') }}" required />
            @error('name')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    @isset($kopProduct)
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($kopProduct->cover == null)
                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Cover" class="rounded mb-2 mt-2" alt="Cover" width="200" height="150" style="object-fit: cover">
                    @else
                        <img src="{{ asset('storage/uploads/covers/' . $kopProduct->cover) }}" alt="Cover" class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
                    @endif
                </div>

                <div class="col-md-8">
                    <div class="form-group ms-3">
                        <label for="cover">{{ __('Cover') }}</label>
                        <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror" id="cover">

                        @error('cover')
                          <span class="text-danger">
                                {{ $message }}
                           </span>
                        @enderror
                        <div id="coverHelpBlock" class="form-text">
                            {{ __('Leave the cover blank if you don`t want to change it.') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-md-6">
            <div class="form-group">
                <label for="cover">{{ __('Cover') }}</label>
                <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror" id="cover">

                @error('cover')
                   <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
    @endisset
    <div class="col-md-6">
        <div class="form-group">
            <label for="kop-product-type-id">{{ __('Kop Product Type') }}</label>
            <select class="form-select @error('kop_product_type_id') is-invalid @enderror" name="kop_product_type_id" id="kop-product-type-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select kop product type') }} --</option>
                
                        @foreach ($kopProductTypes as $kopProductType)
                            <option value="{{ $kopProductType->id }}" {{ isset($kopProduct) && $kopProduct->kop_product_type_id == $kopProductType->id ? 'selected' : (old('kop_product_type_id') == $kopProductType->id ? 'selected' : '') }}>
                                {{ $kopProductType->name }}
                            </option>
                        @endforeach
            </select>
            @error('kop_product_type_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="status">{{ __('Status') }}</label>
            <select class="form-select @error('status') is-invalid @enderror" name="status" id="status" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select status') }} --</option>
                <option value="0" {{ isset($kopProduct) && $kopProduct->status == '0' ? 'selected' : (old('status') == '0' ? 'selected' : '') }}>{{ __('True') }}</option>
				<option value="1" {{ isset($kopProduct) && $kopProduct->status == '1' ? 'selected' : (old('status') == '1' ? 'selected' : '') }}>{{ __('False') }}</option>
            </select>
            @error('status')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>