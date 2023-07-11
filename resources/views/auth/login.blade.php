<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


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
            <h5>ログイン</h5>
            <br><br><br>
            <p>アカウントがない？ <a href="/register" style="color:green">登録しよう</a></p>
            <br><br>
            <form method="POST" action="{{ route('login') }}">
                @csrf
        
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('メールアドレス')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('パスワード')" />
        
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
        
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('パスワードをお忘れの場合') }}
                        </a>
                    @endif
        
                    <x-primary-button class="text-sm flex-col">
                        {{ __('ログイン　　') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
        
    </div>
</x-guest-layout>
