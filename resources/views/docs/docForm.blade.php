@extends('layout')

@section('title')
    Upload Doc
@endsection

@section('content')
    <div class="px-1 flex justify-center items-center flex-1">
        <form action="{{ route('upload') }}" method="POST" class="w-96 h-fit border flex flex-col p-5 rounded-lg" enctype="multipart/form-data">
            @csrf

            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" name="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="title" value="{{ old('title') }}">

                @error('title')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!
                        </span>{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="desc"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>

                <textarea name="description" id="desc" cols="30" rows="10"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('description') }}</textarea>

                @error('description')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!
                        </span>{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="cat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <select id="cat" name="category_id"
                    class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option>--select category---</option>
                    @foreach ($cats as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>

                @error('category_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!
                        </span>{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">

                <label class="block text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                    file</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="file_input" name="path" type="file">


                @error('path')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!
                        </span>{{ $message }}</p>
                @enderror
            </div>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="downloads" value="0">

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Upload</button>
        </form>
    </div>
@endsection
