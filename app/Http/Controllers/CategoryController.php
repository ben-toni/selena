<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\PaginationCollection;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        //'filters' => $request->all('search', 'trashed') tbd

        return Inertia::render('Category/Index', [
            'categories' => new PaginationCollection(Category::paginate(), CategoryResource::class),
            'create_url' => route('category.create'),
        ]);
    }

    public function create()
    {
        return Inertia::render('Category/Create', ['store_url' => route('category.store')]);
    }

    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description
        ];

        Category::create($data);

        return redirect()->back()->with('message', 'Category Created Successfully.');
    }

    public function edit(Category $category)
    {
        return Inertia::render('Category/Edit', [
            'category' => new CategoryResource($category)
        ]);
    }

    public function update(Category $category, Request $request)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description
        ];

        $category->update($data);

        return redirect()->back()->with('message', 'Category Updated Successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();


        return redirect()->back();
    }
}
