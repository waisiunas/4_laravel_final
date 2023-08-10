@extends('layouts.admin.main')

@section('title', 'Edit Vendor')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Edit Vendor</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.vendors') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            <form action="{{ route('admin.vendor.edit', $vendor) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="company_name" class="form-label">Company Name</label>
                                    <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                        name="company_name" id="company_name" placeholder="Enter company name!"
                                        value="{{ old('company_name') ?? $vendor->company_name }}">
                                    @error('company_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title</label>
                                            <select class="form-select @error('title') is-invalid @enderror" name="title"
                                                id="title">
                                                <option value="" selected>Select title</option>
                                                @foreach ($titles as $title)
                                                    @if (old('title'))
                                                        @if (old('title') == $title)
                                                            <option value="{{ $title }}" selected>{{ $title }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $title }}">{{ $title }}</option>
                                                        @endif
                                                    @else
                                                    @if ($vendor->title == $title)
                                                        <option value="{{ $title }}" selected>{{ $title }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $title }}">{{ $title }}</option>
                                                    @endif
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="address" class="form-label">First Name</label>
                                            <input type="text"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                name="first_name" id="first_name" placeholder="Enter first name!"
                                                value="{{ old('first_name') ?? $vendor->first_name }}">
                                            @error('first_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="last_name" class="form-label">Last Name</label>
                                            <input type="text"
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                name="last_name" id="last_name" placeholder="Enter last name!"
                                                value="{{ old('last_name') ?? $vendor->last_name }}">
                                            @error('last_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" id="email" placeholder="Enter email!"
                                                value="{{ old('email') ?? $vendor->email }}">
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="phone_no" class="form-label">Phone Number</label>
                                            <input type="text"
                                                class="form-control @error('phone_no') is-invalid @enderror" name="phone_no"
                                                id="phone_no" placeholder="Enter phone no!"
                                                value="{{ old('phone_no') ?? $vendor->phone_no }}">
                                            @error('phone_no')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="website" class="form-label">Website</label>
                                            <input type="website"
                                                class="form-control @error('website') is-invalid @enderror" name="website"
                                                id="website" placeholder="Enter website!"
                                                value="{{ old('website') ?? $vendor->website }}">
                                            @error('website')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" rows="3"
                                        placeholder="Enter address!">{{ old('address') ?? $vendor->address }}</textarea>
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
