<x-app-layout>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap');

        .pos-products {
            font-family: 'DM Sans', sans-serif;
        }
    </style>

    <div class="pos-products min-h-screen bg-[#FAF4E8] px-6 py-8">
        <div class="mx-auto max-w-3xl">

            <div class="mb-8">
                <h1 class="text-4xl font-bold text-[#111111]">
                    Edit Product
                </h1>
            </div>

            <div class="rounded-[28px] bg-white p-8 shadow-sm">

                @if ($errors->any())
                    <div class="mb-6 rounded-2xl bg-[#E9A8C7] p-4 text-[#111111]">
                        <p class="font-bold">Please fix the following errors:</p>

                        <ul class="mt-2 list-disc pl-5 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('products.update', $product) }}"
                      method="POST"
                      enctype="multipart/form-data"
                      class="space-y-6">

                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name"
                               class="mb-2 block text-sm font-semibold text-[#111111]">
                            Product Name
                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name', $product->name) }}"
                            required
                            class="w-full rounded-2xl border-[#E6DDCF] bg-[#FAF4E8] px-4 py-3 focus:border-[#111111] focus:ring-[#111111]"
                        >

                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        <div>
                            <label for="price"
                                   class="mb-2 block text-sm font-semibold text-[#111111]">
                                Price
                            </label>

                            <input
                                id="price"
                                type="number"
                                name="price"
                                step="0.01"
                                min="0"
                                value="{{ old('price', $product->price) }}"
                                required
                                class="w-full rounded-2xl border-[#E6DDCF] bg-[#FAF4E8] px-4 py-3 focus:border-[#111111] focus:ring-[#111111]"
                            >

                            @error('price')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="stock_quantity"
                                   class="mb-2 block text-sm font-semibold text-[#111111]">
                                Stock Quantity
                            </label>

                            <input
                                id="stock_quantity"
                                type="number"
                                name="stock_quantity"
                                min="0"
                                value="{{ old('stock_quantity', $product->stock_quantity) }}"
                                required
                                class="w-full rounded-2xl border-[#E6DDCF] bg-[#FAF4E8] px-4 py-3 focus:border-[#111111] focus:ring-[#111111]"
                            >

                            @error('stock_quantity')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div>
                        <label for="image"
                               class="mb-2 block text-sm font-semibold text-[#111111]">
                            Replace Product Image
                        </label>

                        <input
                            id="image"
                            type="file"
                            name="image"
                            accept="image/jpeg,image/png,image/webp"
                            class="w-full rounded-2xl border border-[#E6DDCF] bg-[#FAF4E8] px-4 py-3"
                        >

                        @error('image')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    @if ($product->image)
                        <div class="rounded-2xl bg-[#ffffff] p-4">
                            <p class="mb-3 text-sm font-semibold text-[#111111]">
                                Current Image
                            </p>

                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}"
                                class="h-40 w-40 rounded-2xl object-cover"
                            >
                        </div>
                    @endif

                    <div class="flex flex-col gap-3 pt-4 sm:flex-row">

                        <button
                            type="submit"
                            class="rounded-full bg-[#111111] px-6 py-3 text-sm font-semibold text-white hover:bg-[#333333]">
                            Update Product
                        </button>

                        <a href="{{ route('products.index') }}"
                           class="rounded-full bg-[#F5DB58] px-6 py-3 text-center text-sm font-semibold text-[#111111]">
                            Cancel
                        </a>

                    </div>

                </form>
            </div>
        </div>
    </div>

</x-app-layout>