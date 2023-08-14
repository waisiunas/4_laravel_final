@extends('layouts.admin.main')

@section('title', 'Purchase Orders')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Purchase Orders</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.purchase_order.create') }}" class="btn btn-outline-primary">Add Purchase
                        Order</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            @if (count($purchase_orders) > 0)
                                <table class="table table-bordered m-0">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Vendor</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($purchase_orders as $purchase_order)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $purchase_order->vendor->company_name }}</td>
                                                <td>{{ $purchase_order->product->name }}</td>
                                                <td>{{ $purchase_order->quantity }}</td>
                                                <td>{{  $purchase_order->price . "(" . $purchase_order->currency . ")" }}</td>
                                                <td>{{ $purchase_order->order_date }}</td>

                                                <td>
                                                    <a href="{{ route('admin.purchase_order.edit', $purchase_order) }}"
                                                        class="btn btn-primary">
                                                        <i class="align-middle" data-feather="edit"></i>
                                                    </a>
                                                    <a href="{{ route('admin.purchase_order.show', $purchase_order) }}"
                                                        class="btn btn-info">
                                                        <i class="align-middle" data-feather="eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.purchase_order.destroy', $purchase_order) }}"
                                                        class="btn btn-danger">
                                                        <i class="align-middle" data-feather="trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-info m-0">No record found!</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
