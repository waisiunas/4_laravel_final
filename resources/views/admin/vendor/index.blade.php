@extends('layouts.admin.main')

@section('title', 'Vendors')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Vendors</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.vendor.create') }}" class="btn btn-outline-primary">Add Vendor</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            @if (count($vendors) > 0)
                                <table class="table table-bordered m-0">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Company Name</th>
                                            <th>Person Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Website</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($vendors as $vendor)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $vendor->company_name }}</td>
                                                <td>
                                                    {{ $vendor->title . ' ' . $vendor->first_name . $vendor->last_name }}
                                                </td>
                                                <td>{{ $vendor->email }}</td>
                                                <td>{{ $vendor->phone_no }}</td>
                                                <td>{{ $vendor->website }}</td>
                                                <td>
                                                    <a href="{{ route('admin.vendor.edit', $vendor) }}"
                                                        class="btn btn-primary">
                                                        <i class="align-middle" data-feather="edit"></i>
                                                    </a>
                                                    <a href="" class="btn btn-info">
                                                        <i class="align-middle" data-feather="eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.vendor.destroy', $vendor) }}"
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
