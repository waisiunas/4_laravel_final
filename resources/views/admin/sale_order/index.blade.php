@extends('layouts.admin.main')

@section('title', 'Sale Orders')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Sale Orders</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.sale_order.create') }}" class="btn btn-outline-primary">Add Sale Order</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            @if (count($sale_orders) > 0)
                                <table class="table table-bordered m-0">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Customer</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($sale_orders as $sale_order)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $sale_order->customer->name }}</td>
                                                <td>{{ $sale_order->product->name }}</td>
                                                <td>{{ $sale_order->quantity }}</td>
                                                <td>{{ $sale_order->price }}</td>
                                                <td>{{ $sale_order->order_date }}</td>
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
