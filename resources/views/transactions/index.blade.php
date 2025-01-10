<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-gradient-to-r from-indigo-600 to-blue-500 text-white py-6 px-8 rounded-lg shadow-lg">
            <h2 class="font-semibold text-2xl leading-tight">
                {{ __('Cabang Cipanas') }}
            </h2>
            <div class="relative">
                <input type="text" name="search_product" value="{{ $search }}" placeholder="Cari produk..."
                    class="px-4 py-2 w-72 bg-gray-200 text-gray-700 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 focus:outline-none">
                    Cari
                </button>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-8 px-4">
        <!-- Transaction Form -->
        <form action="{{ route('transaction.store') }}" method="POST" id="transaction-form" class="space-y-10">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <div class="lg:col-span-2 space-y-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @forelse ($products as $product)
                            <div class="bg-white dark:bg-gray-700 hover:shadow-lg transition-shadow rounded-lg p-4">
                                <div class="relative">
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-md shadow-md">
                                    <div class="absolute top-0 left-0 bg-blue-500 text-white text-xs px-2 py-1 rounded-br-md">Stok: {{ $product->stock }}</div>
                                </div>
                                <div class="mt-4 text-center">
                                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ $product->name }}</h3>
                                    <p class="mt-2 text-lg font-bold text-blue-500">Rp {{ number_format($product->price, 2) }}</p>
                                    <div class="flex items-center justify-center mt-4 space-x-4">
                                        <input type="checkbox" name="product_ids[]" value="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}" class="mr-2 text-blue-600"/>
                                        <input type="number" name="qty[{{ $product->id }}]" min="1" max="{{ $product->stock }}" value="1" class="w-16 bg-gray-100 text-center border rounded-md">
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-3 text-center">
                                <p class="text-lg text-gray-500 dark:text-gray-400">Tidak ada produk yang ditemukan.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Transaction Summary -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl text-blue-600 dark:text-gray-100 font-bold mb-6 text-center">Ringkasan Transaksi</h2>

                    <div id="selected-products" class="mb-6 space-y-4">
                        <h3 class="text-lg text-blue-600 dark:text-gray-100 font-semibold">Produk yang Dipilih:</h3>
                        <ul id="product-list" class="list-none p-0 space-y-3"></ul>
                    </div>

                    <div class="text-center mb-8">
                        <div class="flex justify-between items-center mb-3">
                            <span class="font-bold text-xl text-gray-600 dark:text-gray-200">Total Bayar:</span>
                        </div>
                        <div class="flex justify-between items-center mb-6">
                            <span id="total-amount" class="font-extrabold text-4xl text-blue-600 dark:text-gray-100">Rp 0</span>
                        </div>
                        <div class="flex justify-center items-center mb-8">
                            <div class="bg-gradient-to-r from-green-400 via-blue-500 to-indigo-600 text-white text-xl py-3 px-6 rounded-full shadow-lg transform hover:scale-110 transition duration-300">
                                <span id="total-amount" class="font-bold text-xl">Total Pembayaran: Rp 0</span>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-6">
                        <x-danger-button
                            x-data
                            x-on:click="$dispatch('open-modal', 'success-transaction'); action='{{ route('transaction.store') }}'"
                            class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 shadow-lg transform hover:scale-105"
                        >
                            {{ __('Pesan') }}
                        </x-danger-button>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="col-span-3 mt-6">
                <div class="flex justify-center">
                    {{ $products->links() }}
                </div>
            </div>
        </form>
    </div>

    <!-- Modal Success Transaction -->
    <x-modal name="success-transaction" focusable maxWidth="xl" x-data="{ action: '' }">
        <form method="post" x-bind:action="action" class="p-6">
            @csrf
            <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Transaksi berhasil') }}
            </h1>
        </form>
    </x-modal>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = document.querySelectorAll('input[name="product_ids[]"]');
            const productList = document.getElementById('product-list');
            const totalAmountElement = document.getElementById('total-amount');

            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener('change', function () {
                    updateSelectedProducts();
                });
            });

            function attachQtyListeners() {
                const qtyInputs = document.querySelectorAll('input[name^="qty["]');
                qtyInputs.forEach((input) => {
                    input.addEventListener('input', function () {
                        updateSelectedProducts();
                    });
                });
            }

            function updateSelectedProducts() {
                productList.innerHTML = '';
                let totalAmount = 0;

                checkboxes.forEach((checkbox) => {
                    if (checkbox.checked) {
                        const productId = checkbox.value;
                        const productName = checkbox.getAttribute('data-name');
                        const productPrice = parseFloat(checkbox.getAttribute('data-price'));
                        const qtyInput = document.querySelector(`input[name="qty[${productId}]"]`);
                        const qty = qtyInput ? parseInt(qtyInput.value) : 1;

                        totalAmount += productPrice * qty;

                        const nameWords = productName.split(" ").slice(0, 10).join(" ");
                        const truncatedName = (productName.split(" ").length > 10) ? nameWords + '...' : nameWords;

                        const formattedPrice = productPrice.toLocaleString('id-ID');
                        const listItem = document.createElement('li');
                        listItem.classList.add('mb-2', 'flex', 'justify-between', 'items-center');
                        listItem.innerHTML = `
                            <span class="text-gray-100 font-bold">${truncatedName}</span>
                            <span class="text-gray-100 text-right"> ${qty} x Rp ${formattedPrice}</span>
                        `;
                        productList.appendChild(listItem);
                    }
                });

                totalAmountElement.textContent = `Rp ${totalAmount.toLocaleString('id-ID')}`;
                attachQtyListeners();
            }

            attachQtyListeners();
        });
    </script>
</x-app-layout>
