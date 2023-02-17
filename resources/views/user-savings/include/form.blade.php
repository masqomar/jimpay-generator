<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="user-id">{{ __('User') }}</label>
            <select class="form-select @error('user_id') is-invalid @enderror" name="user_id" id="user-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select user') }} --</option>

                @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ isset($userSaving) && $userSaving->user_id == $user->id ? 'selected' : (old('user_id') == $user->id ? 'selected' : '') }}>
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
                <option value="{{ $kopProduct->id }}" {{ isset($userSaving) && $userSaving->kop_product_id == $kopProduct->id ? 'selected' : (old('kop_product_id') == $kopProduct->id ? 'selected' : '') }}>
                    {{ $kopProduct->id }}
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
            <label for="period-id">{{ __('Period') }}</label>
            <select class="form-select @error('period_id') is-invalid @enderror" name="period_id" id="period-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select period') }} --</option>

                @foreach ($periods as $period)
                <option value="{{ $period->id }}" {{ isset($userSaving) && $userSaving->period_id == $period->id ? 'selected' : (old('period_id') == $period->id ? 'selected' : '') }}>
                    {{ $period->name }}
                </option>
                @endforeach
            </select>
            @error('period_id')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="amount">{{ __('Amount') }}</label>
            <input type="number" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ isset($userSaving) ? $userSaving->amount : old('amount') }}" placeholder="{{ __('Amount') }}" required />
            @error('amount')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="month">{{ __('Month') }}</label>
            <select class="form-select @error('month') is-invalid @enderror" name="month" id="month" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select Month') }} --</option>
                <option value="Januari" {{ isset($month) && $month->month == 'Januari' ? 'selected' : (old('month') == 'Januari' ? 'selected' : '') }}>{{ __('Januari') }}</option>
                <option value="Pebruari" {{ isset($month) && $month->month == 'Pebruari' ? 'selected' : (old('month') == 'Pebruari' ? 'selected' : '') }}>{{ __('Pebruari') }}</option>
                <option value="Maret" {{ isset($month) && $month->month == 'Maret' ? 'selected' : (old('month') == 'Maret' ? 'selected' : '') }}>{{ __('Maret') }}</option>
                <option value="April" {{ isset($month) && $month->month == 'April' ? 'selected' : (old('month') == 'April' ? 'selected' : '') }}>{{ __('April') }}</option>
                <option value="Mei" {{ isset($month) && $month->month == 'Mei' ? 'selected' : (old('month') == 'Mei' ? 'selected' : '') }}>{{ __('Mei') }}</option>
                <option value="Juni" {{ isset($month) && $month->month == 'Juni' ? 'selected' : (old('month') == 'Juni' ? 'selected' : '') }}>{{ __('Juni') }}</option>
                <option value="Juli" {{ isset($month) && $month->month == 'Juli' ? 'selected' : (old('month') == 'Juli' ? 'selected' : '') }}>{{ __('Juli') }}</option>
                <option value="Agustus" {{ isset($month) && $month->month == 'Agustus' ? 'selected' : (old('month') == 'Agustus' ? 'selected' : '') }}>{{ __('Agustus') }}</option>
                <option value="September" {{ isset($month) && $month->month == 'September' ? 'selected' : (old('month') == 'September' ? 'selected' : '') }}>{{ __('September') }}</option>
                <option value="Oktober" {{ isset($month) && $month->month == 'Oktober' ? 'selected' : (old('month') == 'Oktober' ? 'selected' : '') }}>{{ __('Oktober') }}</option>
                <option value="Nopember" {{ isset($month) && $month->month == 'Nopember' ? 'selected' : (old('month') == 'Nopember' ? 'selected' : '') }}>{{ __('Nopember') }}</option>
                <option value="Desember" {{ isset($month) && $month->month == 'Desember' ? 'selected' : (old('month') == 'Desember' ? 'selected' : '') }}>{{ __('Desember') }}</option>
            </select>
            @error('month')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="year">{{ __('Year') }}</label>
            <select class="form-select @error('year') is-invalid @enderror" name="year" id="year" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select year') }} --</option>

                @foreach (range(1900, strftime("%Y", time())) as $year)
                <option value="{{ $year }}" {{ isset($userSaving) && $userSaving->year == $year ? 'selected' : (old('year') == $year ? 'selected' : '') }}>
                    {{ $year }}
                </option>
                @endforeach
            </select>
            @error('year')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="deposit-date">{{ __('Deposit Date') }}</label>
            <input type="date" name="deposit_date" id="deposit-date" class="form-control @error('deposit_date') is-invalid @enderror" value="{{ isset($userSaving) && $userSaving->deposit_date ? $userSaving->deposit_date->format('Y-m-d') : old('deposit_date') }}" placeholder="{{ __('Deposit Date') }}" required />
            @error('deposit_date')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="description">{{ __('Description') }}</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="{{ __('Description') }}">{{ isset($userSaving) ? $userSaving->description : old('description') }}</textarea>
            @error('description')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
</div>