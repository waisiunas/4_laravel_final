<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class DynamicController extends Controller
{
    public function add_category()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $is_already_exists = Category::whereName($data['name'])->first();

        if ($is_already_exists) {
            return json_encode([
                'categoryAlreadyExists' => 'Category already exists!',
            ]);
        } else {
            $data = [
                'name' => $data['name'],
            ];

            $is_created = Category::create($data);

            return json_encode($is_created->id);
        }
    }

    public function fetch_categories()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $categories = Category::all();
        $output = '<option value="-1"> &#43; Add New Category </option> <option value="" selected>Select category</option>';
        foreach ($categories as $category) {
            if ($category->id == $data['id']) {
                $output .= '<option value="' . $category->id . '" selected>' . $category->name . '</option>';
            } else {
                $output .= '<option value="' . $category->id . '">' . $category->name . '</option>';
            }
        }

        return json_encode($output);
    }

    public function add_brand()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $is_already_exists = Brand::whereName($data['name'])->first();

        if ($is_already_exists) {
            return json_encode([
                'categoryAlreadyExists' => 'Brand name already exists!',
            ]);
        } else {
            $data = [
                'name' => $data['name'],
            ];

            $is_created = Brand::create($data);

            return json_encode($is_created->id);
        }
    }

    public function fetch_brands()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $brands = Brand::all();
        $output = '<option value="-1"> &#43; Add New Brand </option> <option value="" selected>Select brand</option>';
        foreach ($brands as $brand) {
            if ($brand->id == $data['id']) {
                $output .= '<option value="' . $brand->id . '" selected>' . $brand->name . '</option>';
            } else {
                $output .= '<option value="' . $brand->id . '">' . $brand->name . '</option>';
            }
        }

        return json_encode($output);
    }
}
