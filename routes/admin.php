<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\User;
use App\Http\Controllers\Admin\Category;

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
    Route::get('/admin/categories/edit/{id}', [Category::class, 'edit'])->name('admin.categories.edit');
    Route::get('/admin/categories/delete/{id}', [Category::class, 'delete'])->name('admin.categories.delete');
});