<x-app-layout>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap');

        .pos-products {
            font-family: 'DM Sans', sans-serif;
        }
    </style>

    <div class="pos-products min-h-screen bg-[#FAF4E8] px-6 py-8">
        <div class="mx-auto max-w-4xl">

            <div class="mb-8">
                <h1 class="text-4xl font-bold text-[#111111]">
                    Product Details
                </h1>
            </div>

            <div class="grid grid-cols-1 overflow-hidden rounded-[28px] bg-white shadow-sm md:grid-cols-2">

                <div class="flex min-h-[350px] items-center justify-center bg-[#FFFFFF] p-8">
                    @if ($product->image)
                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            class="max-h-80 w-full rounded-2xl object-contain"
                        >
                    @else
                        <div class="flex h-64 w-full items-center justify-center rounded-2xl bg-[#A8C0E8] font-semibold">
                            No image available
                        </div>
                    @endif
                </div>

                <div class="p-8">

                    <h2 class="text-3xl font-bold text-[#111111]">
                        {{ $product->name }}
                    </h2>

                    <p class="mt-4 text-3xl font-bold text-[#756F68]">
                        ₱{{ number_format($product->price, 2) }}
                    </p>

                    <div class="mt-8 border-t border-[#EEE7DC] pt-5">
                        <p class="text-sm text-[#756F68]">
                            Available Stock
                        </p>

                        <p class="mt-2 text-2xl font-bold text-[#111111]">
                            {{ $product->stock_quantity }}
                        </p>
                    </div>

                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">

                        <a href="{{ route('products.edit', $product) }}"
                           class="rounded-full bg-[#F5DB58] px-6 py-3 text-center text-sm font-semibold text-[#111111]">
                            Edit Product
                        </a>

                        <a href="{{ route('products.index') }}"
                           class="rounded-full bg-[#A8C0E8] px-6 py-3 text-center text-sm font-semibold text-[#111111]">
                            Back to Products
                        </a>

                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>