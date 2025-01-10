<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white dark:bg-gray-700 text-red-400 dark:text-gray-300 py-4 px-6 rounded-lg shadow-lg">
            <h2 class="font-semibold text-xl leading-tight">
                {{ __('Cabang Cipanas') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-6 px-4">
        <!-- Search Form -->
        <form method="GET" action="{{ route('transaction') }}" class="mb-8">
            <div class="flex items-center space-x-4">
                <input
                    type="text"
                    name="search_product"
                    value="{{ $search }}"
                    placeholder="Cari produk..."
                    class="w-full px-6 py-3 border border-gray-300 rounded-lg dark:bg-gray-800 dark:text-gray-200 dark:border-gray-600"
                />
                <button
                    type="submit"
                    class="px-6 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-200"
                >
                    Cari
                </button>
            </div>
        </form>

        <!-- Transaction Form -->
        <form action="{{ route('transaction.store') }}" method="POST" id="transaction-form">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="col-span-2 sm:col-span-2 lg:col-span-2">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @forelse ($products as $product)
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl hover:shadow-2xl transition-shadow p-6">
                                <div class="text-center mb-6">
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-52 object-cover rounded-lg">
                                </div>
                                <div class="text-center text-gray-800 dark:text-gray-100">
                                    <h3 class="font-semibold text-xl">{{ $product->name }}</h3>
                                    <p class="text-sm">Stok: {{ $product->stock }}</p>
                                    <p class="text-lg font-bold text-red-600">Rp {{ number_format($product->price, 2) }}</p>
                                    <div class="mt-4 flex justify-center items-center space-x-4">
                                        <input
                                            type="checkbox"
                                            name="product_ids[]"
                                            value="{{ $product->id }}"
                                            data-name="{{ $product->name }}"
                                            data-price="{{ $product->price }}"
                                            class="mr-2"
                                        />
                                        <input
                                            type="number"
                                            name="qty[{{ $product->id }}]"
                                            min="1"
                                            max="{{ $product->stock }}"
                                            value="1"
                                            class="w-16 bg-gray-100 dark:bg-gray-700 text-center border rounded-md"
                                            data-price="{{ $product->price }}"
                                        />
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

                <!-- Transaction Summary Section -->
                <div class="col-span-1 bg-white dark:bg-gray-800 p-8 rounded-lg shadow-xl">
    <h2 class="text-2xl text-red-600 dark:text-gray-100 font-bold mb-6 text-center">Transaksi</h2>

    <div id="selected-products" class="mb-6">
        <h3 class="text-lg text-red-600 dark:text-gray-100 font-semibold mb-4">Produk yang Dipilih:</h3>
        <ul id="product-list" class="list-none p-0 space-y-3"></ul>
    </div>

    <!-- Total Payment -->
    <div class="text-center mb-8">
        <div class="flex justify-between items-center mb-3">
            <span class="font-bold text-xl text-gray-600 dark:text-gray-200">Total Bayar:</span>
        </div>
        <div class="flex justify-between items-center">
            <span id="total-amount" class="font-extrabold text-3xl text-red-600 dark:text-gray-100">Rp 0</span>
        </div>
        <div class="mt-3 px-4 py-2 bg-gradient-to-r from-pink-500 via-red-500 to-orange-500 rounded-full text-white shadow-lg text-xl">
            <span id="total-amount" class="font-bold text-xl">Total Pembayaran: Rp 0</span>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="text-center mt-6">
        <x-danger-button
            x-data
            x-on:click="$dispatch('open-modal', 'success-transaction'); action='{{ route('transaction.store') }}'"
            class="px-8 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-200 shadow-xl transform hover:scale-105"
        >
            {{ __('Pesan') }}
        </x-danger-button>
    </div>
</div>


                <!-- Pagination -->
                <div class="col-span-3 mt-6">
                    <div class="flex justify-center">
                        {{ $products->links() }}
                    </div>
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
