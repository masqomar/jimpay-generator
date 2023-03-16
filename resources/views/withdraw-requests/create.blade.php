@extends('layouts.app')

@section('title', __('Create Withdraw Requests'))

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3>{{ __('Withdraw Requests') }}</h3>
                <p class="text-subtitle text-muted">
                    {{ __('Create a new withdraw request.') }}
                </p>
            </div>

            <x-breadcrumb>
                <li class="breadcrumb-item">
                    <a href="/">{{ __('Dashboard') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('withdraw-requests.index') }}">{{ __('Withdraw Requests') }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ __('Create') }}
                </li>
            </x-breadcrumb>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('withdraw-requests.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="amount">{{ __('Nominal') }}</label>
                                        <input type="number" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ isset($withdrawRequest) ? $withdrawRequest->amount : old('amount') }}" placeholder="{{ __('Nominal') }}" required />
                                        @error('amount')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user-id">{{ __('Mitra') }}</label>
                                        <select class="form-select @error('user_id') is-invalid @enderror" name="user_id" id="user-id" class="form-control" required>
                                            <option value="" selected disabled>-- {{ __('Pilih Mitra') }} --</option>

                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ isset($withdrawRequest) && $withdrawRequest->user_id == $user->id ? 'selected' : (old('user_id') == $user->id ? 'selected' : '') }}>
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
                                        <label for="bank-id">{{ __('Bank') }}</label>
                                        <select class="form-select @error('bank_id') is-invalid @enderror" name="bank_id" id="bank-id" class="form-control">
                                            <option value="" selected disabled>-- {{ __('Pilih Bank') }} --</option>

                                            @foreach ($banks as $bank)
                                            <option value="{{ $bank->id }}">
                                                {{ $bank->name }}
                                            </option>
                                            @endforeach
                                        </select> @error('bank_id')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bank-account-number">{{ __('No Rekening') }}</label>
                                        <input type="number" name="bank_account_number" id="bank-account-number" class="form-control @error('bank_account_number') is-invalid @enderror" value="{{ isset($withdrawRequest) ? $withdrawRequest->bank_account_number : old('bank_account_number') }}" placeholder="{{ __('No Rekening') }}" />
                                        @error('bank_account_number')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bank-account-name">{{ __('Atas Nama Rekening') }}</label>
                                        <input type="text" name="bank_account_name" id="bank-account-name" class="form-control @error('bank_account_name') is-invalid @enderror" value="{{ isset($withdrawRequest) ? $withdrawRequest->bank_account_name : old('bank_account_name') }}" placeholder="{{ __('Atas Nama Rekening') }}" />
                                        @error('bank_account_name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                @isset($withdrawRequest)
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            @if ($withdrawRequest->image == null)
                                            <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Image" class="rounded mb-2 mt-2" alt="Image" width="200" height="150" style="object-fit: cover">
                                            @else
                                            <img src="{{ asset('storage/uploads/images/' . $withdrawRequest->image) }}" alt="Image" class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
                                            @endif
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group ms-3">
                                                <label for="image">{{ __('Bukti Pencairan') }}</label>
                                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">

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
                                        <label for="image">{{ __('Bukti Pencairan') }}</label>
                                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">

                                        @error('image')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                @endisset
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="extra-field">{{ __('Status Pencairan') }}</label>
                                        <select class="form-select @error('extra_field') is-invalid @enderror" name="extra_field" id="extra_field" class="form-control" required>
                                            <option value="" selected disabled>-- {{ __('Pilih Status') }} --</option>

                                            <option value="Diproses">Diproses</option>
                                            <option value="Sukses">Sukses</option>
                                        </select>

                                        @error('extra_field')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Back') }}</a>

                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection