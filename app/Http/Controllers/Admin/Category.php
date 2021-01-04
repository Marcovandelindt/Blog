<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\Category as BlogCategory;

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
}
