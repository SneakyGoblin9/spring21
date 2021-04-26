<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create(['name' => $request->name]);
        return response("success", 204);
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update(['name' => $request->name]);
        return response("success", 204);
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return response("success", 204);
    }
}
