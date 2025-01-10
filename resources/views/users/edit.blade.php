<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center items-center min-h-screen bg-gradient-to-r from-purple-500 via-pink-500 to-red-500">
        <div class="max-w-4xl w-full mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-2xl p-8">
            <div class="text-center mb-8">
                <h3 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                    {{ __('Update User Information') }}
                </h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm mt-2">
                    {{ __('Fill in the details below to update the user information.') }}
                </p>
            </div>

            <form method="post" action="{{ route('user.update', $user->id) }}" class="space-y-6">
                @csrf
                @method('PATCH')

                <div>
                    <x-input-label for="name" value="Name" class="text-lg text-gray-900 dark:text-gray-100" />
                    <x-text-input id="name" type="text" name="name" 
                        class="mt-2 block w-full border-gray-300 dark:border-gray-600 rounded-lg shadow focus:ring-purple-500 focus:border-purple-500" 
                        value="{{ old('name', $user->name) }}" required />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div>
                    <x-input-label for="username" value="Username" class="text-lg text-gray-900 dark:text-gray-100" />
                    <x-text-input id="username" type="text" name="username" 
                        class="mt-2 block w-full border-gray-300 dark:border-gray-600 rounded-lg shadow focus:ring-purple-500 focus:border-purple-500" 
                        value="{{ old('username', $user->username) }}" required />
                    <x-input-error class="mt-2" :messages="$errors->get('username')" />
                </div>

                <div>
                    <x-input-label for="email" value="Email" class="text-lg text-gray-900 dark:text-gray-100" />
                    <x-text-input id="email" type="email" name="email" 
                        class="mt-2 block w-full border-gray-300 dark:border-gray-600 rounded-lg shadow focus:ring-purple-500 focus:border-purple-500" 
                        value="{{ old('email', $user->email) }}" required />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>

                <div class="flex justify-center space-x-6 mt-8">
                    <x-secondary-button tag="a" href="{{ route('user') }}" 
                        class="px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white rounded-lg shadow-lg transition-transform transform hover:scale-105">
                        {{ __('Cancel') }}
                    </x-secondary-button>
                    <x-primary-button name="save" 
                        class="px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-lg shadow-lg transition-transform transform hover:scale-105">
                        {{ __('Update') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
