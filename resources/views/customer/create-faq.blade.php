@extends('layouts.customer')
@section('content')
    <div class="container pb-16 ">
        <h2 class="text-2xl font-medium text-gray-800  mb-6 mt-10">Frequently Asked Question (FAQ)</h2>
        <div class="bg-white overflow-auto">
            <div class="flex items-start mx-2 my-2">
                <div class="w-full  my-1">
                    <div class="col-span-8 border border-gray-200 p-4 rounded">
                        <h3 class="text-lg font-medium capitalize mb-4">Kirim Pertanyaan</h3>
                        <form method="POST" action="/faq-store">
                            @csrf
                            <div class="mt-2">
                                <label for="name" class="text-gray-600">Nama </label>
                                <input type="name" name="name" id="name" class="input-box">
                            </div>
                            <div class="mt-2">
                                <label for="phone" class="text-gray-600">Nomor Handphone </label>
                                <input type="phone" name="phone" id="phone" class="input-box">
                            </div>
                            <div class=" mt-5">
                                <label for="message" class="text-gray-600">Pertanyaan </label>
                                <textarea name="message" id="message" class="input-box"></textarea>
                            </div>
                            <button class="px-4 py-1 mt-5 text-white font-light tracking-wider bg-gray-900 rounded"
                                type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
