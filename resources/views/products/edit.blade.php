<x-app-layout>
    <x-slot name="header">
        <h2>Edit Product</h2>
    </x-slot>

    <div class="p-6">
        <form action="{{ route('products.update', $product) }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="text" name="name"
                   value="{{ old('name', $product->name) }}">

            <input type="number" name="price" step="0.01"
                   value="{{ old('price', $product->price) }}">

            <input type="number" name="stock_quantity"
                   value="{{ old('stock_quantity', $product->stock_quantity) }}">

            <input type="file" name="image">

            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" width="100">
            @endif

            <button type="submit">Update Product</button>
        </form>
    </div>
</x-app-layout>