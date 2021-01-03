<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\User;

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [Dashboard::class, 'index'])->name('admin.dashboard');

    # User Routes
    Route::get('/admin/users', [User::class, 'index'])->name('admin.users');
    Route::get('/admin/users/edit/{id}', [User::class, 'edit'])->name('admin.users.edit');
    Route::get('/admin/users/delete/{id}', [User::class, 'delete'])->name('admin.users.delete');
});