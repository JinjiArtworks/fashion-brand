@extends('layouts.customer')
@section('content')
    @if ($cart == null)
        <div class="wrap-iten-in-cart">
            <div class="container-fluid ">
                <div class="row">
                    <div class="card-body cart">
                        <div class="col-sm-12 empty-cart-cls text-center">
                            <h4><strong>Keranjang Kosong</strong></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        {{-- {{ dd($cart) }} --}}
        @foreach ($cart as $key => $c)
            <form method="POST" action="{{ route('checkout.index') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-span-12 space-y-4">
                    <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                        <div class="w-28">
                            <img src="{{ $c['image'] }}" alt="product 6" class="w-full">
                        </div>
                        <div class="w-1/3">
                            <h2 class="text-gray-800 text-xl font-medium uppercase">{{ $c['name'] }}</h2>
                            <p class="text-gray-500 text-sm">@currency($c['price'])</p>
                            <div class="text-primary text-lg font-semibold"></div>
                        </div>
                        <div class="w-1/3">
                            <p class="text-gray-800 text-sm ">x{{ $c['quantity'] }}</p>
                        </div>
                        <div class="text-primary text-lg font-semibold">@currency($c['total_after_disc'])</div>
                    </div>
                </div>
                <div class="flex justify-end mx-12 my-12">
                    <button type="submit"
                        class="px-6 py-2 text-center text-sm text-white bg-primary border border-primary 
                    rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">Checkout</button>
                </div>
            </form>
        @endforeach
    @endif
@endsection
`