<x-app-layout>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap');

        .pos-sales {
            font-family: 'DM Sans', sans-serif;
        }
    </style>

    <div class="pos-sales min-h-screen bg-[#FAF4E8] px-6 py-8">
        <div class="mx-auto max-w-3xl">

            <div class="mb-8">
                <h1 class="text-4xl font-bold text-[#111111]">
                    Record Sale
                </h1>
            </div>

            <div class="rounded-[28px] bg-white p-8 shadow-sm">

                @if ($errors->any())
                    <div class="mb-6 rounded-2xl bg-[#F3EEE5] p-4 text-red-600">
                        <p class="font-bold">Please fix the following errors:</p>

                        <ul class="mt-2 list-disc pl-5 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('sales.store') }}"
                      method="POST"
                      class="space-y-6">

                    @csrf

                    <div>
                        <label for="product_id"
                               class="mb-2 block text-sm font-semibold text-[#111111]">
                            Product
                        </label>

                        <select
                            id="product_id"
                            name="product_id"
                            required
                            class="w-full rounded-2xl border-[#E6DDCF] bg-[#FAF4E8] px-4 py-3"
                        >
                            <option value="">Select a product</option>

                            @foreach ($products as $product)
                                <option
                                    value="{{ $product->id }}"
                                    data-price="{{ $product->price }}"
                                    data-stock="{{ $product->stock_quantity }}"
                                    @selected(old('product_id') == $product->id)
                                >
                                    {{ $product->name }}
                                    — ₱{{ number_format($product->price, 2) }}
                                    — Stock: {{ $product->stock_quantity }}
                                </option>
                            @endforeach
                        </select>

                        @error('product_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="customer_id"
                               class="mb-2 block text-sm font-semibold text-[#111111]">
                            Customer
                            <span class="font-normal text-[#756F68]">(Optional)</span>
                        </label>

                        <select
                            id="customer_id"
                            name="customer_id"
                            class="w-full rounded-2xl border-[#E6DDCF] bg-[#FAF4E8] px-4 py-3"
                        >
                            <option value="">Walk-in Customer</option>

                            @foreach ($customers as $customer)
                                <option
                                    value="{{ $customer->id }}"
                                    @selected(old('customer_id') == $customer->id)
                                >
                                    {{ $customer->full_name }}
                                </option>
                            @endforeach
                        </select>

                        @error('customer_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="quantity"
                               class="mb-2 block text-sm font-semibold text-[#111111]">
                            Quantity
                        </label>

                        <input
                            id="quantity"
                            type="number"
                            name="quantity"
                            min="1"
                            value="{{ old('quantity', 1) }}"
                            required
                            class="w-full rounded-2xl border-[#E6DDCF] bg-[#FAF4E8] px-4 py-3"
                        >

                        @error('quantity')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                        <div class="rounded-2xl bg-[#A8C0E8] p-5">
                            <p class="text-sm font-semibold text-[#111111]">
                                Available Stock
                            </p>

                            <p id="available-stock"
                               class="mt-2 text-3xl font-bold text-[#111111]">
                                —
                            </p>
                        </div>

                        <div class="rounded-2xl bg-[#E9A8C7] p-5">
                            <p class="text-sm font-semibold text-[#111111]">
                                Estimated Total
                            </p>

                            <p class="mt-2 text-3xl font-bold text-[#111111]">
                                ₱<span id="total-price">0.00</span>
                            </p>
                        </div>

                    </div>

                    <div class="flex flex-col gap-3 pt-4 sm:flex-row">

                        <button
                            type="submit"
                            class="rounded-full bg-[#111111] px-6 py-3 text-sm font-semibold text-white">
                            Record Sale
                        </button>

                        <a href="{{ route('sales.index') }}"
                           class="rounded-full bg-[#F5DB58] px-6 py-3 text-center text-sm font-semibold text-[#111111]">
                            Cancel
                        </a>

                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        const productSelect = document.getElementById('product_id');
        const quantityInput = document.getElementById('quantity');
        const stockDisplay = document.getElementById('available-stock');
        const totalDisplay = document.getElementById('total-price');

        function updateSaleSummary() {
            const option = productSelect.options[productSelect.selectedIndex];

            if (!option || !option.dataset.price) {
                stockDisplay.textContent = '—';
                totalDisplay.textContent = '0.00';
                return;
            }

            const price = parseFloat(option.dataset.price);
            const stock = option.dataset.stock;
            const quantity = parseInt(quantityInput.value) || 0;

            stockDisplay.textContent = stock;
            totalDisplay.textContent = (price * quantity).toFixed(2);
        }

        productSelect.addEventListener('change', updateSaleSummary);
        quantityInput.addEventListener('input', updateSaleSummary);

        updateSaleSummary();
    </script>

</x-app-layout>