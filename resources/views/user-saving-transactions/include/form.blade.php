<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="user-id">{{ __('User') }}</label>
            <select class="form-select @error('user_id') is-invalid @enderror" name="user_id" id="user-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select user') }} --</option>
                
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ isset($userSavingTransaction) && $userSavingTransaction->user_id == $user->id ? 'selected' : (old('user_id') == $user->id ? 'selected' : '') }}>
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
            <label for="kop-product-id">{{ __('Kop Product') }}</label>
            <select class="form-select @error('kop_product_id') is-invalid @enderror" name="kop_product_id" id="kop-product-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select kop product') }} --</option>
                
                        @foreach ($kopProducts as $kopProduct)
                            <option value="{{ $kopProduct->id }}" {{ isset($userSavingTransaction) && $userSavingTransaction->kop_product_id == $kopProduct->id ? 'selected' : (old('kop_product_id') == $kopProduct->id ? 'selected' : '') }}>
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
    <div class="col-md-6">
        <div class="form-group">
            <label for="amount">{{ __('Amount') }}</label>
            <input type="number" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ isset($userSavingTransaction) ? $userSavingTransaction->amount : old('amount') }}" placeholder="{{ __('Amount') }}" required />
            @error('amount')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="transaction-date">{{ __('Transaction Date') }}</label>
            <input type="date" name="transaction_date" id="transaction-date" class="form-control @error('transaction_date') is-invalid @enderror" value="{{ isset($userSavingTransaction) && $userSavingTransaction->transaction_date ? $userSavingTransaction->transaction_date->format('Y-m-d') : old('transaction_date') }}" placeholder="{{ __('Transaction Date') }}" required />
            @error('transaction_date')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="description">{{ __('Description') }}</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="{{ __('Description') }}">{{ isset($userSavingTransaction) ? $userSavingTransaction->description : old('description') }}</textarea>
            @error('description')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    @isset($userSavingTransaction)
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($userSavingTransaction->saving_transaction_image == null)
                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Saving Transaction Image" class="rounded mb-2 mt-2" alt="Saving Transaction Image" width="200" height="150" style="object-fit: cover">
                    @else
                        <img src="{{ asset('storage/uploads/saving_transaction_images/' . $userSavingTransaction->saving_transaction_image) }}" alt="Saving Transaction Image" class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
                    @endif
                </div>

                <div class="col-md-8">
                    <div class="form-group ms-3">
                        <label for="saving_transaction_image">{{ __('Saving Transaction Image') }}</label>
                        <input type="file" name="saving_transaction_image" class="form-control @error('saving_transaction_image') is-invalid @enderror" id="saving_transaction_image">

                        @error('saving_transaction_image')
                          <span class="text-danger">
                                {{ $message }}
                           </span>
                        @enderror
                        <div id="saving_transaction_imageHelpBlock" class="form-text">
                            {{ __('Leave the saving transaction image blank if you don`t want to change it.') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-md-6">
            <div class="form-group">
                <label for="saving_transaction_image">{{ __('Saving Transaction Image') }}</label>
                <input type="file" name="saving_transaction_image" class="form-control @error('saving_transaction_image') is-invalid @enderror" id="saving_transaction_image">

                @error('saving_transaction_image')
                   <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
    @endisset
    <div class="col-md-6">
        <div class="form-group">
            <label for="status">{{ __('Status') }}</label>
            <select class="form-select @error('status') is-invalid @enderror" name="status" id="status" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select status') }} --</option>
                <option value="0" {{ isset($userSavingTransaction) && $userSavingTransaction->status == '0' ? 'selected' : (old('status') == '0' ? 'selected' : '') }}>{{ __('True') }}</option>
				<option value="1" {{ isset($userSavingTransaction) && $userSavingTransaction->status == '1' ? 'selected' : (old('status') == '1' ? 'selected' : '') }}>{{ __('False') }}</option>
            </select>
            @error('status')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>