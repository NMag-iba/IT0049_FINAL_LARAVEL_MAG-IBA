<x-app-layout>
    <x-slot name="header">
        <h2>Staff Details</h2>
    </x-slot>

    <div class="p-6">
        @if ($staff->avatar)
            <img src="{{ asset('storage/' . $staff->avatar) }}"
                 width="150">
        @endif

        <h1>{{ $staff->full_name }}</h1>
        <p>Email: {{ $staff->email }}</p>
        <p>Password: Securely hashed in the database</p>

        <a href="{{ route('staff.index') }}">Back to Staff</a>
    </div>
</x-app-layout>