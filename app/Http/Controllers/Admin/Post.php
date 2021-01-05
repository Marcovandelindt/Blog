<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\StorePostRequest;
use App\Http\Controllers\Controller;
use App\Models\Post as BlogPost;
use App\Models\Category;

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
            'title'      => 'Posts',
            'posts'      => $posts,
        ];

        return view('admin.posts.index')->with($data);
    }

    /**
     * Show the create view
     * 
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        $categories = Category::all();

        $data = [
            'title'      => 'Create post',
            'categories' => $categories,
        ];

        return view('admin.posts.create')->with($data);
    }

    /**
     * Store a new post
     * 
     * @param \Illuminate\Http\Request
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse 
    {
       if (!empty($request->title) && !empty($request->body)) {
            $post            = new BlogPost();
            $post->online    = $request->online;
            $post->title     = $request->title;
            $post->body      = $request->body;
            $post->slug      = Str::slug($post->title);
            $post->author_id = Auth::user()->id;

            if (!empty($request->categories)) {
                $post->save();
                $post->categories()->sync($request->categories);
                $message = 'Post successfully edited';
            } else {
                $message = 'No category selected';
            }

            return redirect()->route('admin.posts')->with('status', 'Post successfully created');
       }
    }

    /**
     * Show the edit view of a post
     * 
     * @param int $id
     * 
     * @return \Illuminate\View\View
     */
    public function edit($id): View 
    {
        $post = BlogPost::findOrFail($id);

        $categories = Category::all();

        $data = [
            'title' => 'Edit ' . $post->title,
            'post'  => $post,
            'categories' => $categories,
        ];

        return view('admin.posts.edit')->with($data);
    }

    /**
     * Store the edited post
     * 
     * @param int $id
     * @param \App\Http\Requests\StorePostRequest
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request): RedirectResponse 
    {
        $post = BlogPost::findOrFail($id);

        $post->online    = $request->online;
        $post->title     = $request->title;
        $post->body      = $request->body;
        $post->slug      = Str::slug($post->title);
        $post->author_id = Auth::user()->id;

        if (!empty($request->categories)) {
            $post->categories()->sync($request->categories);
            $post->save();
            $message = 'Post successfully edited';
        } else {
            $message = 'No category selected';
        }

        return redirect()->route('admin.posts.edit', ['id' => $post->id])->with('status', $message);
    }

    /**
     * Delete a post
     * 
     * @param int $id
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id): RedirectResponse 
    {
        $post = BlogPost::findOrFail($id);
        
        $post->delete();

        return redirect()->route('admin.users')->with('status', 'Post deleted successfully');
    }
}
