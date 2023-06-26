@props(['item'])
@php
use App\Models\Teacher;
// use App\Models\User;

$teacher = Teacher::find($item->teacher_id);
// $user = User::find($teacher->user_id);
@endphp

<div class="bg-gray-50 border border-gray-200 rounded p-6">
    <div class="flex">
        <img
            class="w-48 h-48 md:block"
            src="{{asset('images/no-image.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{$item->id}}">{{$item->name}}</a>
            </h3>
            <div class="text-xl font-bold mb-1">
                {{$teacher->fullname}}
            </div>
            <div class="text-xl font-bold mb-1">
                {{number_format($item->price)}} VND
            </div>
            <div class="text-xl font-bold mb-1">
                {{$item->method}}
            </div>
            <div class="text-xl font-bold mb-1">
                レベル：{{$item->level}}
            </div>
            {{-- <b><x-listing-tags :tagsCsv="$item->tag" /></b> --}}
            <div class="text-lg mt-4">
                <i class="fas fa-info"></i> {{$item->description}}
            </div>
        </div>
    </div>
</div>