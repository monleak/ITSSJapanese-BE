@extends('layout')
@section('content')
    {{-- So hoc sinh 
Ten khoa hoc 
Ten hoc sinh 
Avatar
Dong y / Tu choi --}}
    @php
        use App\Models\Course;
        use App\Models\Student;
        // $course_name[] = [];
        // $student[] = [];
        foreach ($request as $value) {
            # code...
            $course_name[$value->id] = Course::where('id',$value->course_id)->value('name');
            $student[$value->id] = Student::find($value->student_id)->fullname;
        }
        // dd($student)
    @endphp
    <div class="mx-64 my-5">
        <x-card class="p-10">
            <div class="flex flex-col justify-center items-center mt-4">
                <h1 class="mb-2 text-4xl">リクエストのリクエスト</h1>
            </div>
            <div class="my-6 bg-white mx-4">
                <table class="w-full">
                    <tbody>
                        <?php $tdClass = 'text-left px-8 py-3'; ?>
                        @foreach ($request as $item)
                        {{-- {{dd($course_name)}} --}}
                            <tr class="hover:bg-yellow-100 border border-grey-50">
                                <td class="{{ $tdClass }}">
                                    <div class="">
                                        <img src="{{ asset('images/ava.png') }}" alt="" class="inline w-10 h-10 rounded-full">
                                        {{$course_name[$item->id]}}の学生数：...
                                    </div>
                                    <div class="">
                                        {{$student[$item->id]}}さんはあなたの{{$course_name[$item->id]}}に受けたいです。
                                    </div>
                                </td>
                                {{-- <td class="{{ $tdClass }}">{{ $item->teacher_name }}</td> --}}
                                <td class="text-center my-5 gap-2 flex justify-center">
                                    <form id="requestHandler" action="/addStudentToCourse" method="post">
                                        @csrf
                                        <input type="hidden" name="course_id" value="{{ $item->course_id }}">
                                        <input type="hidden" name="student_id" value="{{$item->student_id}}">
                                        {{-- @if (inArray($item->id, $joinedCourses))
                                            <button class="bg-slate-300 text-black p-2 rounded-lg" type="submit"
                                                disabled>登録した</button>
                                        @else --}}
                                            {{-- <button class="bg-slate-600 text-white p-2 rounded-lg"
                                                type="submit">登録</button> --}}
                                        {{-- @endif --}}
                                        <a href="#" onclick="myFunction()" class= "btn btn-xs btn-info pull-right">
                                            <input type="hidden" name="status" value="accepted">
                                            <img src = "{{ asset('images/accept.png') }}" alt="" class="inline w-10 h-10 rounded-full">
                                        </a>
                                        <a href="#" onclick="myFunction()" class= "btn btn-xs btn-info pull-right">
                                            <input type="hidden" name="status" value="rejected">
                                            <img src = "{{ asset('images/reject.png') }}" alt="" class="inline w-10 h-10 rounded-full">
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </x-card>
    </div>
    <script>
        function myFunction() {
            document.getElementById("requestHandler").submit();
        }
    </script>
@endsection
