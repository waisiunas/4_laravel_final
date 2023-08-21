@extends('layouts.admin.main')

@section('title', 'Edit Purchase Order')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Edit Purchase Order</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.purchase_orders') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            <form action="{{ route('admin.purchase_order.edit', $purchase_order) }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="vendor_id" class="form-label">Vendor</label>
                                            <select class="form-select @error('vendor_id') is-invalid @enderror"
                                                name="vendor_id" id="vendor_id">
                                                <option value="" selected>Select vendor</option>

                                                @if (old('vendor_id'))
                                                    @foreach ($vendors as $vendor)
                                                        @if (old('vendor_id') == $vendor->id)
                                                            <option value="{{ $vendor->id }}" selected>
                                                                {{ $vendor->company_name }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $vendor->id }}">{{ $vendor->company_name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @foreach ($vendors as $vendor)
                                                        @if ($purchase_order->vendor_id == $vendor->id)
                                                            <option value="{{ $vendor->id }}" selected>
                                                                {{ $vendor->company_name }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $vendor->id }}">{{ $vendor->company_name }}
                                                            </option>
                                                        @endif
                                                    @endforeach

                                                @endif
                                            </select>
                                            @error('vendor_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="product_id" class="form-label">Purchase Order</label>
                                            <select class="form-select @error('product_id') is-invalid @enderror"
                                                name="product_id" id="product_id">
                                                <option value="" selected>Select product</option>

                                                @if (old('product_id'))
                                                    @foreach ($products as $product)
                                                        @if (old('product_id') == $product->id)
                                                            <option value="{{ $product->id }}" selected>
                                                                {{ $product->name }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $product->id }}">{{ $product->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @foreach ($products as $product)
                                                        @if ($purchase_order->product_id == $product->id)
                                                            <option value="{{ $product->id }}" selected>
                                                                {{ $product->name }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $product->id }}">{{ $product->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach

                                                @endif
                                            </select>
                                            @error('product_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-4">
                                            <label for="date" class="form-label">Order Date</label>
                                            <input type="date" class="form-control @error('date') is-invalid @enderror"
                                                name="date" id="date" placeholder="Enter product date!"
                                                value="{{ old('date') ?? $purchase_order->order_date }}">
                                            @error('date')
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
                                                value="{{ old('quantity') ?? $purchase_order->quantity }}">
                                            @error('quantity')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="type" class="form-label">Purchase Type</label>

                                            <select name="type" id="type"
                                                class="form-select @error('type') is-invalid @enderror">
                                                <option value="">Select a type</option>
                                                @if (old('type'))
                                                    @foreach ($types as $type)
                                                        @if ($type == old('type'))
                                                            <option value="{{ $type }}" selected>
                                                                {{ $type }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $type }}">{{ $type }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @foreach ($types as $type)
                                                        @if ($type == $purchase_order->purchase_type)
                                                            <option value="{{ $type }}" selected>
                                                                {{ $type }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $type }}">{{ $type }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>

                                            @error('type')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4 d-none" id="pieces_per_bundle_main">
                                            <label for="pieces_per_bundle" class="form-label">Pieces Per Bundle</label>
                                            <input type="number"
                                                class="form-control @error('pieces_per_bundle') is-invalid @enderror"
                                                name="pieces_per_bundle" id="pieces_per_bundle"
                                                placeholder="Enter product pieces_per_bundle!"
                                                value="{{ old('pieces_per_bundle') ?? $purchase_order->pieces_per_bundle }}">
                                            @error('pieces_per_bundle')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="currency" class="form-label">Currency</label>
                                            <select name="currency" id="currency"
                                                class="form-select @error('currency') is-invalid @enderror">
                                                <option value="">Select a currency</option>
                                                @if (old('currency'))
                                                    @foreach ($currencies as $currency)
                                                        @if ($currency == old('currency'))
                                                            <option value="{{ $currency }}" selected>
                                                                {{ $currency }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $currency }}">{{ $currency }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @foreach ($currencies as $currency)
                                                        @if ($currency == $purchase_order->currency)
                                                            <option value="{{ $currency }}" selected>
                                                                {{ $currency }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $currency }}">{{ $currency }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('currency')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-4">
                                            <label for="price" class="form-label">Price</label>
                                            <input type="numbers"
                                                class="form-control @error('price') is-invalid @enderror" name="price"
                                                id="price" placeholder="Enter product price!"
                                                value="{{ old('price') ?? $purchase_order->price }}">
                                            @error('price')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-4">
                                            <label for="discount" class="form-label">Discount (%)</label>
                                            <input type="numbers"
                                                class="form-control @error('discount') is-invalid @enderror"
                                                name="discount" id="discount" placeholder="Enter product discount!"
                                                value="{{ old('discount') ?? $purchase_order->discount }}">
                                            @error('discount')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="mb-3">
                                    <div class="row">

                                    </div>
                                </div> --}}

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

@section('script')
    <script>
        document.getElementById("type").addEventListener("change", function() {
            const piecesPerBundleMainElement = document.querySelector(
                "#pieces_per_bundle_main"
            );
            const selectedValue = this.value;
            if (selectedValue === "Bundle") {
                piecesPerBundleMainElement.classList.remove("d-none");
            } else {
                piecesPerBundleMainElement.classList.add("d-none");
            }
        });
    </script>
@endsection
