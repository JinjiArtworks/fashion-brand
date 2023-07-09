@extends('layouts.index')
@section('content')
    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-black pb-5" style="text-decoration: underline">Data Pelanggan</h1>
            <!-- This is an example component -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>

                            <th scope="col" class="px-6 py-3">
                                Nama Pelanggan
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Status Membership
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Point
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                            {{-- @if (Auth::user()->role == 'Owner')
                                <th scope="col" class="px-6 py-3">

                                </th>
                            @endif --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">
                                    {{ $item->name }}
                                </td>
                                @if ($item->membership == 'Non Active')
                                    <td class="px-6 py-4">
                                        Tidak Aktif
                                    </td>
                                @else
                                    <td class="px-6 py-4">
                                        Aktif
                                    </td>
                                @endif
                                <td class="px-6 py-4">
                                    {{ $item->point }}
                                </td>
                                @if (Auth::user()->role == 'owner')
                                    <form action="{{ route('customers.edit', ['id' => $item->id]) }}">
                                        <td class="px-6 py-4">
                                            <div class="w-5 transform hover:text-blue-500 hover:scale-110">
                                                <button type="submit"
                                                    class=" font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                    Edit
                                                </button>
                                            </div>
                                        </td>
                                    </form>
                                    <form action="{{ route('customers.delete', ['id' => $item->id]) }}">
                                        <td class="px-6 py-4">
                                            <div class=" flex w-5 transform hover:text-red-500 hover:scale-110">
                                                <button type="submit"
                                                    class=" ml-3  font-small text-red-600 dark:text-red-500 hover:underline">
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </form>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
                <p class="text-xl pb-3 flex items-center text-black-700 mx-4 mt-4">
                    Pembeli yang paling banyak bertransaksi
                </p>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>

                            <th scope="col" class="px-6 py-3">
                                Nama Pelanggan
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Status Membership
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Point
                            </th>

                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sortUser as $item)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">
                                    {{ $item->name }}
                                </td>
                                @if ($item->membership == 'Non Active')
                                    <td class="px-6 py-4">
                                        Tidak Aktif
                                    </td>
                                @else
                                    <td class="px-6 py-4">
                                        Aktif
                                    </td>
                                @endif
                                <td class="px-6 py-4">
                                    {{ $item->point }}
                                </td>
                             
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
@endsection
