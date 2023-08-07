<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:categories,name'],
        ]);

        $data = [
            'name' => $request->name,
        ];

        $is_created = Category::create($data);

        $is_created ? $message = ['success' => 'Magic has been spelled!'] : $message = ['failure' => 'Magic has become shopper!'];

        return back()->with($message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required', 'unique:categories,name,' . $category->id . ',id'],
        ]);

        $data = [
            'name' => $request->name,
        ];

        $is_updated = $category->update($data);

        $is_updated ? $message = ['success' => 'Magic has been spelled!'] : $message = ['failure' => 'Magic has become shopper!'];

        return back()->with($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $is_deleted = $category->delete();

        $is_deleted ? $message = ['success' => 'Magic has been spelled!'] : $message = ['failure' => 'Magic has become shopper!'];

        return back()->with($message);
    }
}
