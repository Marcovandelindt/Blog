@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold">Create a new category</h1>
<br />

<form action="{{ route('admin.posts.create') }}" method="POST">
    @csrf
    <div class="grid grid-cols-1">
         <fieldset>
                <legend class="text-base font-medium text-gray-900">Online</legend>
                <div class="mt-4 space-y-4">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="online_0" name="online" type="radio" class="focus:ring-indigo-500 h-4 2-4 text-indigo-600 border-gray-300 rounded" value="0" />
                        </div>
                        <div class="ml-3 text-base">
                            <label for="online_0" class="font-medium text-gray-700">No</label>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="online_1" name="online" type="radio" class="focus:ring-indigo-500 h-4 2-4 text-indigo-600 border-gray-300 rounded" value="1" />
                        </div>
                        <div class="ml-3 text-base">
                            <label for="online_1" class="font-medium text-gray-700">Yes</label>
                        </div>
                    </div>
                </div>
            </fieldset>
        <div>
            <label for="name" class="block text-base font-bold text-gray-700 mt-4 mb-2">Title</label>
            <input type="text" name="title" id="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md mb-4" />
        </div>
         <div>
            <label for="body" class="block text-base font-bold text-gray-700 mb-2">Body</label>
            <textarea name="body" id="body" class="ckeditor"></textarea>
        </div>
         <div class="mt-4">
            <div class="flex flex-col">
                <p class="text-lg font-bold">Categories</p>
                @if (!empty($categories))
                    @foreach ($categories as $category)
                    <label class="inline-flex items-center mt-3">
                        <input type="checkbox" name="categories[]" class="form-checkbox h-5 w-5 text-gray-600" value="{{ $category->id }}">
                        <span class="ml-2 text-gray-700">
                            {{ $category->name }}
                        </span>
                    </label>
                    @endforeach
                @endif
            </div>       
        </div>
        <div>
            <button type="submit" class="inline-flex justify-center py-2 mt-5 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Save
            </button>
        </div>
    </div>
</form>
@endsection 