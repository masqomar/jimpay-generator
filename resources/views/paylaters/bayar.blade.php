@extends('layouts.app')

@section('title', __('Bayar Angsuran'))

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3>{{ __('Bayar Angsuran') }}</h3>
                <p class="text-subtitle text-muted">
                    {{ __('Detail Pembayaran Angsuran') }}
                </p>
            </div>

        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('paylaters.bayar.bayarAngsuran') }}" method="POST">
                            @csrf
                            @method('POST')

                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user_id">{{ __('Anggota') }}</label>
                                        @foreach ($paylaters as $paylater)
                                        <input type="hidden" name="paylater_id" id="paylater_id" class="form-control @error('paylater_id') is-invalid @enderror" value="{{ $paylater->id }}" required readonly />
                                        <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ $paylater->user->first_name }}" required readonly />
                                        @endforeach
                                        @error('first_name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="amount">{{ __('Nominal Angsuran') }}</label>
                                        <input type="number" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ isset($paylaterTransaction) ? $paylaterTransaction->amount : old('amount') }}" placeholder="{{ __('Nominal Angsuran') }}" required />
                                        @error('amount')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="note">{{ __('Catatan') }}</label>
                                        <select class="form-select @error('catatan') is-invalid @enderror" name="note" id="note" class="form-control" required>
                                            <option value="" selected disabled>-- {{ __('Pilih Catatan') }} --</option>

                                            <option value="Angsuran 1">Angsuran 1</option>
                                            <option value="Angsuran 2">Angsuran 2</option>
                                            <option value="Angsuran 3">Angsuran 3</option>
                                            <option value="Angsuran 4">Angsuran 4</option>
                                            <option value="Angsuran 5">Angsuran 5</option>
                                            <option value="Angsuran 6">Angsuran 6</option>
                                            <option value="Pelunasan">Pelunasan</option>
                                        </select>
                                        @error('catatan')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date">{{ __('Tanggal') }}</label>
                                        <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ isset($paylaterTransaction) && $paylaterTransaction->date ? $paylaterTransaction->date->format('Y-m-d') : old('date') }}" placeholder="{{ __('Date') }}" required />
                                        @error('date')
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