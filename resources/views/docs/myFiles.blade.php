@extends('layout')

@section('title')
    My Files
@endsection

@section('content')
    <div class="px-1">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-3xl text-gray-600 font-bold p-4">My Files</h1>
        <div class="flex flex-wrap flex-1">
            @if (count($docs->documents) != 0)
                <table class="w-full text-center text-sm rtl:text-right text-gray-500 dark:text-gray-400">
                    <tbody>
                        @foreach ($docs->documents as $doc)
                            <tr class="bg-white border-b hover:bg-gray-50 text-center dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6  py-4 flex font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <img src="{{ asset('icons/file.svg') }}" class="mr-1" width="20px" alt="download">
                                    <h1 class="text-gray-600">{{ $doc->title }} file</h1>
                                </th>
                                <td class="">
                                    <a href="{{ route('explore', $doc->id) }}"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <img src="{{ asset('icons/eye.svg') }}" class="mr-1 invert" width="20px">
                                    </a>
                                    <a href="{{ route('edit', $doc->id) }}"
                                        class="text-white bg-[#f6bf3e] hover:bg-[#F7BE38]/90 focus:ring-4 focus:outline-none focus:ring-[#F7BE38]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#F7BE38]/50">
                                        <img src="{{ asset('icons/file-edit.svg') }}" class="mr-1 invert" width="20px">
                                    </a>
                                    <form class="inline" action="{{ route('delete',$doc->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this document ?')" 
                                        class="text-white bg-[#f73838] hover:bg-[#f73838]/90 focus:ring-4 focus:outline-none focus:ring-[#f73838]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#f73838]/50"
                                        >
                                        <img src="{{ asset('icons/trash.svg') }}" class="mr-1 invert" width="20px">
                                        </button>
                                    </form>

                                </td>
                            </tr>
                    </tbody>
            @endforeach
            </table>
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
