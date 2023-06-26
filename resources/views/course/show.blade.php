@extends('layout')
@section('content')
    @include('partials._search')
    @php
        use App\Models\Teacher;
        use App\Models\User;
        // Tìm teacher_name : teacher_id(Course table) -> user_id(Teacher table) -> user_name(User table)
        $teacher = Teacher::find($listing->teacher_id);
        // $user = User::find($teacher->user_id);
        // dd($course);
        // dd($listing);
        // dd($id)
    @endphp

    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10">
            <div class="justify-items-end text-center absolute inset-y-43 right-20">
                @guest
                    <a href="/register" class="block w-20 bg-teal-300 text-black mt-6 py-2 rounded-xl hover:opacity-80">
                        登録
                    </a>
                @else
                @endguest
            </div>
            <div class="flex flex-col items-center justify-center text-center">

                <div class="flex justify-items-stretch">
                    <h2 class="text-2xl mb-2">{{ $listing->name }}</h2>

                </div>
                <img class="w-48 mr-6 mb-6" src="{{ asset('images/no-image.png') }}" alt="" />
                <div class="text-xl font-bold mb-4">教師 : {{ $teacher->fullname }}</div>

                {{-- <div class="border border-gray-200 w-full mb-6"></div> --}}
                <div class="border border-gray-200 w-full mb-6">
                    <h3 class="text-3xl font-bold mb-4">
                        コースの内容
                    </h3>
                    <div class="border border-gray-200 w-full mb-6"></div>
                    <div class="text-lg px-40 space-y-6">
                        {{ $listing->description }}
                    </div>
                </div>
            </div>
        </x-card>
    </div>
@endsection
