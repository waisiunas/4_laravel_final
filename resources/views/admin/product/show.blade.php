@extends('layouts.admin.main')

@section('title', 'Product Detail')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Product Detail</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.products') }}" class="btn btn-outline-primary"><i class="align-middle" data-feather="corner-down-left"></i> Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-6">
                                        <strong>Category:</strong>
                                        {{ $product->category->name }}
                                    </div>
                                    <div class="col-6">
                                        <strong>Brand:</strong> {{ $product->brand->name }}
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-12">
                                        <strong>Description:</strong>
                                        {{ $product->description }}
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <img src="{{ asset('template/img/products/' . $product->image) }}" alt=""
                                        class="img-fluid" width="30%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
