<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Kategori Produk</h1>
            <button 
                onclick="window.location.href='{{ route('category.create') }}'" 
                class="bg-gradient-to-r from-red-400 to-red-600 hover:from-red-500 hover:to-red-700 text-white py-3 px-8 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                Tambah Kategori
            </button>
        </div>
    </x-slot>

    <main class="container mx-auto mt-6 px-4">
        <div class="overflow-x-auto rounded-lg shadow-lg">
            <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg">
                <thead class="bg-gradient-to-r from-red-400 to-red-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left">ID</th>
                        <th class="px-6 py-3 text-left">Nama Kategori</th>
                        <th class="px-6 py-3 text-left">Kode Kategori</th>
                        @hasrole('inventory')
                            <th class="px-6 py-3 text-left">Aksi</th>
                        @endhasrole
                    </tr>
                </thead>
                <tbody class="text-gray-700 dark:text-gray-200">
                    @foreach ($categories as $category)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-300">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $category->name }}</td>
                            <td class="px-6 py-4">{{ $category->code }}</td>
                            @hasrole('inventory')
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <x-primary-button tag="a" href="{{ route('category.edit', $category->id) }}" class="py-2 px-6 text-sm">
                                            <i class="fas fa-edit"></i> Ubah
                                        </x-primary-button>
                                        <x-danger-button x-data=""
                                            x-on:click.prevent="$dispatch('open-modal', 'confirm-category-deletion')"
                                            x-on:click="$dispatch('set-action', '{{ route('category.destroy', $category->id) }}')" class="py-2 px-6 text-sm">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </x-danger-button>
                                    </div>
                                </td>
                            @endhasrole
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <x-modal name="confirm-category-deletion" focusable maxWidth="xl">
            <form method="post" x-bind:action="action" class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                @method('delete')
                @csrf
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Apakah Anda yakin ingin menghapus kategori ini?') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Data yang dihapus tidak dapat dikembalikan.') }}
                </p>
                <div class="mt-6 flex justify-end space-x-4">
                    <x-secondary-button x-on:click="$dispatch('close')" class="bg-gray-300 hover:bg-gray-400 text-gray-700 dark:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600">
                        {{ __('Batal') }}
                    </x-secondary-button>
                    <x-danger-button class="ml-3">
                        {{ __('Hapus Kategori') }}
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
    </main>
</x-app-layout>
