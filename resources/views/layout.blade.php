<!DOCTYPE html>
<html lang="en">

<head>
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
    <title>IchiSensei</title>
</head>

<body class="mb-48">
    <nav class="bg-white text-slate-900 border-gray-200 px-2 sm:px-4 py-2.5 flex justify-between items-center mb-4">
        {{-- style="background-image: url('images/header-bg.png')"> --}}
        <a href="/"><b class="text-4xl">ichiSensei.</b></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            <div class="flex flex-row gap-4 px-4 py-2 rounded-lg text-black font-bold">
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
        <ul class="flex space-x-6 mr-6 text-lg">
            <div class="flex flex-row gap-3 px-4 py-2 rounded-lg bg-white ">
                @guest
                    <li>
                        <a href="/login" class="hover:text-black"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                            Login</a>
                    </li>
                    <li>
                        <a href="/register" class="hover:text-black"><i class="fa-solid fa-user-plus"></i> Register</a>
                    </li>
            </ul>
        @else
            {{-- <a href="/home" class="block py-2 px-3 rounded-lg  hover:bg-gray-800 hover:text-white">
                <i class="fa-sharp fa-solid fa-book"></i> My Course</a> --}}
            <a href="/profile" class="block py-2 px-3 rounded-lg  hover:bg-gray-800 hover:text-white">
                <i class="fa-sharp fa-solid fa-user"></i>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <a href="{{ route('logout') }}" class="block py-2 px-3  rounded-lg  hover:bg-gray-800 hover:text-white"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                <i class="fa-sharp fa-solid fa-right-from-bracket"></i>
                Log Out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
        </div>
    </nav>
    <main>
        {{-- VIEW OUTPUT --}}
        @yield('content')
        {{-- all the content section wrap aroung layout --}}
    </main>
    @guest
    @else
    @endguest
    <x-flash-message />
</body>

</html>
