@extends('layouts.admin.main')

@section('title', 'Add Product')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Add Product</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.products') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            <form action="{{ route('admin.product.create') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="category_id" class="form-label">Category</label>
                                            <select class="form-select @error('category_id') is-invalid @enderror"
                                                name="category_id" id="category_id">
                                                <option value="-1">
                                                    &#43;
                                                    Add New Category
                                                </option>
                                                <option value="" selected>Select category</option>

                                                @foreach ($categories as $category)
                                                    @if (old('category_id') == $category->id)
                                                        <option value="{{ $category->id }}" selected>{{ $category->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="brand_id" class="form-label">Brand</label>
                                            <select class="form-select @error('brand_id') is-invalid @enderror"
                                                name="brand_id" id="brand_id">
                                                <option value="-1">
                                                    &#43;
                                                    Add New Brand
                                                </option>
                                                <option value="" selected>Select brand</option>

                                                @foreach ($brands as $brand)
                                                    @if (old('brand_id') == $brand->id)
                                                        <option value="{{ $brand->id }}" selected>{{ $brand->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('brand_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="name" class="form-label">Product Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" id="name" placeholder="Enter product name!"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="image" class="form-label">Product Image</label>
                                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                                name="image" id="image" placeholder="Enter product image!"
                                                value="{{ old('image') }}">
                                            @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                                rows="3" placeholder="Enter description!">{{ old('description') }}</textarea>
                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
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

    @include('partials.admin.modals')
@endsection

@section('script')
    <script src="{{ asset('template/js/custom.js') }}"></script>
    <script>
        const categoryFormElement = document.getElementById("category-form");
        const categoryErrorElement = document.getElementById("category-error");

        categoryFormElement.addEventListener("submit", function(e) {
            e.preventDefault();

            const categoryNameElement = document.getElementById("category_name");

            let categoryNameValue = categoryNameElement.value;

            categoryErrorElement.innerText = "";
            categoryNameElement.classList.remove("is-invalid");

            if (categoryNameValue == "") {
                categoryErrorElement.innerText = "Enter the category name!";
                categoryNameElement.classList.add("is-invalid");
            } else {
                const token = document.querySelector("input[name='_token']").value;

                const data = {
                    name: categoryNameValue,
                    _token: token,
                };

                fetch("{{ route('admin.add_category') }}", {
                        method: "POST",
                        body: JSON.stringify(data),
                        headers: {
                            "Content-Type": "application/json",
                        },
                    })
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(result) {
                        if (result.categoryAlreadyExists) {
                            categoryErrorElement.innerText = result.categoryAlreadyExists;
                            categoryNameElement.classList.add("is-invalid");
                        } else {
                            categoryNameElement.value = '';

                            const newModal = document.getElementById("categoryModal");
                            newModal.classList.remove('show');
                            newModal.style.display = 'none';
                            newModal.removeAttribute('aria-modal');
                            newModal.removeAttribute('role');
                            newModal.setAttribute('aria-hidden', true);
                            document.querySelector(".modal-backdrop").remove();

                            const data = {
                                id: result,
                                _token: token,
                            };

                            fetch("{{ route('admin.fetch_categories') }}", {
                                    method: "POST",
                                    body: JSON.stringify(data),
                                    headers: {
                                        "Content-Type": "application/json",
                                    },
                                })
                                .then(function(response) {
                                    return response.json();
                                })
                                .then(function(result) {
                                    const categoryIdElement = document.getElementById('category_id');
                                    categoryIdElement.innerHTML = result;
                                });
                        }
                    });
            }
        });

        const brandFormElement = document.getElementById("brand-form");
        const brandErrorElement = document.getElementById("brand-error");

        brandFormElement.addEventListener('submit', function(e) {
            e.preventDefault();

            const brandNameElement = document.getElementById("brand_name");

            let brandNameValue = brandNameElement.value;

            brandErrorElement.innerText = "";
            brandNameElement.classList.remove("is-invalid");

            if (brandNameValue == "") {
                brandErrorElement.innerText = "Enter the brand name!";
                brandNameElement.classList.add("is-invalid");
            } else {
                const token = document.querySelector("input[name='_token']").value;

                const data = {
                    name: brandNameValue,
                    _token: token,
                };

                fetch("{{ route('admin.add_brand') }}", {
                        method: "POST",
                        body: JSON.stringify(data),
                        headers: {
                            "Content-Type": "application/json",
                        },
                    })
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(result) {
                        if (result.categoryAlreadyExists) {
                            brandErrorElement.innerText = result.categoryAlreadyExists;
                            brandNameElement.classList.add("is-invalid");
                        } else {
                            brandNameElement.value = '';

                            const newModal = document.getElementById("brandModal");
                            newModal.classList.remove('show');
                            newModal.style.display = 'none';
                            newModal.removeAttribute('aria-modal');
                            newModal.removeAttribute('role');
                            newModal.setAttribute('aria-hidden', true);
                            document.querySelector(".modal-backdrop").remove();

                            const data = {
                                id: result,
                                _token: token,
                            };

                            fetch("{{ route('admin.fetch_brands') }}", {
                                    method: "POST",
                                    body: JSON.stringify(data),
                                    headers: {
                                        "Content-Type": "application/json",
                                    },
                                })
                                .then(function(response) {
                                    return response.json();
                                })
                                .then(function(result) {
                                    const brandIdElement = document.getElementById('brand_id');
                                    brandIdElement.innerHTML = result;
                                });
                        }
                    });
            }
        });
    </script>
@endsection
