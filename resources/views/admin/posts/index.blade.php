@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold">Posts overview</h1>
<br />

@if (session('status'))
<div class="min-w-full bg-blue-400 text-white p-4 mb-4 mt-4 rounded-md alert-box">
    <p>{{ session('status') }}</p>
</div>
@endif

<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-m font-medium text-gray-500 uppercase tracking-wider">Online</th>
            <th scope="col" class="px-6 py-3 text-left text-m font-medium text-gray-500 uppercase tracking-wider">Title</th>
            <th scope="col" class="px-6 py-3 text-left text-m font-medium text-gray-500 uppercase tracking-wider">Author</th>
            <th scope="col" class="px-6 py-3 text-left text-m font-medium text-gray-500 uppercase tracking-wider">&nbsp;</th>
            <th scope="col" class="px-6 py-3 text-left text-m font-medium text-gray-500 uppercase tracking-wider">&nbsp;</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @if (count($posts) > 0)
            @foreach ($posts as $post)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap"><i class="fas fa-circle {{ $post->online ? 'text-green-500' : 'text-red-500' }}"></i></td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $post->title }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $post->author->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('admin.categories.edit', ['id' => $post->id]) }}" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md text-m font-medium text-black bg-yellow-500 hover:bg-yellow-600"><i class="fas fa-pencil-alt mr-2"></i>Edit</a>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('admin.categories.delete', ['id' => $post->id]) }}" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md text-m font-medium text-white bg-red-500 hover:bg-red-600"><i class="fas fa-trash mr-2"></i>Delete</a>
                </td>
            </tr>
            @endforeach
        @else 
            <tr>
                <td colspan="4" class="italic px-6 py-4 whitespace-nowrap text-gray-500">No posts found, try <a class="text-indigo-600 underline" href="{{ route('admin.categories.create') }}">creating</a> one!</td>
            </tr>
        @endif
    </tbody>
</table>

@endsection