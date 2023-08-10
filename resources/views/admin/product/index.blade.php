@extends('layouts.admin.main')

@section('title', 'Products')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Products</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.product.create') }}" class="btn btn-outline-primary">Add Product</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            @if (count($products) > 0)
                                <table class="table table-bordered m-0">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Product Name</th>
                                            {{-- <th>Image</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $product->category->name }}</td>
                                                <td>{{ $product->brand->name }}</td>
                                                <td>{{ $product->name }}</td>
                                                {{-- <td>
                                                    <img src="{{ asset('template/img/products/' . $product->image) }}"
                                                        alt="" width="100">
                                                </td> --}}
                                                <td>
                                                    <a href="{{ route('admin.product.edit', $product) }}"
                                                        class="btn btn-primary">
                                                        <i class="align-middle" data-feather="edit"></i>
                                                    </a>
                                                    <a href="{{ route('admin.product.show', $product) }}"
                                                        class="btn btn-info">
                                                        <i class="align-middle" data-feather="eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.product.destroy', $product) }}"
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
