@extends('template.base')

@section('content')
<form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="px-4 mt-12">
        <div class="mt-2 mb-4">
            <p class="text-2xl text-gray-800">Add new promotion</p>
            @if (session('success'))
            <div class="bg-green-500 text-white text-sm font-medium px-4 py-3 rounded-md mb-4">
                {{ session('success') }}
            </div>
            @endif
        </div>
        <div class="mb-5">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter title...">
            @if ($errors->has('title'))
                <p class="text-sm text-red-500">{{ $errors->first('title') }}</p>
            @endif
        </div>
        
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
        <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter description...">{{ old('description') }}</textarea>
        @if ($errors->has('description'))
            <p class="text-sm text-red-500">{{ $errors->first('description') }}</p>
        @endif
        <br>
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload photo file</label>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="image" name="image" type="file">
        @if ($errors->has('image'))
            <p class="text-sm text-red-500">{{ $errors->first('image') }}</p>
        @endif
        <br>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </div>
</form>
@endsection