@extends('layout')
@section('content')
    @php
        use App\Models\Student;
        $student = Student::find(Auth::user()->id);
        // dd($student)
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
                            value="{{$student->fullname}}" @disabled(true)>
                    </div>

                    <div class="border border-gray-200 w-full mb-6 items-center">
                        @error('content')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <input class="border border-black p-2 rounded-md m-2 ml-11 w-5/6 h-32" type="text" name="content"
                            placeholder="コメント" required>
                        <div class="ml-11">
                            @push('other-scripts')
                                <script>
                                    addEventListener("load", (event) => {});
                                    // let rating[4] = ["none"];
                                    // Blade can not get the form if the whole page is not yet loaded. => add window.onload
                                    function myRatingFunction(props) {
                                        let m = document.getElementById(props);
                                        if (m.attributes["fill"].value == "") {
                                            for (let i = 1; i <= props; i++) {
                                                m = document.getElementById(i);
                                                m.setAttribute("fill", "yellow");
                                            }
                                            console.log(props);
                                            document.getElementById("rating").value = props;
                                        } else {
                                            document.getElementById("rating").value = 0;
                                            for (let i = 1; i <= 5; i++) {
                                                let m = document.getElementById(i);
                                                m.setAttribute("fill", "");
                                            }
                                        }
                                    }
                                </script>
                            @endpush
                            <label class=" my-2 font-semibold text-lg mb-4" for="">評価：</label>
                            @error('rating')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <input type="hidden" name="rating" id="rating" required>
                            <ul class="flex justify-center flex-row-reverse hover:cursor-pointer">
                                <li onclick="myRatingFunction(5);"
                                    class="peer fill-yellow-50 peer-hover:fill-yellow-300 hover:fill-yellow-300">
                                    <svg id="5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        stroke-width="1.5" fill="" stroke="currentColor"
                                        class="mr-1 h-5 w-5 text-warning ">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                    </svg>
                                </li>
                                <li onclick="myRatingFunction(4);"
                                    class="peer fill-yellow-50 peer-hover:fill-yellow-300 hover:fill-yellow-300">
                                    <svg id="4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        stroke-width="1.5" fill="" stroke="currentColor"
                                        class="mr-1 h-5 w-5 text-warning ">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                    </svg>
                                </li>
                                <li onclick="myRatingFunction(3);"
                                    class="peer fill-yellow-50 peer-hover:fill-yellow-300 hover:fill-yellow-300">
                                    <svg id="3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        stroke-width="1.5" fill="" stroke="currentColor"
                                        class="mr-1 h-5 w-5 text-warning ">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                    </svg>
                                </li>
                                <li onclick="myRatingFunction(2);"
                                    class="peer fill-yellow-50 peer-hover:fill-yellow-300 hover:fill-yellow-300">
                                    <svg id="2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        stroke-width="1.5" fill="" stroke="currentColor"
                                        class="mr-1 h-5 w-5 text-warning ">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                    </svg>
                                </li>
                                <li onclick="myRatingFunction(1);" fill=""
                                    class="peer fill-yellow-50 peer-hover:fill-yellow-300 hover:fill-yellow-300">
                                    <svg id="1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        stroke-width="1.5" fill="" stroke="currentColor"
                                        class="mr-1 h-5 w-5 text-warning ">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                    </svg>
                                </li>
                            </ul>
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
