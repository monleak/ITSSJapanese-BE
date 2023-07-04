@extends('layout')
@section('content')
    <div class="mx-4">
        <x-card class="p-10">
            <div class="justify-items-end text-center absolute right-20">
                <form action="/course/create" method="post">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $listing->id }}">
                    <input type="hidden" name="student_id" value="{{ Auth::user()->id }}">
                    <button class="block w-20 bg-teal-300 text-black mt-6 py-2 rounded-xl hover:opacity-80 font-bold "
                        type="submit">編集</button>
                </form>
            </div>
            <div class="flex flex-col items-start justify-center text-start">

                <div class="flex justify-items-stretch">
                    <h2 class="text-2xl font-bold mb-2">基本的なベトナム語</h2>
                </div>

                <div class="wrapper border-2 w-full">
                    <div class="text-lg mb-4">レベル：</div>
                    <div class="text-lg mb-4">値段：</div>
                    <div class="text-lg mb-4">最終更新：</div>
                </div>


                <div class="border border-gray-200 w-full mb-6">
                    <h3 class="text-3xl font-bold mb-4">
                        コースの内容
                    </h3>
                    <div class="border border-gray-200 w-full mb-6"></div>
                    <div class="text-lg px-40 space-y-6">
                        これはベトナム語のアルファベットと基本的な言葉と発音を教えるコースです。
                    </div>
                </div>
            </div>
            <div class="flex justify-items-stretch">
                <h2 class="text-2xl mb-2"></h2>

            </div>
            <img class="w-48 mr-6 mb-6" src="{{ asset('images/no-image.png') }}" alt="" />
            <div class="text-xl font-bold mb-4">教師 : </div>

            {{-- <div class="border border-gray-200 w-full mb-6"></div> --}}
            <div class="border border-gray-200 w-full mb-6">
                <h3 class="text-3xl font-bold mb-4">
                    コースの内容
                </h3>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div class="text-lg px-40 space-y-6">

                </div>
            </div>
        </x-card>
    </div>
@endsection
