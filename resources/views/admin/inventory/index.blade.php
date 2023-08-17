@extends('layouts.admin.main')

@section('title', 'Inventory')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Inventory</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            @if (count($inventories) > 0)
                                <table class="table table-bordered m-0">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Product</th>
                                            <th>Current Quantity</th>
                                            <th>Damaged Quantity</th>
                                            <th>All Time Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($inventories as $inventory)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $inventory->product->name }}</td>
                                                <td>{{ $inventory->current_quantity }}</td>
                                                <td>{{ $inventory->damaged_quantity ?? "NILL" }}</td>
                                                <td>{{  $inventory->total_quantity }}</td>

                                                <td>
                                                    <a href="{{ route('admin.inventory.edit', $inventory) }}"
                                                        class="btn btn-primary">
                                                        <i class="align-middle" data-feather="edit"></i>
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
