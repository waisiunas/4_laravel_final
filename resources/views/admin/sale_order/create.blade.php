@extends('layouts.admin.main')

@section('title', 'Add Sale Order')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Add Sale Order</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.sale_orders') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            <form action="{{ route('admin.sale_order.create') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="customer_id" class="form-label">Customer</label>
                                            <select class="form-select @error('customer_id') is-invalid @enderror"
                                                name="customer_id" id="customer_id">
                                                <option value="" selected>Select customer</option>

                                                @foreach ($customers as $customer)
                                                    @if (old('customer_id') == $customer->id)
                                                        <option value="{{ $customer->id }}" selected>
                                                            {{ $customer->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $customer->id }}">{{ $customer->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('customer_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="product_id" class="form-label">Product</label>
                                            <select class="form-select @error('product_id') is-invalid @enderror"
                                                name="product_id" id="product_id">
                                                <option value="" selected>Select product</option>

                                                @foreach ($products as $product)
                                                    @if (old('product_id') == $product->id)
                                                        <option value="{{ $product->id }}" selected>{{ $product->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('product_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="number"
                                                class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                                                id="quantity" placeholder="Enter product quantity!"
                                                value="{{ old('quantity') }}">
                                            @error('quantity')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-4">
                                            <label for="price" class="form-label">Price</label>
                                            <input type="numbers" class="form-control @error('price') is-invalid @enderror"
                                                name="price" id="price" placeholder="Enter product price!"
                                                value="{{ old('price') }}">
                                            @error('price')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="date" class="form-label">Order Date</label>
                                            <input type="date" class="form-control @error('date') is-invalid @enderror"
                                                name="date" id="date" placeholder="Enter product date!"
                                                value="{{ old('date') }}">
                                            @error('date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <input type="submit" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
