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
        <h1 class="text-3xl text-gray-600 font-bold p-4">All Documents</h1>
        <div class="flex flex-wrap flex-1">
            @if (count($docs) != 0)
                @foreach ($docs as $doc)
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
                    <span class="font-medium"></span> No files with this category were found
                </div>
            @endif
        </div>
        @if (request()->is('/') || request()->is('doc') )
        <hr class=" text-gray-600 font-bold my-4" />
            <div>
                <h1 class="text-3xl text-gray-600 font-bold pt-4 p-4">Recently added</h1>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-3 text-center py-3">
                                    Document
                                </th>
                                <th scope="col" class="px-3 text-center py-3">
                                    Date
                                </th>
                                <th scope="col" class="px-3 text-center py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-3 text-center py-3">
                                    Owned
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recents as $recent)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-3 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <a href="{{ route('explore', $recent->id) }}"
                                            class="hover:underline">{{ $recent->title }}</a>
                                    </th>
                                    <td class="px-3 text-center py-4">
                                        {{ $recent->created_at->format('d-m-Y') }}
                                    </td>
                                    <td class="px-3 text-center py-4">
                                        {{ $recent->category->name }}
                                    </td>
                                    <td class="px-3 text-center py-4">
                                        {{ $recent->user->email }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
    </div>

    <script>
    @endsection
