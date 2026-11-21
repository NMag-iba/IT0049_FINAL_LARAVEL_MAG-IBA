<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Customers</h2>
    </x-slot>

    <div class="p-6">
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif

        <a href="{{ route('customers.create') }}">Add Customer</a>

        <table border="1" cellpadding="10">
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>

            @forelse ($customers as $customer)
                <tr>
                    <td>{{ $customer->full_name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('customers.show', $customer) }}">View</a>
                        <a href="{{ route('customers.edit', $customer) }}">Edit</a>

                        <form action="{{ route('customers.destroy', $customer) }}"
                              method="POST"
                              style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    onclick="return confirm('Delete this customer?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No customers found.</td>
                </tr>
            @endforelse
        </table>
    </div>
</x-app-layout>