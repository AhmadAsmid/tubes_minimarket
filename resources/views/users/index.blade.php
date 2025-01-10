<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Manajemen User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-purple-500 to-indigo-600 shadow-xl sm:rounded-lg">
                <div class="p-8 text-white">

                    @hasrole('manager')
                    <div class="mb-6 flex justify-end">
                        <x-primary-button tag="a" href="{{ route('user.create') }}"
                            class="bg-gradient-to-r from-green-400 to-teal-500 hover:from-teal-600 hover:to-green-400 transition duration-300 px-6 py-3 rounded-full shadow-lg text-white font-semibold">
                            <i class="fas fa-plus mr-2"></i> Tambah Akun
                        </x-primary-button>
                    </div>
                    @endhasrole

                    <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
                        <table class="table-auto w-full text-gray-900 dark:text-gray-100">
                            <thead>
                                <tr class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white text-left text-sm uppercase tracking-wide">
                                    <th scope="col" class="px-4 py-3">#</th>
                                    <th scope="col" class="px-4 py-3">Nama</th>
                                    <th scope="col" class="px-4 py-3">Username</th>
                                    <th scope="col" class="px-4 py-3">Email</th>
                                    <th scope="col" class="px-4 py-3">Cabang</th>
                                    <th scope="col" class="px-4 py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($users as $user)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-200">
                                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-3">{{ $user->name }}</td>
                                        <td class="px-4 py-3">{{ $user->username }}</td>
                                        <td class="px-4 py-3">{{ $user->email }}</td>
                                        <td class="px-4 py-3">{{ $user->store_id }}</td>
                                        <td class="px-4 py-3 text-center">
                                            <x-primary-button tag="a" href="{{ route('user.edit', $user->id) }}"
                                                class="text-sm bg-green-500 hover:bg-blue-700 text-white px-4 py-2 rounded-full shadow-md transition duration-300">
                                                <i class="fas fa-edit"></i> Edit
                                            </x-primary-button>
                                            <x-danger-button x-data=""
                                                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                                                x-on:click="$dispatch('set-action', '{{ route('user.destroy', $user->id) }}')"
                                                class="text-sm bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded-full shadow-md ml-2 transition duration-300">
                                                <i class="fas fa-trash"></i> Delete
                                            </x-danger-button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <x-modal name="confirm-user-deletion" focusable maxWidth="xl">
                        <form method="post" x-bind:action="action" class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                            @method('delete')
                            @csrf
                            <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">
                                {{ __('Apakah Anda Yakin?') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Data akan dihapus secara permanen dan tidak dapat dipulihkan.') }}
                            </p>
                            <div class="mt-6 flex justify-end space-x-4">
                                <x-secondary-button x-on:click="$dispatch('close')"
                                    class="bg-gray-400 hover:bg-gray-500 px-5 py-2 text-white rounded-lg transition duration-300">
                                    {{ __('Batal') }}
                                </x-secondary-button>
                                <x-danger-button class="bg-red-500 hover:bg-red-700 px-5 py-2 text-white rounded-lg transition duration-300">
                                    {{ __('Hapus') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
