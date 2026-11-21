<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Sales History
        </h2>
    </x-slot>

    <div class="p-6">

        @if (session('success'))
            <p style="color: green;">
                {{ session('success') }}
            </p>
        @endif

        <a href="{{ route('sales.create') }}">
            Record New Sale
        </a>

        <br><br>

        <table border="1" cellpadding="10">
            <tr>
                <th>Product</th>
                <th>Customer</th>
                <th>Staff</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Date</th>
                <th>Action</th>
            </tr>

            @forelse ($sales as $sale)
                <tr>
                    <td>{{ $sale->product->name }}</td>

                    <td>
                        {{ $sale->customer?->full_name ?? 'Walk-in Customer' }}
                    </td>

                    <td>
                        {{ $sale->staff->full_name ?? $sale->staff->name }}
                    </td>

                    <td>{{ $sale->quantity }}</td>

                    <td>
                        ₱{{ number_format($sale->total_price, 2) }}
                    </td>

                    <td>
                        {{ $sale->created_at->format('M d, Y h:i A') }}
                    </td>

                    <td>
                        <a href="{{ route('sales.show', $sale) }}">
                            View
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">
                        No sales recorded yet.
                    </td>
                </tr>
            @endforelse
        </table>
    </div>
</x-app-layout>