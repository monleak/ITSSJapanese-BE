@extends('layout')
@section('content')
    {{-- @include('partials._search') --}}
    @php
        use App\Models\Student;
        use App\Models\Teacher;
        use App\Models\User;
        $teacher = Teacher::find($listing->teacher_id);
        
    @endphp

    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-64">
        <x-card class="p-10">
            <div class="justify-items-end text-center absolute right-72 top-28 mt-5">
                @if (Auth::user()->role == 'student' &&
                        null ==
                            DB::table('register_request')->select('id')->where('student_id', Auth::user()->id)->where('course_id', $listing->id)->get()->first())
                    <form action="/createRequest" method="post">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $listing->id }}">
                        <input type="hidden" name="student_id" value="{{ Auth::user()->id }}">
                        <button class="block w-20 bg-teal-300 text-black mt-6 py-2 rounded-xl hover:opacity-80 font-bold "
                            type="submit">登録</button>
                    </form>
                @elseif(Auth::user()->role == 'student' &&
                        null !=
                            DB::table('register_request')->select('id')->where('student_id', Auth::user()->id)->where('course_id', $listing->id)->get()->first())
                    <button class="block w-20 bg-slate-300	 text-black mt-6 py-2 rounded-xl hover:opacity-80 font-bold"
                        type="submit" disabled>登録</button>
                    @php
                        $request = DB::table('register_request')
                            ->select('*')
                            ->where('student_id', Auth::user()->id)
                            ->where('course_id', $listing->id)
                            ->get()
                            ->first();
                    @endphp
                    @if ($request->status == 'rejected')
                        <button
                            class="right-30 block w-20 bg-red-500 text-black mt-6 py-2 rounded-xl hover:opacity-80 font-bold"
                            type="submit" disabled>拒否された
                        </button>
                    @elseif($request->status == 'accepted')
                        <button
                            class="right-30 block w-20 bg-green-500	 text-white mt-6 py-2 rounded-xl hover:opacity-80 font-bold"
                            type="submit" disabled>受け入れた
                        </button>
                    @elseif($request->status == 'pending')
                        <button
                            class="right-30 block w-20 bg-yellow-200 text-whblackite mt-6 py-2 rounded-xl hover:opacity-80 font-bold"
                            type="submit" disabled>確認中
                        </button>
                    @endif
                @endif
            </div>
            <div class="flex flex-col items-start justify-center text-start">

                <div class="flex justify-items-stretch">
                    <h2 class="ml-10 text-3xl font-bold mb-5">
                        {{ $listing->name }}
                    </h2>
                </div>

                <div class="flex flex-col w-full mx-auto border-2 my-2">
                    <div>
                        <label class="ml-2 my-3 font-semibold text-lg mb-4 " for="">レベル：
                            {{ $listing->level }}</label>
                        @error('course_level')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="">
                        <label class="ml-2 my-3 font-semibold text-lg mb-4" for="">値段： {{ $listing->price }}
                            VND</label>
                        @error('course_price')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="">
                        <label class="ml-2 my-3 font-semibold text-lg mb-4" for="">最終更新：
                            {{ $listing->updated_at }}</label>
                        @error('course_updated_at')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="ml-2 my-3 font-semibold text-lg mb-4" for="">コースのメソッド :
                            {{ $listing->method }}</label>

                    </div>

                </div>
                <div class="border border-gray-200 w-full mb-6">
                    <h3 class="ml-10 text-3xl font-bold mb-4 mt-5">
                        コースの内容
                    </h3>
                    <div class="border border-gray-200 w-full mb-6 items-start">
                        @error('course_description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="p-2 m-2 ml-5 w-5/6 h-32">{{ $listing->description }}</div>
                    </div>
                    <h2 class="text-2xl mb-2">
                        <div class="text-xl font-bold mb-4">教師 : {{ $teacher->fullname }}</div>
                    </h2>
                </div>
                <div class="border border-gray-200 w-full">
                    <h3 class="ml-10 text-3xl font-bold mb-4 mt-5">
                        説明
                    </h3>
                    <div class="border border-gray-200 w-full mb items-center">
                        @error('course_intro')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="p-2 rounded-md m-2 ml-11 w-5/6 h-32"></div>
                    </div>
                </div>
                <div class="border border-gray-200 w-full flex-col">
                    <div class="justify-items-stretch flex-auto grid gap-auto grid-cols-2 grid-rows-1">
                        <h3 class="ml-10 text-3xl font-bold mb-4 mt-5">
                            コメント
                        </h3>
                        <div class="justify-items-end">
                            <form action="/createComment" method="get" class=" ml-72">
                                <button
                                    class="block w-20 bg-yellow-300 text-black mt-6 py-2 rounded-xl hover:opacity-80 font-bold "
                                    type="submit">追加</button>
                            </form>
                        </div>
                    </div>

                    <div class="border border-gray-200 w-full mb items-center">
                        <table class="w-full">
                            <tbody>
                                <?php $tdClass = 'text-left px-8 py-3'; ?>
                                @foreach ($comments as $comment)
                                    {{-- {{dd($course_name)}} --}}
                                    <tr class="hover:bg-yellow-100 border-2 border-grey-300">
                                        <td class="{{ $tdClass }}">
                                            <h2 class="ml-10 text-2xl font-bold my-2">名前：
                                                {{ Student::find($comment->id_student)->fullname }}</h2>
                                            <div
                                                class="border-b border-black justify-items-stretch flex-auto grid gap-auto grid-cols-2 grid-rows-1">
                                                <div class="ml-9 flex items-center space-x-3">
                                                    @for($i = $comment->rating; $i > 0; $i--)
                                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                                    </svg>
                                                    @endfor                                                
                                                </div>
                                                <div class="ml-10 text-xl font-bold my-2">
                                                    時間：　{{ $comment->created_at }}</div>
                                            </div>
                                            <div class="pl-5 text-xl py-10 border border-black">
                                                {{$comment->content}}
                                            </div>
                                        </td>
                                        {{-- <td class="{{ $tdClass }}">{{ $item->teacher_name }}</td> --}}
                                        <td class="text-center my-5 gap-2 flex justify-center">
                                            {{-- <form id="requestHandler" action="{{ route('student.join') }}" method="post">
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
                                    </form> --}}
                                        </td>
                                    </tr>
                                    @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </x-card>
    </div>
@endsection
