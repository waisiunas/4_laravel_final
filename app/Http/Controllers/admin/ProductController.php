<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index', [
            'products' => Product::with(['category', 'brand'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create', [
            'categories' => Category::all(),
            'brands' => Brand::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => ['required'],
            'brand_id' => ['required'],
            'name' => ['required'],
            'description' => ['required'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg'],
        ]);

        $new_name = "INV_PRO" . microtime(true) . "." . $request->image->extension();

        if ($request->image->move(public_path('template/img/products'), $new_name)) {
            $data = [
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'name' => $request->name,
                'description' => $request->description,
                'image' => $new_name,
            ];

            $is_created = Product::create($data);

            $message = $is_created ? ['success' => 'Magic has been spelled!'] : ['failure' => 'Magic has become a shopper!'];

            return back()->with($message);
        } else {
            return back()->withErrors([
                'image' => 'Image could not upload!',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
