<section
class=" bg-slate-200 relative h-72 flex flex-col justify-center align-center text-center space-y-4 mb-4"
>
<div class="grid gap-4 grid-col-3 grid-row-1">
    <div class="z-10">
        <h1 class="text-6xl font-bold uppercase">
            IchiSensei.
        </h1>
        <p class="text-2xl text-black-200 font-bold my-4">
            ベトナム語を勉強しよう
        </p>
        @guest
        <div>
            <a
                href="/login"
                class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
                >登録する</a
            >
        </div>
        @else
            @if(Auth::user()->role == 'student')
            <div>
                <a
                    href="/student/join-course"
                    class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
                    >登録する</a
                >
            </div>
            @else
            <div>
                <a
                    href="/home"
                    class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
                    >コース管理</a
                >
            </div>
            @endif
        @endguest
    </div>
</div>



</section>
