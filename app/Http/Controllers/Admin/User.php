<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as BlogUser;

class User extends Controller
{
    /**
     * Index action
     * 
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $users = BlogUser::all();

        $data = [
            'title' => 'Users',
            'users' => $users,
        ];

        return view('admin.users.index')->with($data);
    }
}
