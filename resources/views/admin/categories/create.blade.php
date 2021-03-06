@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold">Create a new category</h1>
<br />

<form action="{{ route('admin.categories.create') }}" method="POST">
    @csrf
    <div class="grid grid-cols-1">
        <div>
            <label for="name" class="block text-base font-bold text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
        </div>
        <div>
            <button type="submit" class="inline-flex justify-center py-2 mt-5 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Save
            </button>
        </div>
    </div>
</form>
@endsection 