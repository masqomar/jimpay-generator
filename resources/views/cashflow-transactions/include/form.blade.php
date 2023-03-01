<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="cashflow-id">{{ __('Cashflow') }}</label>
            <select class="form-select @error('cashflow_id') is-invalid @enderror" name="cashflow_id" id="cashflow-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select cashflow') }} --</option>
                
                        @foreach ($cashflows as $cashflow)
                            <option value="{{ $cashflow->id }}" {{ isset($cashflowTransaction) && $cashflowTransaction->cashflow_id == $cashflow->id ? 'selected' : (old('cashflow_id') == $cashflow->id ? 'selected' : '') }}>
                                {{ $cashflow->saving_account_id }}
                            </option>
                        @endforeach
            </select>
            @error('cashflow_id')
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
                <option value="" selected disabled>-- {{ __('Select bank') }} --</option>
                
                        @foreach ($banks as $bank)
                            <option value="{{ $bank->id }}" {{ isset($cashflowTransaction) && $cashflowTransaction->bank_id == $bank->id ? 'selected' : (old('bank_id') == $bank->id ? 'selected' : '') }}>
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
            <label for="description">{{ __('Description') }}</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="{{ __('Description') }}">{{ isset($cashflowTransaction) ? $cashflowTransaction->description : old('description') }}</textarea>
            @error('description')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="extra-field">{{ __('Extra Field') }}</label>
            <input type="text" name="extra_field" id="extra-field" class="form-control @error('extra_field') is-invalid @enderror" value="{{ isset($cashflowTransaction) ? $cashflowTransaction->extra_field : old('extra_field') }}" placeholder="{{ __('Extra Field') }}" />
            @error('extra_field')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>