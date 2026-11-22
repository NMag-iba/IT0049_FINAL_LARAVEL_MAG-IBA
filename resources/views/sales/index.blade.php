<x-app-layout>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap');

        .pos-sales {
            font-family: 'DM Sans', sans-serif;
        }
    </style>

    <div class="pos-sales min-h-screen bg-[#FAF4E8] px-6 py-8">
        <div class="mx-auto max-w-7xl">

            <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">
                <div>
                    <h1 class="text-4xl font-bold text-[#111111]">
                        Sales History
                    </h1>
                </div>

                <a href="{{ route('sales.create') }}"
                   class="rounded-full bg-[#111111] px-6 py-3 text-center text-sm font-semibold text-white hover:bg-[#333333]">
                    Record Sale
                </a>
            </div>

            @if (session('success'))
                <div class="mb-6 rounded-2xl bg-[#AFC477] px-5 py-4 font-medium text-[#111111]">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-hidden rounded-[28px] bg-white shadow-sm">
                <div class="overflow-x-auto">

                    <table class="w-full min-w-[1100px] table-fixed text-left">

                        <thead class="bg-[#A8C0E8] text-sm text-[#111111]">
                            <tr>
                                <th class="w-[18%] px-6 py-5 font-bold">Product</th>
                                <th class="w-[18%] px-6 py-5 font-bold">Customer</th>
                                <th class="w-[17%] px-6 py-5 font-bold">Staff</th>
                                <th class="w-[12%] px-6 py-5 font-bold">Quantity</th>
                                <th class="w-[15%] px-6 py-5 font-bold">Total</th>
                                <th class="w-[20%] px-6 py-5 font-bold">Date</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-[#EEE7DC]">

                            @forelse ($sales as $sale)
                                <tr class="hover:bg-[#FAF4E8]">

                                    <td class="px-6 py-6 font-bold text-[#111111]">
                                        {{ $sale->product->name }}
                                    </td>

                                    <td class="px-6 py-6 text-sm text-[#756F68]">
                                        {{ $sale->customer?->full_name ?? 'Walk-in Customer' }}
                                    </td>

                                    <td class="px-6 py-6 text-sm text-[#756F68]">
                                        {{ $sale->staff->full_name ?? $sale->staff->name }}
                                    </td>

                                    <td class="px-6 py-6 text-sm text-[#756F68]">
                                        {{ $sale->quantity }}
                                    </td>

                                    <td class="px-6 py-6 font-bold text-[#111111]">
                                        ₱{{ number_format($sale->total_price, 2) }}
                                    </td>

                                    <td class="px-6 py-6 text-sm text-[#756F68]">
                                        {{ $sale->created_at->format('M d, Y h:i A') }}
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-[#756F68]">
                                        No sales recorded yet.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

</x-app-layout>