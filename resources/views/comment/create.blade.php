@extends('layout')
@section('content')
    @php
        use App\Models\Student;
        $student = Student::find(Auth::user()->id); 
    @endphp
    <div class="mx-64">
        <x-card class="p-10">
            <form action="{{ route('comment.store') }}" method="post">
                @csrf
                <input type="hidden" name="student_id" value="{{ $student->id }}">
                <input type="hidden" name="course_id" value="{{ $course_id }}">

                <div class="flex flex-col w-full mx-auto border-2 justify-items-center">
                    <div class="font-bold text-xl mx-auto">あなたのコメント</div>
                    <div class="ml-4 w-full">
                        @error('user_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <input class="border border-black p-2 rounded-md m-2 ml-7 w-5/6" type="text" name="user_name"
                            placeholder="名前" required>
                    </div>

                    <div class="border border-gray-200 w-full mb-6 items-center">
                        @error('content')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <input class="border border-black p-2 rounded-md m-2 ml-11 w-5/6 h-32" type="text"
                            name="content" placeholder="コメント" required>
                        <div class="ml-11">
                            <label class=" my-2 font-semibold text-lg mb-4" for="">評価：</label>
                            @error('rating')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <input class="border border-black p-2 rounded-md m-2 ml-11 w-1/3" type="number"
                            name="rating" placeholder="星の数" required>
                        </div>
                    </div>
                    <div class="justify-center text-center items-center">
                        <div class="font-bold">すべての情報を入力してください。</div>
                        <button
                            class=" mx-auto block  w-64 bg-teal-300 text-black mt-6 py-2 rounded-xl hover:opacity-80 font-bold "
                            type="submit">投稿</button>
                    </div>

            </form>
    </div>
    </x-card>
    </div>
@endsection