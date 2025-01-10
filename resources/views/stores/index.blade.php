<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Store Management') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-2xl rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    
                    @hasrole('owner')
                    <div class="mb-8 flex justify-end">
                        <x-primary-button tag="a" href="{{ route('store.create') }}" 
                            class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-purple-600 hover:to-blue-500 text-white px-6 py-3 rounded-lg shadow-lg transition-all duration-300">
                            Tambah Cabang
                        </x-primary-button>
                    </div>
                    @endhasrole

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($stores as $store)
                            <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                                <div class="overflow-hidden h-48 bg-gray-300 dark:bg-gray-600 rounded-t-lg">
                                    <img src="{{ $store->image_url }}" alt="{{ $store->name }}" 
                                        class="w-full h-full object-cover object-center">
                                </div>
                                <div class="p-6">
                                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-2">{{ $store->name }}</h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $store->location }}</p>
                                </div>

                                @hasrole('owner')
                                <div class="flex justify-between items-center p-4 bg-gray-50 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-600">
                                    <x-primary-button tag="a" href="{{ route('store.edit', $store->id) }}" 
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                                        Edit
                                    </x-primary-button>
                                    <x-danger-button x-data="" 
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-store-deletion')" 
                                        x-on:click="$dispatch('set-action', '{{ route('store.destroy', $store->id) }}')"
                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">
                                        Hapus
                                    </x-danger-button>
                                </div>
                                @endhasrole
                            </div>
                        @endforeach
                    </div>

                    <x-modal name="confirm-store-deletion" focusable maxWidth="xl">
                        <form method="post" x-bind:action="action" class="p-6">
                            @method('delete')
                            @csrf
                            <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100">
                                {{ __('Apakah Anda yakin ingin menghapus cabang ini?') }}
                            </h2>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Data akan dihapus secara permanen setelah proses ini.') }}
                            </p>
                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')" 
                                    class="bg-gray-300 dark:bg-gray-600 hover:bg-gray-400 dark:hover:bg-gray-500 text-black dark:text-white px-4 py-2 rounded-lg">
                                    {{ __('Cancel') }}
                                </x-secondary-button>
                                <x-danger-button class="ml-3 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">
                                    {{ __('Delete') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
