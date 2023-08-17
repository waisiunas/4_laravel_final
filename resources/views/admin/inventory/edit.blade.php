@extends('layouts.admin.main')

@section('title', 'Edit Inventory')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Edit Inventory</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.inventory') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            <form action="{{ route('admin.inventory.edit_quantity', $inventory) }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="damaged_quantity" class="form-label">Damaged Qunatity</label>
                                    <input type="number" name="damaged_quantity" id="damaged_quantity"
                                        class="form-control @error('damaged_quantity') is-invalid @enderror"
                                        placeholder="Enter damaged quantity! Should be less than {{ $inventory->current_quantity + 1 }}">
                                    @error('damaged_quantity')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <input type="submit" value="Update Quantity" class="btn btn-primary">
                                </div>
                            </form>

                            <form action="{{ route('admin.inventory.edit_location', $inventory) }}" class="mt-3"
                                method="POST">
                                @csrf

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="wall" class="form-label">Wall</label>
                                            <select class="form-select @error('wall') is-invalid @enderror" name="wall"
                                                id="wall">
                                                <option value="" selected>Select a Wall No.</option>

                                                @if (old('wall'))
                                                    @foreach ($walls as $wall)
                                                        @if (old('wall') == $wall)
                                                            <option value="{{ $wall }}" selected>{{ $wall }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $wall }}">{{ $wall }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @foreach ($walls as $wall)
                                                        @if ($inventory->wall_no == $wall)
                                                            <option value="{{ $wall }}" selected>{{ $wall }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $wall }}">{{ $wall }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @endif

                                            </select>
                                            @error('wall')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="section" class="form-label">Section</label>
                                            <select class="form-select @error('section') is-invalid @enderror"
                                                name="section" id="section">
                                                <option value="" selected>Select a Section </option>

                                                @if (old('section'))
                                                    @foreach ($sections as $section)
                                                        @if (old('section') == $section)
                                                            <option value="{{ $section }}" selected>
                                                                {{ $section }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $section }}">{{ $section }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @foreach ($sections as $section)
                                                        @if ($inventory->section == $section)
                                                            <option value="{{ $section }}" selected>
                                                                {{ $section }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $section }}">{{ $section }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @endif

                                            </select>
                                            @error('section')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="rack" class="form-label">Rack</label>
                                            <select class="form-select @error('rack') is-invalid @enderror" name="rack"
                                                id="rack">
                                                <option value="" selected>Select a Rack</option>

                                                @if (old('rack'))
                                                    @foreach ($racks as $rack)
                                                        @if (old('rack') == $rack)
                                                            <option value="{{ $rack }}" selected>
                                                                {{ $rack }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $rack }}">{{ $rack }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @foreach ($racks as $rack)
                                                        @if ($inventory->rack_no == $rack)
                                                            <option value="{{ $rack }}" selected>
                                                                {{ $rack }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $rack }}">{{ $rack }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @endif

                                            </select>
                                            @error('wall')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="shelf" class="form-label">Shelf</label>
                                            <select class="form-select @error('shelf') is-invalid @enderror" name="shelf"
                                                id="shelf">
                                                <option value="" selected>Select a Shelf No.</option>

                                                @if (old('shelf'))
                                                    @foreach ($shelves as $shelf)
                                                        @if (old('shelf') == $shelf)
                                                            <option value="{{ $shelf }}" selected>
                                                                {{ $shelf }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $shelf }}">{{ $shelf }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @foreach ($shelves as $shelf)
                                                        @if ($inventory->shelf_no == $shelf)
                                                            <option value="{{ $shelf }}" selected>
                                                                {{ $shelf }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $shelf }}">{{ $shelf }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @endif

                                            </select>
                                            @error('shelf')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <input type="submit" value="Update Location" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

@section('script')
    <script>
        document.getElementById("type").addEventListener("change", function() {
            const piecesPerBundleMainElement = document.querySelector(
                "#pieces_per_bundle_main"
            );
            const selectedValue = this.value;
            if (selectedValue === "Bundle") {
                piecesPerBundleMainElement.classList.remove("d-none");
            } else {
                piecesPerBundleMainElement.classList.add("d-none");
            }
        });
    </script>
@endsection
