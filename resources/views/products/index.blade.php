<x-app-layout>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap');

        .pos-products {
            font-family: 'DM Sans', sans-serif;
        }
    </style>

    <div class="pos-products min-h-screen bg-[#FAF4E8] px-6 py-8">

        <div class="mx-auto max-w-7xl">

            <!-- Page Header -->
            <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">
                <div>

                    <h1 class="text-4xl font-bold text-[#111111]">
                        Products
                    </h1>
                </div>

                <a href="{{ route('products.create') }}"
                   class="rounded-full bg-[#111111] px-6 py-3 text-center text-sm font-semibold text-white transition hover:bg-[#333333]">
                    Add Product
                </a>
            </div>

            @if (session('success'))
                <div class="mb-6 rounded-2xl bg-[#AFC477] px-5 py-4 font-medium text-[#111111]">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Product Cards -->
            @forelse ($products as $product)
                @if ($loop->first)
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-3">
                @endif

                <div class="overflow-hidden rounded-[28px] bg-white shadow-sm">

                    <!-- Product Image -->
                    <div class="flex h-56 items-center justify-center bg-[#FFFFF] p-5">
                        @if ($product->image)
                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}"
                                class="h-full w-full rounded-2xl object-contain"
                            >
                        @else
                            <div class="flex h-full w-full items-center justify-center rounded-2xl bg-[#A8C0E8] text-sm font-semibold text-[#111111]">
                                No image available
                            </div>
                        @endif
                    </div>

                    <!-- Product Details -->
                    <div class="p-6">

                        <div class="mb-5 flex items-start justify-between gap-4">
                            <div>
                                <h2 class="text-xl font-bold text-[#111111]">
                                    {{ $product->name }}
                                </h2>

                                <p class="mt-2 text-2xl font-bold text-[#756F68]">
                                    ₱{{ number_format($product->price, 2) }}
                                </p>
                            </div>

                            @if ($product->stock_quantity <= 5)
                                <span class="whitespace-nowrap rounded-full bg-[#E9A8C7] px-3 py-2 text-xs font-bold text-[#111111]">
                                    Low stock
                                </span>
                            @else
                                <span class="whitespace-nowrap rounded-full bg-[#AFC477] px-3 py-2 text-xs font-bold text-[#111111]">
                                    In stock
                                </span>
                            @endif
                        </div>

                        <div class="mb-6 flex items-center justify-between border-t border-[#EEE7DC] pt-4">
                            <span class="text-sm text-[#756F68]">
                                Available stock
                            </span>

                            <span class="font-bold text-[#111111]">
                                {{ $product->stock_quantity }}
                            </span>
                        </div>

                        <!-- Actions -->
                        <div class="grid grid-cols-3 gap-2">

                            <a href="{{ route('products.show', $product) }}"
                               class="rounded-full bg-[#A8C0E8] px-3 py-2 text-center text-sm font-semibold text-[#111111] hover:opacity-80">
                                View
                            </a>

                            <a href="{{ route('products.edit', $product) }}"
                               class="rounded-full bg-[#F5DB58] px-3 py-2 text-center text-sm font-semibold text-[#111111] hover:opacity-80">
                                Edit
                            </a>

                            <form action="{{ route('products.destroy', $product) }}"
                                method="POST"
                                class="m-0">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Archive this product?')"
                                        class="rounded-full bg-[#111111] px-5 py-2 text-sm font-semibold text-white">
                                    Archive
                                </button>
                            </form>

                        </div>
                    </div>
                </div>

                @if ($loop->last)
                    </div>
                @endif

            @empty
                <div class="rounded-[28px] bg-white p-12 text-center shadow-sm">
                    <h2 class="text-xl font-bold text-[#111111]">
                        No products found
                    </h2>

                    <p class="mt-2 text-[#756F68]">
                        Add your first product to begin managing inventory.
                    </p>

                    <a href="{{ route('products.create') }}"
                       class="mt-6 inline-block rounded-full bg-[#111111] px-6 py-3 text-sm font-semibold text-white">
                        Add Product
                    </a>
                </div>
            @endforelse

        </div>
    </div>

</x-app-layout>