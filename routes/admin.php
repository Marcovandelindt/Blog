<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Dashboard;

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [Dashboard::class, 'index'])->name('admin.dashboard');
});