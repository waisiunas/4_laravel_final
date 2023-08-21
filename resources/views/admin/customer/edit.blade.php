@extends('layouts.admin.main')

@section('title', 'Edit Customer')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Edit Customer</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.customers') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            <form action="{{ route('admin.customer.edit', $customer) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name" placeholder="Enter customer name!"
                                            value="{{ old('name') ?? $customer->name }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" id="email" placeholder="Enter email!"
                                                value="{{ old('email') ?? $customer->email }}">
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="phone_no" class="form-label">Phone Number</label>
                                            <input type="text"
                                                class="form-control @error('phone_no') is-invalid @enderror" name="phone_no"
                                                id="phone_no" placeholder="Enter phone no!" value="{{ old('phone_no') ?? $customer->phone_no }}">
                                            @error('phone_no')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Editress</label>
                                    <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" rows="3"
                                        placeholder="Enter address!">{{ old('address') ?? $customer->address }}</textarea>
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
