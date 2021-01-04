<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as BlogUser;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

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

    /**
     * Edit a user
     * 
     * @param int $id
     * 
     * @return View 
     */
    public function edit($id): View
    {
        $user = BlogUser::find($id);

        $data = [
            'title' => 'Edit',
            'user'  => $user,
        ];

        return view('admin.users.edit')->with($data);
    }

    /**
     * Update the user
     * 
     * @param int $id
     * @param Request $request
     * 
     * @return RedirectResponse
     */
    public function update($id, Request $request): RedirectResponse
    {
        $user = BlogUser::findOrFail($id);

        $user->name  = $request->name;
        $user->email = $request->email;
        $user->admin = $request->admin;

        $user->save();

        return redirect()->route('admin.users.edit', ['id' => $user->id])->with('status', 'User is successfully updated');
    }

    /**
     * Delete a user
     * 
     * @param int $id
     * 
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse 
    {
        $user = BlogUser::findOrFail($id);
        
        $user->delete();

        return redirect()->route('admin.users')->with('status', 'User deleted successfully');
    }
}
