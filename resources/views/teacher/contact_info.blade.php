@extends('layout')
@section('content')
    @include('partials._search')

    <div class="flex flex-row">
        {{-- echo = {{}} --}}
        <div class="border border-gray-200 w-full text-center items-center">
            <h3 class="ml-10 text-3xl font-bold mb-4 mt-5 w-full h-10">
                <i class="bi bi-facebook"></i>   fb.com/ichisenseinoichi
            </h3>
            {{-- <div class=" items-center w-full mx-96 text-3xl font-bold mb-4 mt-5 flex">
                <img class= "w-8 h-8"src="{{ asset('images/zalo.png') }}"> zalo.me/g/teacher10110
            </div> --}}
            <h3 class="ml-10 text-3xl font-bold mb-4 mt-5">
                <i class="bi bi-envelope-at"></i> teacher@gmail.com
            </h3>
            <h3 class="ml-10 text-3xl font-bold mb-4 mt-5 w-full h-10">
                <i class="bi bi-twitter "></i> twitter.com/ichisenseinoichi
            </h3>
            <h3 class="ml-10 text-3xl font-bold mb-4 mt-5">
                <i class="bi bi-telephone-fill"></i>   0123456789
            </h3>
        </div>
    </div>
@endsection
