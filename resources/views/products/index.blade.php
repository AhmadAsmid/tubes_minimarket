<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold text-center text-blue-500 dark:text-gray-200">
            Kelola Produk
        </h1>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-8 px-6">
        <div class="flex justify-end mb-6">
            <button
                onclick="window.location.href='{{ route('product.create') }}'"
                class="bg-blue-500 hover:bg-blue-400 text-white py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                Tambah Produk
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">
            @foreach ($products as $product)
                <div class="flex flex-col bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                    <div class="p-4 flex flex-col flex-grow">
                        <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100 text-center mb-2">{{ $product->name }}</h2>
                        <p class="text-gray-700 dark:text-gray-300 text-center">Harga: <span class="font-semibold">Rp {{ number_format($product->price, 0, ',', '.') }}</span></p>
                        <p class="text-gray-700 dark:text-gray-300 text-center mb-4">Stock: <span class="font-semibold">{{ $product->stock }} {{ $product->unit }}</span></p>
                        <div class="mt-auto flex justify-center space-x-3">
                            <a href="{{ route('product.edit', $product->id) }}" class="bg-yellow-500 hover:bg-yellow-400 text-white py-2 px-4 rounded-md text-sm transition">
                                Ubah
                            </a>
                            <a href="{{ route('product.addStock', $product->id) }}" class="bg-green-500 hover:bg-green-400 text-white py-2 px-4 rounded-md text-sm transition">
                                Tambah Stok
                            </a>
                            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-product-deletion')" x-on:click="$dispatch('set-action', '{{ route('product.destroy', $product->id) }}')" class="bg-red-500 hover:bg-red-400 text-white py-2 px-4 rounded-md text-sm transition">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <x-modal name="confirm-product-deletion" focusable maxWidth="xl">
            <form method="post" x-bind:action="action" class="p-6 bg-gray-100 dark:bg-gray-700 rounded-lg">
                @method('delete')
                @csrf
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 text-center mb-4">
                    {{ __('Apakah Anda yakin ingin menghapus produk ini?') }}
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 text-center mb-6">
                    {{ __('Data akan hilang secara permanen setelah dihapus.') }}
                </p>
                <div class="flex justify-center space-x-3">
                    <button type="button" x-on:click="$dispatch('close')" class="bg-gray-500 hover:bg-gray-400 text-white py-2 px-6 rounded-md">
                        {{ __('Batal') }}
                    </button>
                    <button type="submit" class="bg-red-500 hover:bg-red-400 text-white py-2 px-6 rounded-md">
                        {{ __('Hapus') }}
                    </button>
                </div>
            </form>
        </x-modal>
    </div>
</x-app-layout>
