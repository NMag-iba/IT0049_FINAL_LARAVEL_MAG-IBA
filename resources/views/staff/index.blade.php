<x-app-layout>
    <x-slot name="header">
        <h2>Staff Accounts</h2>
    </x-slot>

    <div class="p-6">
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif

        @if (session('error'))
            <p>{{ session('error') }}</p>
        @endif

        <a href="{{ route('staff.create') }}">Add Staff</a>

        <table border="1" cellpadding="10">
            <tr>
                <th>Avatar</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>

            @forelse ($staff as $member)
                <tr>
                    <td>
                        @if ($member->avatar)
                            <img src="{{ asset('storage/' . $member->avatar) }}"
                                 width="70">
                        @else
                            No avatar
                        @endif
                    </td>
                    <td>{{ $member->full_name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>
                        <a href="{{ route('staff.show', $member) }}">View</a>
                        <a href="{{ route('staff.edit', $member) }}">Edit</a>

                        <form action="{{ route('staff.destroy', $member) }}"
                              method="POST"
                              style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    onclick="return confirm('Delete this staff account?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No staff accounts found.</td>
                </tr>
            @endforelse
        </table>
    </div>
</x-app-layout>