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
                    Sale Details
                </h1>
            </div>

            @if (session('success'))
                <div class="mb-6 rounded-2xl bg-[#AFC477] px-5 py-4 font-medium text-[#111111]">
                    {{ session('success') }}
                </div>
            @endif

            <div class="rounded-[28px] bg-white p-8 shadow-sm">

                <div class="border-b border-[#EEE7DC] pb-7">
                    <p class="text-sm font-medium text-[#756F68]">
                        Transaction recorded successfully
                    </p>

                    <h2 class="mt-2 text-3xl font-bold text-[#111111]">
                        {{ $sale->product->name }}
                    </h2>
                </div>

                <div class="space-y-5 py-7">

                    <div class="grid grid-cols-1 gap-2 sm:grid-cols-3">
                        <span class="font-bold text-[#111111]">
                            Customer
                        </span>

                        <span class="text-[#756F68] sm:col-span-2">
                            {{ $sale->customer?->full_name ?? 'Walk-in Customer' }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 gap-2 sm:grid-cols-3">
                        <span class="font-bold text-[#111111]">
                            Staff
                        </span>

                        <span class="text-[#756F68] sm:col-span-2">
                            {{ $sale->staff->full_name ?? $sale->staff->name }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 gap-2 sm:grid-cols-3">
                        <span class="font-bold text-[#111111]">
                            Quantity
                        </span>

                        <span class="text-[#756F68] sm:col-span-2">
                            {{ $sale->quantity }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 gap-2 sm:grid-cols-3">
                        <span class="font-bold text-[#111111]">
                            Total Price
                        </span>

                        <span class="font-bold text-[#756F68] sm:col-span-2">
                            ₱{{ number_format($sale->total_price, 2) }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 gap-2 sm:grid-cols-3">
                        <span class="font-bold text-[#111111]">
                            Transaction Date
                        </span>

                        <span class="text-[#756F68] sm:col-span-2">
                            {{ $sale->created_at->format('M d, Y h:i A') }}
                        </span>
                    </div>

                </div>

                <div class="flex flex-col gap-3 border-t border-[#EEE7DC] pt-8 sm:flex-row">

                    <a href="{{ route('sales.index') }}"
                       class="rounded-full bg-[#A8C0E8] px-6 py-3 text-center text-sm font-semibold text-[#111111]">
                        Back to Sales History
                    </a>

                    <a href="{{ route('sales.create') }}"
                       class="rounded-full bg-[#F5DB58] px-6 py-3 text-center text-sm font-semibold text-[#111111]">
                        Record Another Sale
                    </a>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>