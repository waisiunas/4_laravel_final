@extends('layouts.admin.main')

@section('title', 'Purchase Order Detail')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Purchase Order Detail</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.purchase_orders') }}" class="btn btn-outline-primary"><i class="align-middle"
                            data-feather="corner-down-left"></i> Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-4">
                                        <strong>Vendor:</strong>
                                        {{ $purchase_order->vendor->company_name }}
                                    </div>
                                    <div class="col-4">
                                        <strong>Product:</strong> {{ $purchase_order->product->name }}
                                    </div>
                                    <div class="col-4">
                                        <strong>Date:</strong>
                                        {{ $purchase_order->order_date }}
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-4">
                                        <strong>Quantity:</strong>
                                        {{ $purchase_order->quantity }}
                                    </div>
                                    <div class="col-4">
                                        <strong>Price:</strong> {{ $purchase_order->price . "(" . $purchase_order->currency . ")" }}
                                    </div>
                                    <div class="col-4">
                                        <strong>Discount:</strong>
                                        {{ $purchase_order->discount . '%' }}
                                    </div>
                                </div>
                            </div>

                            {{-- <div>
                                <div class="row">
                                    <div class="col-4">
                                        <strong>:</strong>
                                        {{ $purchase_order->vendor->name }}
                                    </div>
                                    <div class="col-4">
                                        <strong>Product:</strong> {{ $purchase_order->product->name }}
                                    </div>
                                    <div class="col-4">
                                        <strong>Date:</strong>
                                        {{ $purchase_order->order_date }}
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
