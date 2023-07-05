@extends('layout')
@section('content')
    <div class="mx-64">
        @php
            use App\Models\Teacher;
            use Carbon\Carbon;
            
            $id = Auth::user()->id;
            $teacher = Teacher::find($id);
            
        @endphp
        <x-card class="p-10">
            <div class="mt-4 mr-10 justify-items-end text-center absolute top-20 right-60">
                <form action="{{ route('course.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="teacher_id" value="{{ Auth::user()->id }}">
                    <button class="block w-20 bg-teal-300 text-black mt-6 py-2 rounded-xl hover:opacity-80 font-bold "
                        type="submit">編集</button>
            </div>
            <div class="flex flex-col items-start justify-center text-start">

                <div class="flex justify-items-stretch">
                    <h2 class="ml-10  mb-2">
                        <div>
                            @error('course_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <input class="text-2xl font-bold border border-black p-2 rounded-md w-auto"
                                type="text" name="course_name"  placeholder="コースの名前" required>
                        </div>
                    </h2>
                </div>

                <div class="flex flex-col w-full mx-auto border-2">
                    <div>
                        <label class="ml-2 my-2 font-semibold text-lg mb-4 " for="">レベル：</label>
                        @error('course_level')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <input class="border border-black p-2 rounded-md m-2 ml-7 w-2/3" type="text" name="course_level"
                            required>
                    </div>

                    <div class="">
                        <label class="ml-2 my-2 font-semibold text-lg mb-4" for="">値段：</label>
                        @error('course_price')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <input class="border border-black p-2 rounded-md m-2 ml-11 w-2/3" type="text" name="course_price"
                            required>
                    </div>

                    <div class="">
                        <label class="ml-2 my-2 font-semibold text-lg mb-4" for="">最終更新：</label>
                        @error('course_updated_at')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <input class="border border-black p-2 rounded-md m-2 w-2/3" type="text" name="course_updated_at"
                            value={{ Carbon::now() }}>
                    </div>
                    <div >
                        <label class="ml-2 my-2 font-semibold text-lg mb-4" for="">コースのメソッド : </label>
                        <div class="flex gap-10 ml-32 my-2">
                            <div>
                                <input type="radio" name="course_method" value="online" checked>
                                <label>Online</label><br>
                            </div>
                            <div>
                                <input type="radio" name="course_method" value="offline">
                                <label>Offline</label><br>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="border border-gray-200 w-full mb-6">
                    <h3 class="ml-10 text-3xl font-bold mb-4">
                        コースの内容
                    </h3>
                    <div class="border border-gray-200 w-full mb-6 items-center">
                        @error('course_description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <input class="border border-black p-2 rounded-md m-2 ml-11 w-5/6 h-32" type="text"
                            name="course_description" required>
                    </div>
                    <h2 class="text-2xl mb-2">
                        <div class="text-xl font-bold mb-4">教師 : {{ $teacher->fullname }}</div>
                    </h2>
                </div>
            </div>
            {{-- <img class="w-48 mr-6 mb-6" src="{{ asset('images/no-image.png') }}" alt="" /> --}}

            {{-- <div class="border border-gray-200 w-full mb-6"></div> --}}
            <div class="border border-gray-200 w-full mb-6">
                <h3 class="ml-10 text-3xl font-bold mb-4">
                    説明
                </h3>
                <div class="border border-gray-200 w-full mb-6 items-center">
                    @error('course_intro')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <input class="border border-black p-2 rounded-md m-2 ml-11 w-5/6 h-32" type="text"
                        name="course_intro" required>
                </div>
            </div>
            </form>
        </x-card>
    </div>
@endsection
