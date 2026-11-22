<x-app-layout>    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap');

        .pos-dashboard {
            font-family: 'DM Sans', sans-serif;
        }
    </style>

    <div class="pos-dashboard min-h-screen bg-[#FAF4E8] px-6 py-8">

        <div class="mx-auto max-w-7xl">

            <!-- Greeting -->
            <div class="mb-8 flex flex-col justify-between gap-4 md:flex-row md:items-end">
                <div>
                    <p class="mb-2 text-sm font-medium text-[#756F68]">
                        {{ now()->format('l, F j, Y') }}
                    </p>

                    <h1 class="text-4xl font-bold tracking-tight text-[#111111]">
                        Hello, {{ Auth::user()->full_name ?? Auth::user()->name }}
                    </h1>
                </div>

                <a href="{{ route('sales.create') }}"
                    class="rounded-full bg-[#111111] px-6 py-3 text-center text-sm font-semibold text-white transition hover:bg-[#333333]">
                    Record a Sale
                </a>
            </div>

            <!-- Summary Cards -->
            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-4">

                <a href="{{ route('products.index') }}"
                    class="rounded-[28px] bg-[#F5DB58] p-6 text-[#111111] shadow-sm transition hover:-translate-y-1">
                    <div class="mb-8 flex items-start justify-between">
                        <span class="text-sm font-semibold">Products</span>
                    </div>

                    <p class="text-5xl font-bold">
                        {{ $productCount }}
                    </p>

                    <p class="mt-2 text-sm">
                        Items in inventory
                    </p>
                </a>

                <a href="{{ route('customers.index') }}"
                    class="rounded-[28px] bg-[#E9A8C7] p-6 text-[#111111] shadow-sm transition hover:-translate-y-1">
                    <div class="mb-8 flex items-start justify-between">
                        <span class="text-sm font-semibold">Customers</span>
                    </div>

                    <p class="text-5xl font-bold">
                        {{ $customerCount }}
                    </p>

                    <p class="mt-2 text-sm">
                        Registered customers
                    </p>
                </a>

                <a href="{{ route('staff.index') }}"
                    class="rounded-[28px] bg-[#AFC477] p-6 text-[#111111] shadow-sm transition hover:-translate-y-1">
                    <div class="mb-8 flex items-start justify-between">
                        <span class="text-sm font-semibold">Staff</span>
                    </div>

                    <p class="text-5xl font-bold">
                        {{ $staffCount }}
                    </p>

                    <p class="mt-2 text-sm">
                        Authorized staff accounts
                    </p>
                </a>

                <a href="{{ route('sales.index') }}"
                    class="rounded-[28px] bg-[#A8C0E8] p-6 text-[#111111] shadow-sm transition hover:-translate-y-1">
                    <div class="mb-8 flex items-start justify-between">
                        <span class="text-sm font-semibold">Total Sales</span>
                    </div>

                    <p class="text-5xl font-bold">
                        {{ $saleCount }}
                    </p>

                    <p class="mt-2 text-sm">
                        Recorded transactions
                    </p>
                </a>

            </div>

            <!-- Revenue and Low Stock -->
            <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-3">

                <div class="rounded-[28px] bg-[#E9A8C7] p-7 shadow-sm lg:col-span-1">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-semibold text-[#111111]">
                                Sales Revenue
                            </p>

                            <p class="mt-5 text-4xl font-bold text-[#111111]">
                                ₱{{ number_format($totalSales, 2) }}
                            </p>

                            <p class="mt-3 text-sm text-[#111111]">
                                Total recorded revenue
                            </p>
                        </div>
                    </div>
                </div>

                <div class="rounded-[28px] bg-white p-7 shadow-sm lg:col-span-2">
                    <div class="mb-5 flex items-center justify-between">
                        <h2 class="text-xl font-bold text-[#111111]">
                            Low Stock Products
                        </h2>

                        <a href="{{ route('products.index') }}"
                            class="rounded-full bg-[#111111] px-4 py-2 text-xs font-semibold text-white">
                            View Products
                        </a>
                    </div>

                    @forelse ($lowStockProducts as $product)
                        <div class="flex items-center justify-between border-b border-[#EEE7DC] py-3 last:border-b-0">
                            <span class="font-medium text-[#111111]">
                                {{ $product->name }}
                            </span>

                            <span class="rounded-full bg-[#F5DB58] px-4 py-1 text-sm font-semibold text-[#111111]">
                                {{ $product->stock_quantity }} left
                            </span>
                        </div>
                    @empty
                        <p class="text-[#756F68]">
                            No low-stock products.
                        </p>
                    @endforelse
                </div>

            </div>

            <!-- Quick Actions -->
            <div class="mt-6 rounded-[28px] bg-[#AFC477] p-7 text-black shadow-sm">
                <div class="flex flex-col justify-between gap-5 md:flex-row md:items-center">
                    <div>
                        <h2 class="text-2xl font-bold">
                            Record a sale
                        </h2>

                        <p class="mt-1 text-sm text-[#111111]">
                            Select a product and update your inventory in one transaction.
                        </p>
                    </div>

                    <a href="{{ route('sales.create') }}"
                        class="rounded-full bg-[#ffffff] px-6 py-3 text-center text-sm font-bold text-[#111111] transition hover:bg-[#FFE97A]">
                        Start Transaction
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>