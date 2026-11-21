<x-app-layout>
    <x-slot name="header">
        <h2>Customer Details</h2>
    </x-slot>

    <div class="p-6">
        <h1>{{ $customer->full_name }}</h1>
        <p>Email: {{ $customer->email }}</p>
        <p>Phone: {{ $customer->phone ?? 'N/A' }}</p>

        <a href="{{ route('customers.index') }}">Back to Customers</a>
    </div>
</x-app-layout>