<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Post as BlogPost;

class Post extends Controller
{
    /**
     * Index action
     * 
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $posts = BlogPost::all();

        $data = [
            'title' => 'Posts',
            'posts' => $posts,
        ];

        return view('admin.posts.index')->with($data);
    }
}
