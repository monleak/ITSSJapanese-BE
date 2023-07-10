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
                                    <form id="requestHandler" action="{{ route('student.join') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="course_id" value="{{ $item->course_id }}">
                                        <input type="hidden" name="student_id" value="{{ $item->student_id }}">
                                        <input type="hidden" id="status" name="status" value="">
                                        <a href="#"
                                            onclick="document.getElementById('status').value = 'accepted';
                                        document.getElementById('requestHandler').submit();"
                                            class="btn btn-xs btn-info pull-right">
                                            <img src="{{ asset('images/accept.png') }}" alt=""
                                                class="inline w-15 h-15 rounded-full">
                                        </a>
                                        <a href="#"
                                            onclick="document.getElementById('status').value = 'rejected';
                                        document.getElementById('requestHandler').submit();"
                                            class="btn btn-xs btn-info pull-right">
                                            <img src="{{ asset('images/reject.png') }}" alt=""
                                                class="inline w-15 h-15 rounded-full">
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
