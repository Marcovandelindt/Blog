<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\User;
use App\Http\Controllers\Admin\Category;
use App\Http\Controllers\Admin\Post;

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [Dashboard::class, 'index'])->name('admin.dashboard');

    # User Routes
    Route::get('/admin/users', [User::class, 'index'])->name('admin.users');

    Route::get('/admin/users/edit/{id}', [User::class, 'edit'])->name('admin.users.edit');
    Route::post('/admin/users/edit/{id}', [User::class, 'update']);

    Route::get('/admin/users/delete/{id}', [User::class, 'delete'])->name('admin.users.delete');

    # Category Routes
    Route::get('/admin/categories', [Category::class, 'index'])->name('admin.categories');
    Route::get('/admin/categories/create', [Category::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories/create', [Category::class, 'store']);
    Route::get('/admin/categories/edit/{id}', [Category::class, 'edit'])->name('admin.categories.edit');
    Route::post('/admin/categories/edit/{id}', [Category::class, 'postEdit']);
    Route::get('/admin/categories/delete/{id}', [Category::class, 'delete'])->name('admin.categories.delete');

    # Post routes
    Route::get('/admin/posts', [Post::class, 'index'])->name('admin.posts');
    Route::get('/admin/posts/create', [Post::class, 'create'])->name('admin.posts.create');
    Route::post('/admin/posts/create', [Post::class, 'store']);
    Route::get('/admin/posts/edit/{id}', [Post::class, 'edit'])->name('admin.posts.edit');
    Route::post('/admin/posts/edit/{id}', [Post::class, 'update']);
    Route::get('/admin/posts/delete/{id}', [Post::class, 'delete'])->name('admin.posts.delete');
});