@extends('layout')

@section('title')
    My Files
@endsection

@section('content')
    <div class="px-1">
        
        <h1 class="text-3xl text-gray-600 font-bold p-4">My Files</h1>
        <div class="flex flex-wrap flex-1">
            @if (count($docs->documents) != 0)
                @foreach ($docs->documents as $doc)
                    <a href="{{ route('explore', $doc->id) }}"
                        class="m-1 border flex flex-col space-y-2 justify-center items-center rounded hover:bg-gray-50 p-2 h-32 w-32 text-center">
                        <img src="{{ asset('icons/file.svg') }}" class=" m-1" width="55px" alt="download">
                        <h1 class="text-gray-600">{{ $doc->title }} file</h1>
                        {{-- <h1>Downloads: {{ $doc->downloads }}</h1> --}}
                    </a>
                @endforeach
            @else
                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                    role="alert">
                    <span class="font-medium"></span> You have not upload any files yet !
                </div>
            @endif
        </div>

    </div>
    </div>

    <script>
    @endsection
