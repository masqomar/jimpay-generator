<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($period) ? $period->name : old('name') }}" placeholder="{{ __('Name') }}" required />
            @error('name')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="open-date">{{ __('Open Date') }}</label>
            <input type="date" name="open_date" id="open-date" class="form-control @error('open_date') is-invalid @enderror" value="{{ isset($period) && $period->open_date ? $period->open_date->format('Y-m-d') : old('open_date') }}" placeholder="{{ __('Open Date') }}" required />
            @error('open_date')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="close-date">{{ __('Close Date') }}</label>
            <input type="date" name="close_date" id="close-date" class="form-control @error('close_date') is-invalid @enderror" value="{{ isset($period) && $period->close_date ? $period->close_date->format('Y-m-d') : old('close_date') }}" placeholder="{{ __('Close Date') }}" required />
            @error('close_date')
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
                <option value="0" {{ isset($period) && $period->status == '0' ? 'selected' : (old('status') == '0' ? 'selected' : '') }}>{{ __('True') }}</option>
				<option value="1" {{ isset($period) && $period->status == '1' ? 'selected' : (old('status') == '1' ? 'selected' : '') }}>{{ __('False') }}</option>
            </select>
            @error('status')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>