@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold">Categories overview</h1>
<br />


<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-m font-medium text-gray-500 uppercase tracking-wider">#</th>
            <th scope="col" class="px-6 py-3 text-left text-m font-medium text-gray-500 uppercase tracking-wider">Name</th>
            <th scope="col" class="px-6 py-3 text-left text-m font-medium text-gray-500 uppercase tracking-wider">&nbsp;</th>
            <th scope="col" class="px-6 py-3 text-left text-m font-medium text-gray-500 uppercase tracking-wider">&nbsp;</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @if (count($categories) > 0)
            @foreach ($categories as $category)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $category->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $category->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md text-m font-medium text-black bg-yellow-500 hover:bg-yellow-600"><i class="fas fa-pencil-alt mr-2"></i>Edit</a>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('admin.categories.delete', ['id' => $category->id]) }}" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md text-m font-medium text-white bg-red-500 hover:bg-red-600"><i class="fas fa-trash mr-2"></i>Delete</a>
                </td>
            </tr>
            @endforeach
        @else 
            <tr>
                <td colspan="4" class="italic px-6 py-4 whitespace-nowrap text-gray-500">No categories found, try <a class="text-indigo-600 underline" href="{{ route('admin.categories.create') }}">creating</a> one!</td>
            </tr>
        @endif
    </tbody>
</table>
@endsection