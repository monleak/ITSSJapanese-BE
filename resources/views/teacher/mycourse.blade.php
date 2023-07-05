@extends('layout')
@section('content')
    @include('partials._search_teacher')

    <div class="flex flex-row flex-1">
        {{-- echo = {{}} --}}
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
                <a href={{route('course.create')}}><img class="h-48 w-48 justitfy-items-center" src="../../images/add.png"></a>
            </div>
        </div>
    </div>
@endsection
