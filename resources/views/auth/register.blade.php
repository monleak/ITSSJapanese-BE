<x-guest-layout>
    <div class="box-form">
        <div class="left">
            <div class="overlay">
                <h1>Ichiichi sensei</h1>
                <p>HEDSPI の主要な学習アプリ</p>
                <span>
                    <br><br><br><br>
                </span>
            </div>
        </div>


        <div class="right">
            <br>
            <h5>Register</h5>
            <br><br>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- Role-->
                <div class="mt-4 flex w-2 gap-10 justify-start ">
                    <div for="role" :value="__('Role')">Role</div>
                    <div class="flex w-2">
                        <div class="w-full text-2xl" for="teacher">教師</div>
                        <input id="teacher" type="radio" class="border-2 items-center rounded-full" name="role"
                            required checked value="teacher"/>
                    </div>
                    <div class="w-full text-2xl h-2" for="student">学生</div>
                    <div class="flex w-2">
                        <input id="student" type="radio" class=" border-2 items-center rounded-full" name="role" value="student"/>
                    </div>
                    <br>
                </div>
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ml-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

    </div>
</x-guest-layout>
