@props(['item'])
@php
    use App\Models\Teacher;
    use App\Models\User;
    
    $user = Teacher::find($item->id);
@endphp

<div class="table-cell bg-gray-50 border border-gray-200 rounded p-6">
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block" src="{{ asset('images/ava.png') }}" alt="" />
        <div>
            <h3 class="text-2xl font-bold">
                {{ $user->fullname }}
            </h3>
            <ul class="list-outside list-disc">
                <li>HUSTの日本語教師</li>
                <li><b>{{$user->experience}}</b>年の指導経験</li>
                <li>N5からN1レベルのクラスを提供</li>
            </ul>
            <br>
            <br>
            <a class="text-2xl text-cyan-600" href="/course">先生のコースを見る</a>
        </div>
    </div>
</div>
