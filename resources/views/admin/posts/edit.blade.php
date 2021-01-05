@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold">{{ $post->title }}</h1>
<br />

@if (session('status'))
<div class="min-w-full bg-blue-400 text-white p-4 mb-4 mt-4 rounded-md alert-box">
    <p>{{ session('status') }}</p>
</div>
@endif

<form action="{{ route('admin.posts.edit', ['id' => $post->id]) }}" method="POST">
    @csrf
    <div class="grid grid-cols-1">
        <fieldset>
                <legend class="text-base font-medium text-gray-900">Online</legend>
                <div class="mt-4 space-y-4">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="online_0" name="online" type="radio" class="focus:ring-indigo-500 h-4 2-4 text-indigo-600 border-gray-300 rounded" value="0" {{ !$post->online ? 'checked' : '' }} />
                        </div>
                        <div class="ml-3 text-base">
                            <label for="online_0" class="font-medium text-gray-700">No</label>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="online_1" name="online" type="radio" class="focus:ring-indigo-500 h-4 2-4 text-indigo-600 border-gray-300 rounded" value="1" {{ $post->online ? 'checked' : '' }} />
                        </div>
                        <div class="ml-3 text-base">
                            <label for="online_1" class="font-medium text-gray-700">Yes</label>
                        </div>
                    </div>
                </div>
            </fieldset>
        <div>
            <label for="name" class="block text-base font-bold text-gray-700 mt-4 mb-2">Title</label>
            <input type="text" name="title" id="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md mb-4" value="{{ $post->title }}" />
        </div>
         <div>
            <label for="body" class="block text-base font-bold text-gray-700 mb-2">Body</label>
            <textarea name="body" id="body" class="ckeditor">
                {{ $post->body }}
            </textarea>
        </div>
        <div>
            <button type="submit" class="inline-flex justify-center py-2 mt-5 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Save
            </button>
        </div>
    </div>
</form>
@endsection