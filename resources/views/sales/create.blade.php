<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Record Sale
        </h2>
    </x-slot>

    <div class="p-6">

        @if ($errors->any())
            <div style="color: red; margin-bottom: 15px;">
                <strong>Please fix the following errors:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('sales.store') }}" method="POST">
            @csrf

            <div>
                <label for="product_id">Product</label>

                <select name="product_id"
                        id="product_id"
                        required>
                    <option value="">Select a product</option>

                    @foreach ($products as $product)
                        <option value="{{ $product->id }}"
                                data-price="{{ $product->price }}"
                                data-stock="{{ $product->stock_quantity }}"
                                @selected(old('product_id') == $product->id)>
                            {{ $product->name }}
                            - ₱{{ number_format($product->price, 2) }}
                            - Stock: {{ $product->stock_quantity }}
                        </option>
                    @endforeach
                </select>
            </div>

            <br>

            <div>
                <label for="customer_id">
                    Customer
                </label>

                <select name="customer_id" id="customer_id">
                    <option value="">Walk-in Customer</option>

                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}"
                                @selected(old('customer_id') == $customer->id)>
                            {{ $customer->full_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <br>

            <div>
                <label for="quantity">Quantity</label>

                <input type="number"
                       name="quantity"
                       id="quantity"
                       min="1"
                       value="{{ old('quantity', 1) }}"
                       required>

                @error('quantity')
                    <p style="color: red;">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <br>

            <p>
                Available Stock:
                <strong id="available-stock">-</strong>
            </p>

            <p>
                Estimated Total:
                ₱<strong id="total-price">0.00</strong>
            </p>

            <button type="submit">
                Record Sale
            </button>
        </form>
    </div>

    <script>
        const productSelect = document.getElementById('product_id');
        const quantityInput = document.getElementById('quantity');
        const availableStock = document.getElementById('available-stock');
        const totalPrice = document.getElementById('total-price');

        function calculateTotal() {
            const selectedOption =
                productSelect.options[productSelect.selectedIndex];

            if (!selectedOption || !selectedOption.dataset.price) {
                availableStock.textContent = '-';
                totalPrice.textContent = '0.00';
                return;
            }

            const price = parseFloat(selectedOption.dataset.price);
            const stock = selectedOption.dataset.stock;
            const quantity = parseInt(quantityInput.value) || 0;

            availableStock.textContent = stock;
            totalPrice.textContent = (price * quantity).toFixed(2);
        }

        productSelect.addEventListener('change', calculateTotal);
        quantityInput.addEventListener('input', calculateTotal);

        calculateTotal();
    </script>
</x-app-layout>