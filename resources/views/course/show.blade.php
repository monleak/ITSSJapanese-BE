@extends('layout')
@section('content')
    @include('partials._search')
    @php
        use App\Models\Teacher;
        use App\Models\User;
        // Tìm teacher_name : teacher_id(Course table) -> user_id(Teacher table) -> user_name(User table)
        $teacher = Teacher::find($listing->teacher_id);
        $user = User::find($teacher->user_id);
        // dd($course);
        
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
                    @php
                        // $userId = optional(Auth::user())->id;
                        // Tìm khóa học chứa id đã đăng ký của user
                        $course = DB::table('join_courses')
                            ->where('course_id', $listing->id)
                            ->where('student_id', Auth::user()->id)
                            ->get()
                            ->first();
                    @endphp
                    @if (Auth::user()->role == 'student')
                        <form class="w-full items-center"action="/student/join-course/" method="post">
                            @csrf
                            <input type="hidden" name="course_id" value="{{ $listing->id }}">
                            <input type="hidden" name="student_id" value="{{ Auth::user()->id }}">
                            @if (isset($course))
                                {{-- <button class="w-full h-12 px-6 text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">Large block button</button> --}}
                                <button class="block w-20 bg-teal-300 text-black mt-6 py-2 rounded-xl hover:opacity-80"
                                    type="submit" disabled>登録</button>
                            @else
                                <button class="block w-20 bg-teal-300 text-black mt-6 py-2 rounded-xl hover:opacity-80"
                                    type="submit">登録</button>
                            @endif
                        </form>
                    @else
                        <a href="/course" class="block w-full bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80">
                            <i class="fa-solid fa-globe"></i> コースの内容
                        </a>
                    @endif
                @endguest
            </div>
            <div class="flex flex-col items-center justify-center text-center">

                <div class="flex justify-items-stretch">
                    <h2 class="text-2xl mb-2">{{ $listing->name }}</h2>

                </div>
                <img class="w-48 mr-6 mb-6" src="{{ asset('images/no-image.png') }}" alt="" />
                <ul class="flex">
                    <b>
                        <x-listing-tags :tagsCsv="$listing->tag" />
                    </b>
                </ul>
                <div class="text-xl font-bold mb-4">教師 : {{ $user->name }}</div>

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
