<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('product') }}" class="text-red-600 hover:text-red-400 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-2xl text-red-400 font-semibold dark:text-gray-300 leading-tight">
                {{ __('Tambah Produk') }}
            </h1>
        </div>
    </x-slot>

    <main class="container mx-auto mt-8 px-8">
        <form method="post" action="{{ route('product.store') }}" class="space-y-8 bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="max-w-xl">
                    <x-input-label for="name" value="Nama Produk" />
                    <x-text-input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 dark:focus:ring-red-500" required placeholder="Masukkan Nama Produk" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div class="max-w-xl">
                    <x-input-label for="unit" value="Satuan Produk" />
                    <x-text-input id="unit" type="text" name="unit" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 dark:focus:ring-red-500" value="{{ old('unit') }}" required placeholder="Masukkan Satuan Produk" />
                    <x-input-error class="mt-2" :messages="$errors->get('unit')" />
                </div>
                <div class="max-w-xl">
                    <x-input-label for="price" value="Harga Produk" />
                    <x-text-input id="price" type="text" name="price" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 dark:focus:ring-red-500" value="{{ old('price') }}" required placeholder="Masukkan Harga Produk" />
                    <x-input-error class="mt-2" :messages="$errors->get('price')" />
                </div>
                <div class="max-w-xl">
                    <x-input-label for="category" value="Kategori Produk" />
                    <x-select-input id="category" name="category_id" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 dark:focus:ring-red-500" required>
                        <option value="">Pilih Kategori Produk</option>
                        @foreach ($categories as $key => $value)
                            <option value="{{ $key }}" {{ old('category_id') == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </x-select-input>
                </div>
                <div class="max-w-xl">
                    <x-input-label for="image_url" value="URL Gambar" />
                    <x-text-input type="text" name="image_url" id="image_url" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 dark:focus:ring-red-500" required placeholder="Masukkan URL gambar" />
                    <x-input-error class="mt-2" :messages="$errors->get('image_url')" />
                </div>
            </div>

            <div class="flex justify-between mt-6">
                <x-secondary-button tag="a" href="{{ route('product') }}" class="bg-gray-500 hover:bg-gray-600 text-white transition-colors duration-300 rounded-lg px-6 py-3 shadow-md">
                    {{ __('Batal') }}
                </x-secondary-button>
                <x-primary-button class="bg-red-600 hover:bg-red-700 text-white transition-colors duration-300 rounded-lg px-6 py-3 shadow-md">
                    {{ __('Tambah') }}
                </x-primary-button>
            </div>
        </form>
    </main>
</x-app-layout>
