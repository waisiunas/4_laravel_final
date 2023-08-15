<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class DynamicController extends Controller
{
    public function add_category()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $data = [
            'name' => $data['name'],
        ];

        $is_created = Category::create($data);

        return json_encode($is_created->id);
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
}
