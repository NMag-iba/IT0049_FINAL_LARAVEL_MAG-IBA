<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Edit Staff Account
        </h2>
    </x-slot>

    <div class="p-6">

        @if ($errors->any())
            <div style="color: red; margin-bottom: 15px;">
                <strong>Please fix the following errors:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <p style="color: green; margin-bottom: 15px;">
                {{ session('success') }}
            </p>
        @endif

        <form action="{{ route('staff.update', $staff) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div>
                <label for="full_name">Full Name</label>

                <input
                    id="full_name"
                    type="text"
                    name="full_name"
                    value="{{ old('full_name', $staff->full_name) }}"
                    required
                >

                @error('full_name')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <br>

            <div>
                <label for="email">Email</label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email', $staff->email) }}"
                    required
                >

                @error('email')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <br>

            <div>
                <label for="password">
                    New Password
                    <small>(Leave blank to keep the current password)</small>
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    autocomplete="new-password"
                >

                @error('password')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <br>

            <div>
                <label for="password_confirmation">
                    Confirm New Password
                </label>

                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    autocomplete="new-password"
                >
            </div>

            <br>

            <div>
                <label for="avatar">New Avatar</label>

                <input
                    id="avatar"
                    type="file"
                    name="avatar"
                    accept="image/jpeg,image/png,image/webp"
                >

                @error('avatar')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <br>

            @if ($staff->avatar)
                <div>
                    <p>Current Avatar:</p>

                    <img
                        src="{{ asset('storage/' . $staff->avatar) }}"
                        alt="Current avatar"
                        width="100"
                    >
                </div>
            @endif

            <br>

            <button type="submit">
                Update Staff Account
            </button>

            <a href="{{ route('staff.index') }}">
                Cancel
            </a>
        </form>
    </div>
</x-app-layout>