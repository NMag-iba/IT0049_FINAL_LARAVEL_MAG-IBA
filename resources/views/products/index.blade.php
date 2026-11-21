<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Products</h2>
    </x-slot>

    <div class="p-6">
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif

        <a href="{{ route('products.create') }}">Add Product</a>

        <table border="1" cellpadding="10">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>

            @forelse ($products as $product)
                <tr>
                    <td>
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}"
                                 width="80">
                        @else
                            No image
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>₱{{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->stock_quantity }}</td>
                    <td>
                        <a href="{{ route('products.show', $product) }}">View</a>
                        <a href="{{ route('products.edit', $product) }}">Edit</a>

                        <form action="{{ route('products.destroy', $product) }}"
                              method="POST"
                              style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    onclick="return confirm('Delete this product?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No products found.</td>
                </tr>
            @endforelse
        </table>
    </div>
</x-app-layout>