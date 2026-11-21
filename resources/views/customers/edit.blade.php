<x-app-layout>
    <x-slot name="header">
        <h2>Edit Customer</h2>
    </x-slot>

    <div class="p-6">
        <form action="{{ route('customers.update', $customer) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="text"
                   name="full_name"
                   value="{{ old('full_name', $customer->full_name) }}">

            <input type="email"
                   name="email"
                   value="{{ old('email', $customer->email) }}">

            <input type="text"
                   name="phone"
                   value="{{ old('phone', $customer->phone) }}">

            <button type="submit">Update Customer</button>
        </form>
    </div>
</x-app-layout>