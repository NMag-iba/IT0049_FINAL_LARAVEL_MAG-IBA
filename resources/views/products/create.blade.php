<x-app-layout>
    <x-slot name="header">
        <h2>Add Product</h2>
    </x-slot>

    <div class="p-6">
        <form action="{{ route('products.store') }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf

            <input type="text" name="name" placeholder="Product name"
                   value="{{ old('name') }}">
            @error('name') <p>{{ $message }}</p> @enderror

            <input type="number" name="price" step="0.01"
                   placeholder="Price" value="{{ old('price') }}">
            @error('price') <p>{{ $message }}</p> @enderror

            <input type="number" name="stock_quantity"
                   placeholder="Stock quantity"
                   value="{{ old('stock_quantity') }}">
            @error('stock_quantity') <p>{{ $message }}</p> @enderror

            <input type="file" name="image">
            @error('image') <p>{{ $message }}</p> @enderror

            <button type="submit">Save Product</button>
        </form>
    </div>
</x-app-layout>