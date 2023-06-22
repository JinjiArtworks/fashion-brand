@extends('layouts.customer')
@section('content')
    <!-- banner -->
    <div class="bg-cover bg-no-repeat bg-center py-36" style="background-image: url('assets/images/banner-bg.jpg');">
        <div class="container">
            <h1 class="text-6xl text-gray-800 font-medium mb-4 capitalize">
                best collection for <br> home decoration
            </h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam <br>
                accusantium perspiciatis, sapiente
                magni eos dolorum ex quos dolores odio</p>
            <div class="mt-12">
                <a href="#"
                    class="bg-primary border border-primary text-white px-8 py-3 font-medium 
                    rounded-md hover:bg-transparent hover:text-primary">Shop
                    Now</a>
            </div>
        </div>
    </div>
    <!-- ./banner -->

    <!-- new arrival -->
    <div class="container pb-16 ">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6 mt-10">top new arrival</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach ($products as $item)
                <div class="bg-white shadow rounded overflow-hidden group">
                    <div class="relative">
                        <img src="assets/images/products/product1.jpg" alt="product 1" class="w-full">
                    </div>
                    <div class="pt-4 pb-3 px-4">
                        <a href="#">
                            <h4 class=" font-medium text-xl text-gray-800 hover:text-primary transition">
                                {{ $item->name }}</h4>
                        </a>
                        <p class="text-sm text-gray-500 transition  mb-3">{{ $item->description }}
                            <br>
                            <small>Stock : {{ $item->stock }} pcs</small>
                        </p>
                        <div class="flex items-baseline mb-1 space-x-2">
                            <p class="text-xl text-primary font-semibold">@currency($item->price)</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- ./new arrival -->

    <!-- ads -->
    <div class="container pb-16">
        <a href="#">
            <img src="assets/images/offer.jpg" alt="ads" class="w-full">
        </a>
    </div>
    <!-- ./ads -->

    <!-- product -->
    <div class="container pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">recomended for you</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach ($products as $item)
                <div class="bg-white shadow rounded overflow-hidden group">
                    <div class="relative">
                        <img src="assets/images/products/product1.jpg" alt="product 1" class="w-full">
                    </div>
                    <div class="pt-4 pb-3 px-4">
                        <a href="#">
                            <h4 class=" font-medium text-xl text-gray-800 hover:text-primary transition">
                                {{ $item->name }}</h4>
                        </a>
                        <p class="text-sm text-gray-500 transition  mb-3">{{ $item->description }}
                            <br>
                            <small>Stock : {{ $item->stock }} pcs</small>
                        </p>
                        <div class="flex items-baseline mb-1 space-x-2">
                            <p class="text-xl text-primary font-semibold">@currency($item->price)</p>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>
    </div>
    <!-- ./product -->
@endsection
