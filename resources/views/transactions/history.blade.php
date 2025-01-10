<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-gradient-to-r from-purple-600 to-red-400 text-white py-4 px-6 rounded-lg shadow-lg">
            <h2 class="font-semibold text-xl leading-tight">
                {{ __('Cabang ' . $storeName) }}
            </h2>

            <a href="{{ route('history.print') }}" class="bg-green-500 hover:bg-green-400 text-white py-2 px-6 rounded-lg shadow-md transition duration-300 transform hover:scale-105">
                Cetak Riwayat Transaksi
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-6 px-4">
        <div class="overflow-x-auto rounded-lg shadow-lg">
            <table class="table-auto w-full bg-white dark:bg-gray-800 border-collapse rounded-lg">
                <thead class="bg-gradient-to-r from-purple-600 to-red-400 text-white text-sm">
                    <tr>
                        <th class="px-6 py-3 text-left">No</th>
                        <th class="px-6 py-3 text-left">Kode Transaksi</th>
                        <th class="px-6 py-3 text-left">Tanggal</th>
                        <th class="px-6 py-3 text-left">Total Bayar</th>
                        <th class="px-6 py-3 text-left">Kasir</th>
                        <th class="px-6 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800 dark:text-gray-300">
                    @foreach ($transactions as $transaction)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $transaction->code }}</td>
                            <td class="px-6 py-4">{{ $transaction->date }}</td>
                            <td class="px-6 py-4 font-bold text-lg text-red-500 dark:text-gray-100">
                                <span class="text-sm">Rp</span>
                                <span>{{ number_format($transaction->total, 2, ',', '.') }}</span>
                            </td>
                            <td class="px-6 py-4">{{ $transaction->user->name }}</td>

                            <td class="px-6 py-4">
                                <a href="{{ route('transaction.detail', $transaction->id) }}" class="inline-block bg-gradient-to-r from-red-500 to-purple-600 hover:from-red-400 hover:to-purple-500 text-white py-2 px-6 rounded-lg transition duration-300 transform hover:scale-105">
                                    Lihat Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
