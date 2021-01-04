<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category as BlogCategory;
use Illuminate\Http\RedirectResponse;

class Category extends Controller
{
    /**
     * Index action
     * 
     * @return View
     */
    public function index(): View
    {
        $categories = BlogCategory::all();

        $data = [
            'title'      => 'Categories',
            'page'       => 'categories',
            'categories' => $categories,
        ];

        return view('admin.categories.index')->with($data);
    }

    /**
     * Return view to create a category
     * 
     * @return View
     */
    public function create(): View
    {
        $data = [
            'title' => 'Create Category'
        ];

        return view('admin.categories.create')->with($data);
    }

    /**
     * Store a category
     * 
     * @param \App\Http\Requests\StoreCategoryRequest
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCategoryRequest $request): RedirectResponse 
    {
        $category = new BlogCategory();

        $category->name = $request->name;

        $category->save();

        return redirect()->route('admin.categories')->with('status', 'Category successfully created');
    }
}
