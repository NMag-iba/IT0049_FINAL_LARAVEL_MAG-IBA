<x-app-layout>
    <x-slot name="header">
        <h2>Add Staff Account</h2>
    </x-slot>

    <div class="p-6">
        <form action="{{ route('staff.store') }}"
              method="POST"
              enctype="multipart/form-data">
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

            <input type="password"
                   name="password"
                   placeholder="Password">
            @error('password') <p>{{ $message }}</p> @enderror

            <input type="password"
                   name="password_confirmation"
                   placeholder="Confirm password">

            <input type="file" name="avatar">
            @error('avatar') <p>{{ $message }}</p> @enderror

            <button type="submit">Create Staff Account</button>
        </form>
    </div>
</x-app-layout>