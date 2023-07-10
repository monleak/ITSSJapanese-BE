@extends('layout')
@section('content')
    @include('partials._hero')
    <div class="mx-24 text-4xl font-bold uppercase my-5">君の理想の先生探しを始めよう！</div>

    @include('partials._search')
    <div class="mx-24">
        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

            {{-- echo = {{}} --}}

            @if (count($listings) == 0)
                <p>No course available</p>
            @else
                @foreach ($listings as $item)
                    {{-- pass $listing to listing => have to use prefix : --}}
                    <x-listing-card :item="$item" />
                @endforeach
            @endif

        </div>
        <div class="text-4xl font-bold uppercase my-5">勉強しましょう！</div>
        <div class="justify-items-center lg:grid lg:grid-cols-3 gap-4 space-y-4 md:space-y-0 mx-4">
            <div class="bg-gray-50 border border-gray-200 rounded p-6">
                <div class="flex ">
                    <img class="object-fill w-48 h-48 mr-6 md:block" src="{{ asset('images/schedule.jpg') }}"
                        alt="" />
                    <div class="table-cell">
                        <h3 class="text-2xl">
                            スケジュール
                        </h3>
                        <div class="text-lg mt-4">
                            授業のスケジュールや先生との次の約束を確認します。
                        </div>
                        <br>
                        <a class="text-2xl text-sky-800	" href="/schedule">行こう</a>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 border border-gray-200 rounded p-6">
                <div class="flex">
                    <img class="w-48 h-48 mr-6 md:block" src="{{ asset('images/course.png') }}" alt="" />
                    <div>
                        <h3 class="text-2xl">
                            コース
                        </h3>
                        <div class="text-lg mt-4">
                            登録されている全てのコースを見ます。
                        </div>
                        <br>
                        <br>
                        <a class="text-2xl text-sky-800	" href="/course">行こう</a>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 border border-gray-200 rounded p-6">
                <div class="flex">
                    <img class="w-48 h-48 mr-6 md:block" src="{{ asset('images/credit-card.png') }}" alt="" />
                    <div>
                        <h3 class="text-2xl">
                            クレジットカード
                        </h3>
                        <div class="text-lg mt-4">
                            クレジットカード情報を管理します。
                        </div>
                        <br>
                        <a class="text-2xl text-sky-800	" href="/credit-card">行こう</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-4xl font-bold my-5">ichisenseiの教師</div>
        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

            {{-- echo = {{}} --}}
            @php
                use App\Models\Teacher;
                
                $teachers = Teacher::latest()->paginate(3);
            @endphp
            @if (count($teachers) == 0)
                <p>No teachers available</p>
            @else
                @foreach ($teachers as $item)
                    {{-- pass $listing to listing => have to use prefix : --}}
                    <x-listing-teacher :item="$item" />
                @endforeach
            @endif
        </div>
    </div>

@endsection
