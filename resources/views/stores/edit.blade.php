<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Store') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">

                    <form method="post" action="{{ route('store.update', $store->id) }}" enctype="multipart/form-data" class="mt-6 space-y-8">
                        @csrf
                        @method('PATCH')

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                            <div class="space-y-8">
                                <div class="max-w-xl mx-auto">
                                    <x-input-label for="name" value="Store Name" />
                                    <x-text-input id="name" type="text" name="name" class="mt-1 block w-full rounded-lg shadow-xl border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 dark:focus:ring-green-500 dark:focus:border-green-500" value="{{ old('name', $store->name) }}" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>

                                <div class="max-w-xl mx-auto">
                                    <x-input-label for="location" value="Store Location" />
                                    <x-text-input id="location" type="text" name="location" class="mt-1 block w-full rounded-lg shadow-xl border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 dark:focus:ring-green-500 dark:focus:border-green-500" value="{{ old('location', $store->location) }}" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('location')" />
                                </div>

                                <div class="max-w-xl mx-auto">
                                    <x-input-label for="image_url" value="Store Image URL" />
                                    <x-text-input
                                        id="image_url"
                                        name="image_url"
                                        class="mt-1 block w-full rounded-lg shadow-xl border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 dark:focus:ring-green-500 dark:focus:border-green-500"
                                        value="{{ old('image_url', $store->image_url) }}"
                                        oninput="previewImage(this.value)"
                                    />
                                    <x-input-error class="mt-2" :messages="$errors->get('image_url')" />
                                </div>
                            </div>

                            <div class="flex justify-center items-center">
                                <div id="image-preview-container" class="w-64 h-64 bg-gray-100 dark:bg-gray-700 rounded-lg flex items-center justify-center border-4 border-gray-300 dark:border-gray-600 shadow-xl">
                                    <img id="image-preview" src="{{ old('image', $store->image_url) }}" alt="Image Preview" class="max-w-full max-h-full object-contain hidden rounded-lg" />
                                    <span id="image-placeholder" class="text-gray-500 dark:text-gray-300 text-xl">Preview Image</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-center gap-6 mt-8">
                            <x-secondary-button tag="a" href="{{ route('store') }}" class="px-8 py-3 rounded-lg bg-gray-600 hover:bg-gray-700 text-white transition duration-300">
                                {{ __('Cancel') }}
                            </x-secondary-button>
                            <x-primary-button name="save" class="px-8 py-3 rounded-lg bg-green-600 hover:bg-green-700 text-white transition duration-300">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(url) {
            const previewImage = document.getElementById('image-preview');
            const placeholder = document.getElementById('image-placeholder');

            if (url) {
                previewImage.src = url;
                previewImage.classList.remove('hidden');
                placeholder.classList.add('hidden');
            } else {
                previewImage.src = '';
                previewImage.classList.add('hidden');
                placeholder.classList.remove('hidden');
            }
        }
    </script>
</x-app-layout>
