@extends('layout')

@section('title')
    Home
@endsection

@section('content')
    <div class="px-1">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">Success alert!</span>{{ session('success') }}
            </div>
        @endif
        <h1 class="text-3xl text-center text-gray-600 py-4">Documents</h1>
        <div class="flex flex-wrap flex-1">
            @foreach ($docs as $doc)
                <div class="m-1 border flex flex-col space-y-2 justify-center items-center rounded p-2 h-fit w-32 text-center">
                    <h1 class="text-gray-500">{{ $doc->title }}</h1>
                    <h1>Downloads: {{ $doc->downloads }}</h1>
                    @auth
                        <form action="{{ route('download',$doc->id) }}" method="post">
                            @csrf
                            <button
                                type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Download</button>
                        </form>
                    @endauth
                </div>
            @endforeach
        </div>

    </div>
    </div>

    <script>
@endsection
