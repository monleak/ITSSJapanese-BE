<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>ichisensei</title>
</head>

<body class="mb-48">
    <nav class="bg-white text-slate-900 border-gray-200 px-2 sm:px-4 pt-2.5 pb-1 flex items-center">
        {{-- style="background-image: url('images/header-bg.png')"> --}}
        <a href="/"><b class="text-4xl px-6">ichisensei.</b></a>
        <form class="flex items-center px-2">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input name="search" type="text" id="simple-search"
                    class="border border-gray-300 text-gray-900 text-sm rounded-3xl focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-1 "
                    placeholder="">
            </div>
        </form>
        <ul class="flex space-x-6 mr-6 text-lg justify-between w-full">
            <div class="flex flex-row gap-16 px-4 py-2 rounded-lg text-black font-bold">
                <li>
                    <a href="/schedule" class="hover:text-sky-700">スケジュール</a>
                </li>
                <li>
                    <a href="/course" class="hover:text-sky-700">私の学び</a>
                </li>
                <li>
                    <a href="/becomeATeacher" class="hover:text-sky-700">教師になる</a>
                </li>
                <li>
                    <a href="/about" class="hover:text-sky-700">Ichisenseiについて</a>
                </li>
            </div>
        </ul>

        <div class="absolute right-2 flex flex-row gap-3 px-4 py-2 rounded-lg bg-white ">
            {{-- <a href="/home" class="block py-2 px-3 rounded-lg  hover:bg-gray-800 hover:text-white">
                <i class="fa-sharp fa-solid fa-book"></i> My Course</a> --}}
            {{-- <a href="/profile" class="block py-2 px-3 rounded-lg  hover:bg-gray-800 hover:text-white">
                <i class="fa-sharp fa-solid fa-user"></i>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a> --}}
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                class="text-black hover:bg-gray-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                <i class="fa-sharp fa-solid fa-user mr-1"></i>
                {{ Auth::user()->name }} <span class="caret"></span>
                <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdown"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('プロフィール') }}
                    </x-dropdown-link>
                    <x-dropdown-link :href="route('myCourse')">
                        {{ __('コース管理') }}
                    </x-dropdown-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('ログアウト') }}
                        </x-dropdown-link>
                    </form>
                </ul>
            </div>

        </div>
    </nav>
    <div class="flex justify-between mt-2 border-y border-grey">
        <div class="mx-80 my-2 w-3/6 flex justify-between items-center flex justify-items-center text-sm">
            <a href="/businessTV">ビジネスベトナム語</a>
            <a href="/kaiwaTV">ベトナム語会話</a>
            <a href="/practice_NLTV">NLTVの練習風景</a>
            <a href="/beginners">初心者のベトナム語</a>
            <a href="/else">その他</a>
        </div>
    </div>


    <main>
        {{-- VIEW OUTPUT --}}
        @yield('content')
        {{-- all the content section wrap aroung layout --}}
    </main>
    @guest
    @else
    @endguest
    <x-flash-message />
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
