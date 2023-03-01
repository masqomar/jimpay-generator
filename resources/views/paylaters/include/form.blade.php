<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="user-id">{{ __('Anggota') }}</label>
            <select class="form-select @error('user_id') is-invalid @enderror" name="user_id" id="user-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Pilih Anggota') }} --</option>

                @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ isset($paylater) && $paylater->user_id == $user->id ? 'selected' : (old('user_id') == $user->id ? 'selected' : '') }}>
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
            <label for="paylater-provider-id">{{ __('Mitra') }}</label>
            <select class="form-select @error('paylater_provider_id') is-invalid @enderror" name="paylater_provider_id" id="paylater-provider-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Pilih Mitra') }} --</option>

                @foreach ($paylaterProviders as $paylaterProvider)
                <option value="{{ $paylaterProvider->id }}" {{ isset($paylater) && $paylater->paylater_provider_id == $paylaterProvider->id ? 'selected' : (old('paylater_provider_id') == $paylaterProvider->id ? 'selected' : '') }}>
                    {{ $paylaterProvider->name }}
                </option>
                @endforeach
            </select>
            @error('paylater_provider_id')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="product">{{ __('Nama barang') }}</label>
            <input type="text" name="product" id="product" class="form-control @error('product') is-invalid @enderror" value="{{ isset($paylater) ? $paylater->product : old('product') }}" placeholder="{{ __('Product') }}" required />
            @error('product')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="product-specification">{{ __('Spesifikasi Barang') }}</label>
            <input type="text" name="product_specification" id="product-specification" class="form-control @error('product_specification') is-invalid @enderror" value="{{ isset($paylater) ? $paylater->product_specification : old('product_specification') }}" placeholder="{{ __('Product Specification') }}" />
            @error('product_specification')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="bank-id">{{ __('Bank') }}</label>
            <select class="form-select @error('bank_id') is-invalid @enderror" name="bank_id" id="bank-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Pilih Bank') }} --</option>

                @foreach ($banks as $bank)
                <option value="{{ $bank->id }}" {{ isset($paylater) && $paylater->bank_id == $bank->id ? 'selected' : (old('bank_id') == $bank->id ? 'selected' : '') }}>
                    {{ $bank->code }}
                </option>
                @endforeach
            </select>
            @error('bank_id')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="bank-account-number">{{ __('No Rekening') }}</label>
            <input type="number" name="bank_account_number" id="bank-account-number" class="form-control @error('bank_account_number') is-invalid @enderror" value="{{ isset($paylater) ? $paylater->bank_account_number : old('bank_account_number') }}" placeholder="{{ __('Bank Account Number') }}" />
            @error('bank_account_number')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="bank-account-name">{{ __('Atas Nama') }}</label>
            <input type="text" name="bank_account_name" id="bank-account-name" class="form-control @error('bank_account_name') is-invalid @enderror" value="{{ isset($paylater) ? $paylater->bank_account_name : old('bank_account_name') }}" placeholder="{{ __('Bank Account Name') }}" />
            @error('bank_account_name')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="note">{{ __('Catatan') }}</label>
            <textarea name="note" id="note" class="form-control @error('note') is-invalid @enderror" placeholder="{{ __('Note') }}" required>{{ isset($paylater) ? $paylater->note : old('note') }}</textarea>
            @error('note')
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
                <option value="" selected disabled>-- {{ __('Select Status') }} --</option>
                <option value="0" {{ isset($paylater) && $paylater->status == '0' ? 'selected' : (old('status') == '0' ? 'selected' : '') }}>{{ __('Diproses') }}</option>
                <option value="1" {{ isset($paylater) && $paylater->status == '1' ? 'selected' : (old('status') == '1' ? 'selected' : '') }}>{{ __('Disetujui') }}</option>
            </select>
            @error('status')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="extra-field">{{ __('Syarat Ketentuan') }}</label>
            <input type="text" name="extra_field" id="extra-field" class="form-control @error('extra_field') is-invalid @enderror" value="{{ isset($paylater) ? $paylater->extra_field : old('extra_field') }}" placeholder="{{ __('Extra Field') }}" />
            @error('extra_field')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="start-date">{{ __('Mulai Angsuran') }}</label>
            <input type="date" name="start_date" id="start-date" class="form-control @error('start_date') is-invalid @enderror" value="{{ isset($paylater) && $paylater->start_date ? $paylater->start_date->format('Y-m-d') : old('start_date') }}" placeholder="{{ __('Start Date') }}" required />
            @error('start_date')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="finish-date">{{ __('Selesai Angsuran') }}</label>
            <input type="date" name="finish_date" id="finish-date" class="form-control @error('finish_date') is-invalid @enderror" value="{{ isset($paylater) && $paylater->finish_date ? $paylater->finish_date->format('Y-m-d') : old('finish_date') }}" placeholder="{{ __('Finish Date') }}" required />
            @error('finish_date')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="amount">{{ __('Nominal') }}</label>
            <input type="number" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ isset($paylater) ? $paylater->amount : old('amount') }}" placeholder="{{ __('Amount') }}" required />
            @error('amount')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="duration">{{ __('Durasi / Jangka Lama') }}</label>
            <input type="number" name="duration" id="duration" class="form-control @error('duration') is-invalid @enderror" value="{{ isset($paylater) ? $paylater->duration : old('duration') }}" placeholder="{{ __('Duration') }}" required />
            @error('duration')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    @isset($paylater)
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-4 text-center">
                @if ($paylater->image == null)
                <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Image" class="rounded mb-2 mt-2" alt="Image" width="100" height="100" style="object-fit: cover">
                @else
                <img src="{{ asset('storage/uploads/images/' . $paylater->image) }}" alt="Image" class="rounded mb-2 mt-2" width="100" height="100" style="object-fit: cover">
                @endif
            </div>

            <div class="col-md-8">
                <div class="form-group ms-3">
                    <label for="image">{{ __('Bukti Transaksi') }}</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" class="rounded mb-2 mt-2" width="100" height="100" style="object-fit: cover">

                    @error('image')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                    <div id="imageHelpBlock" class="form-text">
                        {{ __('Leave the image blank if you don`t want to change it.') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="col-md-6">
        <div class="form-group">
            <label for="image">{{ __('Bukti Transaksi') }}</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" class="rounded mb-2 mt-2" width="100" height="100" style="object-fit: cover">

            @error('image')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    @endisset
</div>