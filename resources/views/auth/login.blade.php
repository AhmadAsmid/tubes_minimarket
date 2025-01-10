<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="max-w-md mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden mt-10">
        <div class="p-6">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 text-center">{{ __('Masuk ke Akun Anda') }}</h2>
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 text-center">Silakan masukkan kredensial Anda untuk masuk.</p>

            <form method="POST" action="{{ route('login') }}" class="mt-6">
                @csrf

                <!-- Username -->
                <div>
                    <x-input-label for="username" :value="__('Username')" class="text-gray-600 dark:text-gray-300" />
                    <x-text-input id="username" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 focus:ring-purple-500 focus:border-purple-500 rounded-md" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2 text-red-500" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-gray-600 dark:text-gray-300" />
                    <x-text-input id="password" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 focus:ring-purple-500 focus:border-purple-500 rounded-md" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 dark:border-gray-700 dark:bg-gray-700 text-purple-600 focus:ring-purple-500 dark:focus:ring-purple-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-300">{{ __('Ingat saya') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-purple-600 dark:text-purple-400 hover:text-purple-800 dark:hover:text-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-500 rounded-md" href="{{ route('password.request') }}">
                            {{ __('Lupa Password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3 bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded-md">
                        {{ __('Masuk') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
