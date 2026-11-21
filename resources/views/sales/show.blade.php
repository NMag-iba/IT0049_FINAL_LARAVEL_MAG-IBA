<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Sale Details
        </h2>
    </x-slot>

    <div class="p-6">

        @if (session('success'))
            <p style="color: green;">
                {{ session('success') }}
            </p>
        @endif

        <p>
            <strong>Product:</strong>
            {{ $sale->product->name }}
        </p>

        <p>
            <strong>Customer:</strong>
            {{ $sale->customer?->full_name ?? 'Walk-in Customer' }}
        </p>

        <p>
            <strong>Staff:</strong>
            {{ $sale->staff->full_name ?? $sale->staff->name }}
        </p>

        <p>
            <strong>Quantity:</strong>
            {{ $sale->quantity }}
        </p>

        <p>
            <strong>Total Price:</strong>
            ₱{{ number_format($sale->total_price, 2) }}
        </p>

        <p>
            <strong>Transaction Date:</strong>
            {{ $sale->created_at->format('M d, Y h:i A') }}
        </p>

        <a href="{{ route('sales.index') }}">
            Back to Sales History
        </a>
    </div>
</x-app-layout>