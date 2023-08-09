<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.brand.index', [
            'brands' => Brand::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:brands,name'],
        ]);

        $data = [
            'name' => $request->name,
        ];

        $is_created = Brand::create($data);

        $is_created ? $message = ['success' => 'Magic has been spelled!'] : $message = ['failure' => 'Magic has become shopper!'];

        return back()->with($message);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', [
            'brand' => $brand,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => ['required', 'unique:categories,name,' . $brand->id . ',id'],
        ]);

        $data = [
            'name' => $request->name,
        ];

        $is_updated = $brand->update($data);

        $is_updated ? $message = ['success' => 'Magic has been spelled!'] : $message = ['failure' => 'Magic has become shopper!'];

        return back()->with($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $is_deleted = $brand->delete();

        $is_deleted ? $message = ['success' => 'Magic has been spelled!'] : $message = ['failure' => 'Magic has become shopper!'];

        return back()->with($message);
    }
}
