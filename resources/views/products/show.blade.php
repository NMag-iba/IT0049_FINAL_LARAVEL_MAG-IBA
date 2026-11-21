<x-app-layout>
    <x-slot name="header">
        <h2>Product Details</h2>
    </x-slot>

    <div class="p-6">
        @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" width="200">
        @endif

        <h1>{{ $product->name }}</h1>
        <p>Price: ₱{{ number_format($product->price, 2) }}</p>
        <p>Stock: {{ $product->stock_quantity }}</p>

        <a href="{{ route('products.index') }}">Back to Products</a>
    </div>
</x-app-layout>