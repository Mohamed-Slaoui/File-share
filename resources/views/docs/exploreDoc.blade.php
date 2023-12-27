@extends('layout')

@section('title')
    Home
@endsection

@section('content')
    <h1 class="text-3xl font-bold px-3">Document Details</h1>
    <div class="p-3 mt-4">
        <h1> - File: <span class="text-md font-thin">{{ $doc->title }}</span></h1>
        <h1> - Owner: <span class="text-md font-thin">{{ $doc->user->email }}</span></h1>
        <h1> - Category: <span class="text-md font-thin">{{ $doc->category->name }}</span></h1>
        <h1> - Downloads: <span class="text-md font-thin">{{ $doc->downloads }}</span></h1>
        <h1> - Description: <span class="text-md font-thin">{{ $doc->description }}</span></h1>
        @auth
            <form action="{{ route('download', $doc->id) }}" method="post">
                @csrf
                <button type="submit"
                    class="text-white bg-blue-700 mt-5 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3.5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Download
                    <img src="{{ asset('icons/down-to-line.svg') }}" class="invert m-1" width="15px" alt="download">
                </button>
            </form>
        @endauth
        @guest
            <div class="flex items-center mt-4 w-[40%] p-4 text-sm text-gray-800 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    To download this file please <a class="font-medium hover:underline" href="{{ route('login') }}">Login</a>
                </div>
            </div>
        @endguest
    </div>
@endsection
