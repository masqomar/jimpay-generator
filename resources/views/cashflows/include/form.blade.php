<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="saving-account-id">{{ __('Saving Account') }}</label>
            <select class="form-select @error('saving_account_id') is-invalid @enderror" name="saving_account_id" id="saving-account-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select saving account') }} --</option>

                @foreach ($savingAccounts as $savingAccount)
                <option value="{{ $savingAccount->id }}" {{ isset($cashflow) && $cashflow->saving_account_id == $savingAccount->id ? 'selected' : (old('saving_account_id') == $savingAccount->id ? 'selected' : '') }}>
                    {{ $savingAccount->code }} || {{ $savingAccount->name }}
                </option>
                @endforeach
            </select>
            @error('saving_account_id')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="amount">{{ __('Amount') }}</label>
            <input type="number" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ isset($cashflow) ? $cashflow->amount : old('amount') }}" placeholder="{{ __('Amount') }}" required />
            @error('amount')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="type">{{ __('Type') }}</label>
            <input type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror" value="{{ isset($cashflow) ? $cashflow->type : old('type') }}" placeholder="{{ __('Type') }}" required />
            @error('type')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="description">{{ __('Description') }}</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="{{ __('Description') }}">{{ isset($cashflow) ? $cashflow->description : old('description') }}</textarea>
            @error('description')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="date">{{ __('Date') }}</label>
            <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ isset($cashflow) && $cashflow->date ? $cashflow->date->format('Y-m-d') : old('date') }}" placeholder="{{ __('Date') }}" required />
            @error('date')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    @isset($cashflow)
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-4 text-center">
                @if ($cashflow->cashflow_image == null)
                <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Cashflow Image" class="rounded mb-2 mt-2" alt="Cashflow Image" width="200" height="150" style="object-fit: cover">
                @else
                <img src="{{ asset('storage/uploads/cashflow_images/' . $cashflow->cashflow_image) }}" alt="Cashflow Image" class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
                @endif
            </div>

            <div class="col-md-8">
                <div class="form-group ms-3">
                    <label for="cashflow_image">{{ __('Cashflow Image') }}</label>
                    <input type="file" name="cashflow_image" class="form-control @error('cashflow_image') is-invalid @enderror" id="cashflow_image">

                    @error('cashflow_image')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                    <div id="cashflow_imageHelpBlock" class="form-text">
                        {{ __('Leave the cashflow image blank if you don`t want to change it.') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="col-md-6">
        <div class="form-group">
            <label for="cashflow_image">{{ __('Cashflow Image') }}</label>
            <input type="file" name="cashflow_image" class="form-control @error('cashflow_image') is-invalid @enderror" id="cashflow_image">

            @error('cashflow_image')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    @endisset
</div>