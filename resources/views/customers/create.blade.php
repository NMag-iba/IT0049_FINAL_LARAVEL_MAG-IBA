<x-app-layout>
    <x-slot name="header">
        <h2>Add Customer</h2>
    </x-slot>

    <div class="p-6">
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf

            <input type="text"
                   name="full_name"
                   placeholder="Full name"
                   value="{{ old('full_name') }}">
            @error('full_name') <p>{{ $message }}</p> @enderror

            <input type="email"
                   name="email"
                   placeholder="Email"
                   value="{{ old('email') }}">
            @error('email') <p>{{ $message }}</p> @enderror

            <input type="text"
                   name="phone"
                   placeholder="Phone number"
                   value="{{ old('phone') }}">
            @error('phone') <p>{{ $message }}</p> @enderror

            <button type="submit">Save Customer</button>
        </form>
    </div>
</x-app-layout>