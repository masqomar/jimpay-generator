@extends('layouts.app')

@section('title', __('Create Banks'))

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3>{{ __('Banks') }}</h3>
                <p class="text-subtitle text-muted">
                    {{ __('Create a new bank.') }}
                </p>
            </div>

            <x-breadcrumb>
                <li class="breadcrumb-item">
                    <a href="/">{{ __('Dashboard') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('banks.index') }}">{{ __('Banks') }}</a>
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
                    @if ($message = Session::get('message'))
                    <div class="alert alert-info alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('pulsa.kategori.store') }}" method="POST">
                            @csrf
                            @method('POST')

                            @foreach ($hasil as $kategori)
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="product_id">{{ __('Id Produk') }}</label>
                                        <input type="text" name="product_id[]" id="product_id" class="form-control @error('product_id') is-invalid @enderror" value="{{$kategori['product_id']}}" placeholder="{{ __('product_id') }}" required />
                                        @error('product_id')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="product_name">{{ __('Nama Produk') }}</label>
                                        <input type="text" name="product_name[]" id="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{$kategori['product_name']}}" placeholder="{{ __('product_name') }}" required />
                                        @error('product_name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="status">{{ __('Status') }}</label>
                                        <input type="text" name="status[]" id="status" class="form-control @error('status') is-invalid @enderror" value="{{$kategori['status']}}" placeholder="{{ __('status') }}" required />
                                        @error('status')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="update">{{ __('Update') }}</label>
                                        <input type="text" name="update[]" id="update" class="form-control @error('update') is-invalid @enderror" value="{{$kategori['updated_at']}}" placeholder="{{ __('update') }}" required />
                                        @error('update')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @endforeach

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