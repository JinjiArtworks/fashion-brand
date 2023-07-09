@extends('layouts.index')
@section('content')
    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-black pb-5" style="text-decoration: underline">Data Produk</h1>
            <!-- This is an example component -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
                <a href="/create-product" class="hover:text-blue-500">
                    <p class="text-md pb-3 flex items-center ml-5 text-green-700 underline">
                        <i class="fa fa-plus mr-3 text-green-700"></i> Tambah Data Produk
                    </p>
                </a>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Gambar
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Produk
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jenis
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tipe
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Brand Produk
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Stock
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Terjual
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Dimension
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga Produk
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                            <th scope="col" class="px-6 py-3">

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    <img src="{{ asset('img/' . $item->image) }}" width="150px" alt="">
                                </th>
                                <td class="px-6 py-4">
                                    {{ $item->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->categories->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->jenis->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->tipe->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->brand }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->stock }}
                                </td>
                               
                                <td class="px-6 py-4">
                                    {{ $item->terjual }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->dimension }}
                                </td>
                                <td class="px-6 py-4">
                                    @currency($item->price)

                                </td>
                                <form action="{{ route('staff.edit', ['id' => $item->id]) }}">
                                    <td class="px-6 py-4">
                                        <div class="w-5 transform hover:text-blue-500 hover:scale-110">
                                            <button type="submit"
                                                class=" font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                Ubah
                                            </button>
                                        </div>
                                    </td>
                                </form>
                                <form method="GET" action="{{ route('staff.delete', ['id' => $item->id]) }}">
                                    <td class="px-6 py-4">
                                        <div class="w-5 transform hover:text-blue-500 hover:scale-110">
                                            <button type="submit"
                                                class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </form>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10 ">
                <p class="text-xl pb-3 flex items-center text-black-700 mx-4 mt-4">
                    3 Produk Terlaris
                </p>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Gambar
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Produk

                            <th scope="col" class="px-6 py-3">
                                Terjual
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Harga Produk
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sort3 as $item)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    <img src="{{ asset('img/' . $item->image) }}" width="150px" alt="">
                                </th>
                                <td class="px-6 py-4">
                                    {{ $item->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->terjual }}
                                </td>

                                <td class="px-6 py-4">
                                    @currency($item->price)

                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </main>
    </div>
@endsection
