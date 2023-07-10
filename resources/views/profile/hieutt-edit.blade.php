<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"/>
    <title>Document</title>

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
</head>
<body>
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
        <div class="mx-80 my-2 w-3/6 flex justify-between items-center justify-items-center text-sm">
            <a href="/businessTV">ビジネスベトナム語</a>
            <a href="/kaiwaTV">ベトナム語会話</a>
            <a href="/practice_NLTV">NLTVの練習風景</a>
            <a href="/beginners">初心者のベトナム語</a>
            <a href="/else">その他</a>
        </div>
    </div>

    {{-- Profile --}}
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{ Auth::user()->name }}</span><span class="text-black-50">hieu@mail.com.my</span><span> </span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value=""></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">something</label><input type="text" class="form-control" placeholder="enter something" value=""></div>
                        <div class="col-md-12"><label class="labels">something</label><input type="text" class="form-control" placeholder="enter something" value=""></div>
                        <div class="col-md-12"><label class="labels">something</label><input type="text" class="form-control" placeholder="enter something" value=""></div>
                        <div class="col-md-12"><label class="labels">something</label><input type="text" class="form-control" placeholder="enter something" value=""></div>
                        <div class="col-md-12"><label class="labels">something</label><input type="text" class="form-control" placeholder="enter something" value=""></div>
                    </div>
                    <div class="mt-5 text-center" style="border: 2px solid black; border-radius: 12px; padding: 5px;"><button class="btn profile-button" type="button">Save Profile</button></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>
</html>