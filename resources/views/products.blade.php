@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
             @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            @if (session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('success') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            @endif
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

{{-- For Table
   --}}

   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('custom.welcome') }}</div>

                <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Product Name</th>
                          <th scope="col">Quantity In Stock</th>
                          <th scope="col">Price Per Item</th>
                          <th scope="col">Total Value Number</th>
                      </tr>
                  </thead>
                  <tbody>
                    @php
                     $sum = 0;
                    @endphp
                    @foreach($products as $key=>$product)
                     @php
                     $product_sum = $product->quantity_in_stock * $product->price_per_item;

                     $sum +=$product_sum;
                    @endphp
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->quantity_in_stock}}</td>
                        <td>{{$product->price_per_item}}</td>
                        <td>{{$product_sum}}</td>
                    </tr>
                    @endforeach
                    <tr>
                      <td colspan="4">Total Value Number</td>
                      <td>{{$sum}}</td>
                  </tr>
              </tbody>
          </table>
      </div>
  </div>
</div>
</div>
</div>
@endsection

