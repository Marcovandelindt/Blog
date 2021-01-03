@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold">User's overview</h1>
<br />

<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-m font-medium text-gray-500 uppercase tracking-wider">#</th>
            <th scope="col" class="px-6 py-3 text-left text-m font-medium text-gray-500 uppercase tracking-wider">Name</th>
            <th scope="col" class="px-6 py-3 text-left text-m font-medium text-gray-500 uppercase tracking-wider">E-mail</th>
            <th scope="col" class="px-6 py-3 text-left text-m font-medium text-gray-500 uppercase tracking-wider">Role</th>
            <th scope="col" class="px-6 py-3 text-left text-m font-medium text-gray-500 uppercase tracking-wider">&nbsp;</th>
            <th scope="col" class="px-6 py-3 text-left text-m font-medium text-gray-500 uppercase tracking-wider">&nbsp;</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($users as $user)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $user->admin ? 'Admin' : 'User' }}</td>
            <td class="px-6 py-4 whitespace-nowrap">
                <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md text-m font-medium text-black bg-yellow-500 hover:bg-yellow-600"><i class="fas fa-pencil-alt mr-2"></i>Edit</a>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <a href="{{ route('admin.users.delete', ['id' => $user->id]) }}" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md text-m font-medium text-white bg-red-500 hover:bg-red-600"><i class="fas fa-trash mr-2"></i>Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection