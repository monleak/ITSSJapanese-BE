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
        // dd($request);
        foreach ($request as $value) {
            # code...
            $course_name[$value->id] = Course::where('id', $value->course_id)->value('name');
            $student[$value->id] = Student::find($value->student_id)->fullname;
        }
    @endphp
    <div class="mx-64 my-5">
        <x-card class="p-10">
            {{-- @if (isset($request))
                <div class="text-2xl font-bold">
                    リクエストがなし
                </div>
            @else --}}
            <div class="flex flex-col justify-center items-center mt-4">
                <h1 class="mb-2 text-4xl">リクエストのリクエスト</h1>
            </div>
            <table class="w-full">
                <tbody>
                    <?php $tdClass = 'text-left px-8 py-3'; ?>
                    @foreach ($request as $item)
                        {{-- {{dd($course_name)}} --}}
                        <tr class="hover:bg-yellow-100 border border-grey-50">
                            <td class="{{ $tdClass }}">
                                <div class="">
                                    <img src="{{ asset('images/ava.png') }}" alt=""
                                        class="inline w-10 h-10 rounded-full">
                                    {{ $course_name[$item->id] }}の学生数：...
                                </div>
                                <div class="">
                                    {{ $student[$item->id] }}さんはあなたの{{ $course_name[$item->id] }}に受けたいです。
                                </div>
                            </td>
                            <td class="text-center my-5 gap-2 flex justify-center">
                                <form id="requestHandler" action="{{ route('student.join') }}" method="post" class="flex gap-4">
                                    @csrf
                                    <input type="hidden" name="course_id" value="{{ $item->course_id }}">
                                    <input type="hidden" name="student_id" value="{{ $item->student_id }}">
                                    <input type="hidden" id="status" name="status" value="">
                                    <a href="#"
                                        onclick="document.getElementById('status').value = 'accepted';
                                        document.getElementById('requestHandler').submit();"
                                        class="btn btn-xs btn-info pull-right">
                                        <div
                                            class="rounded-full w-20 h-20 border-2 border-black items-center flex justify-center hover:bg-green-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                              </svg>
                                        </div>

                                        {{-- <img src="{{ asset('images/accept.png') }}" alt=""
                                                class="inline w-15 h-15 rounded-full"> --}}
                                    </a>
                                    <a href="#"
                                        onclick="document.getElementById('status').value = 'rejected';
                                        document.getElementById('requestHandler').submit();"
                                        class="btn btn-xs btn-info pull-right">
                                        <div
                                            class="rounded-full w-20 h-20 border-2 border-black items-center flex justify-center hover:bg-red-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120"
                                                fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </div>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- @endif --}}

        </x-card>
    </div>
@endsection
{{-- @push('head')
    <script>
        function myAcceptFunction() {
            document.getElementById("status").value = "accepted";
            document.getElementById("requestHandler").submit();
            console.log("Sent form")
        }

        function myRejectFunction() {
            document.getElementById("status").value = "rejected";
            document.getElementById("requestHandler").submit();
            console.log("Sent form")
        }
    </script>
@endpush --}}
