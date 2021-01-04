@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold">{{ $user->name }}</h1>
<br />

@if (session('status'))
<div class="min-w-full bg-blue-400 text-white p-4 mb-4 mt-4 rounded-md alert-box">
    <p>{{ session('status') }}</p>
</div>
@endif

<form action="{{ route('admin.users.edit', ['id' => $user->id]) }}" method="POST">
    @csrf
    <div class="grid grid-cols-1">
        <div>
            <label for="name" class="block text-base font-bold text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md mb-5" value="{{ $user->name }}"/>
        </div>
        <div>
            <label for="email" class="block text-base font-bold text-gray-700">E-mail</label>
            <input type="email" name="email" id="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md mb-5" value="{{ $user->email }}"/>
        </div>
        <div>
            <fieldset>
                <legend class="text-base font-medium text-gray-900">Admin</legend>
                <div class="mt-4 space-y-4">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="admin_0" name="admin" type="radio" class="focus:ring-indigo-500 h-4 2-4 text-indigo-600 border-gray-300 rounded" value="0" {{ $user->admin == 0 ? 'checked' : '' }} />
                        </div>
                        <div class="ml-3 text-base">
                            <label for="admin_0" class="font-medium text-gray-700">No</label>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="admin_1" name="admin" type="radio" class="focus:ring-indigo-500 h-4 2-4 text-indigo-600 border-gray-300 rounded" value="1" {{ $user->admin == 1 ? 'checked' : '' }} />
                        </div>
                        <div class="ml-3 text-base">
                            <label for="admin_1" class="font-medium text-gray-700">Yes</label>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div>
            <button type="submit" class="inline-flex justify-center py-2 mt-5 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Save
            </button>
        </div>
    </div>
</form>
@endsection