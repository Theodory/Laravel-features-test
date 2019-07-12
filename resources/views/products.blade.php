@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('custom.welcome') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('custom.inputs.product_name') }}</label>

                            <div class="col-md-6">
                                <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') }}" required autocomplete="product_name" autofocus>

                                @error('product_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quantity_in_stock" class="col-md-4 col-form-label text-md-right">{{ __('custom.inputs.quantity_in_stock') }}</label>

                            <div class="col-md-6">
                                <input id="quantity_in_stock" type="number" class="form-control @error('quantity_in_stock') is-invalid @enderror" name="quantity_in_stock" value="{{ old('quantity_in_stock') }}" required autocomplete="quantity_in_stock">

                                @error('quantity_in_stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price_per_item" class="col-md-4 col-form-label text-md-right">{{ __('custom.inputs.price_per_item') }}</label>

                            <div class="col-md-6">
                                <input id="price_per_item" type="number" class="form-control @error('price_per_item') is-invalid @enderror" name="price_per_item" required autocomplete="new-price_per_item">

                                @error('price_per_item')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('custom.inputs.submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

