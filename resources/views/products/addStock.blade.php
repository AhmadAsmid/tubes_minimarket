<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('product') }}" class="text-purple-600 hover:text-purple-400 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h2 class="text-3xl text-red-400 font-semibold dark:text-gray-300 leading-tight">
                {{ __('Tambah Stok') }}
            </h2>
        </div>
    </x-slot>

    <div class="flex-grow container mx-auto mt-8 px-8">
        <form method="post" action="{{ route('product.updateStock', $product->id) }}" enctype="multipart/form-data" class="space-y-6 bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
            @method('PATCH')
            @csrf

            <div class="max-w-xl mx-auto">
                <x-input-label for="stock" value="Stock" />
                <x-text-input 
                    id="stock" 
                    type="number" 
                    name="stock" 
                    class="mt-2 block w-full rounded-lg shadow-md border-2 border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600 dark:focus:ring-indigo-500 dark:focus:border-indigo-500" 
                    required 
                    placeholder="Masukkan jumlah stok"
                />
                <x-input-error class="mt-2" :messages="$errors->get('stock')" />
            </div>

            <div class="flex justify-between mt-6">
                <x-secondary-button 
                    tag="a" 
                    href="{{ route('product') }}" 
                    class="bg-gray-500 hover:bg-gray-600 text-white transition-colors duration-300 rounded-lg px-6 py-2 shadow-md">
                    {{ __('Batal') }}
                </x-secondary-button>
                <x-primary-button 
                    class="bg-green-600 hover:bg-green-700 text-white transition-colors duration-300 rounded-lg px-6 py-2 shadow-md">
                    {{ __('Tambah') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
