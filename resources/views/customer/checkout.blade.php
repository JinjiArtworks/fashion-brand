@extends('layouts.customer')
@section('content')
    <!-- wrapper -->
    <form method="POST" action="{{ route('checkout.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="container grid grid-cols-12 items-start pb-16 pt-4 gap-6">
            <div class="col-span-8 border border-gray-200 p-4 rounded">
                <h3 class="text-lg font-medium capitalize mb-4">Checkout</h3>
                <div class="space-y-4">
                    <div>
                        <label for="name" class="text-gray-600">First Name <span class="text-primary">*</span></label>
                        <input type="text" name="name" id="name" class="input-box">
                    </div>
                    <div>
                        <label for="address" class="text-gray-600">Address</label>
                        <input type="text" name="address" id="address" class="input-box">
                    </div>
                    <div>
                        <label for="phone" class="text-gray-600">Phone</label>
                        <input type="text" name="phone" id="phone" class="input-box">
                    </div>
                </div>
            </div>

            <div class="col-span-4 border border-gray-200 p-4 rounded">
                <h4 class="text-gray-800 text-lg mb-4 font-medium uppercase">Order summary</h4>
                @foreach ($cart as $key => $c)
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <div>
                                <h5 class="text-gray-800 font-medium">{{ $c['name'] }}</h5>
                                <p class="text-sm text-gray-600">Size: {{ $c['dimension'] }}</p>
                            </div>
                            <p class="text-gray-600">
                                x{{ $c['quantity'] }}
                            </p>
                            <p class="text-gray-800 font-medium">@currency($c['total_after_disc'])</p>
                        </div>
                    </div>
                @endforeach

                <div class="flex justify-between border-b border-gray-200 mt-1 text-gray-800 font-medium py-3 uppercas">
                    <p>subtotal</p>
                    <p>$1280</p>
                </div>

                <div class="flex justify-between border-b border-gray-200 mt-1 text-gray-800 font-medium py-3 uppercas">
                    <p>Tax</p>
                    <p>Rp.xxxx (11%)</p>
                </div>

                <div class="flex justify-between text-gray-800 font-medium py-3 uppercas">
                    <p class="font-semibold">Total</p>
                    <p>$1280</p>
                </div>

                <button type="submit"
                    class="block w-full py-3 px-4 text-center text-white bg-primary border border-primary rounded-md hover:bg-transparent hover:text-primary transition font-medium">
                    Checkout</button>
            </div>
        </div>
    </form>
@endsection
