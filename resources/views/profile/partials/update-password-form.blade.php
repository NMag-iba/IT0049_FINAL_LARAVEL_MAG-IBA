<section>

    <header>
        <h2 class="text-2xl font-bold text-[#111111]">
            Update Password
        </h2>

        <p class="mt-2 text-sm text-[#756F68]">
            Use a strong password to protect your staff account.
        </p>
    </header>

    <form method="POST"
          action="{{ route('password.update') }}"
          class="mt-6 space-y-6">

        @csrf
        @method('PUT')

        <div>
            <label for="current_password"
                   class="mb-2 block text-sm font-semibold text-[#111111]">
                Current Password
            </label>

            <input
                id="current_password"
                name="current_password"
                type="password"
                autocomplete="current-password"
                class="w-full rounded-2xl border-[#E6DDCF] bg-[#FAF4E8] px-4 py-3 text-[#111111] focus:border-[#111111] focus:ring-[#111111]"
            >

            @error('current_password', 'updatePassword')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password"
                   class="mb-2 block text-sm font-semibold text-[#111111]">
                New Password
            </label>

            <input
                id="password"
                name="password"
                type="password"
                autocomplete="new-password"
                class="w-full rounded-2xl border-[#E6DDCF] bg-[#FAF4E8] px-4 py-3 text-[#111111] focus:border-[#111111] focus:ring-[#111111]"
            >

            @error('password', 'updatePassword')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation"
                   class="mb-2 block text-sm font-semibold text-[#111111]">
                Confirm New Password
            </label>

            <input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                autocomplete="new-password"
                class="w-full rounded-2xl border-[#E6DDCF] bg-[#FAF4E8] px-4 py-3 text-[#111111] focus:border-[#111111] focus:ring-[#111111]"
            >
        </div>

        <div class="flex items-center gap-4">
            <button
                type="submit"
                class="rounded-full bg-[#111111] px-6 py-3 text-sm font-semibold text-white hover:bg-[#333333]">
                Update Password
            </button>

            @if (session('status') === 'password-updated')
                <p class="text-sm font-medium text-[#5F7830]">
                    Password updated successfully.
                </p>
            @endif
        </div>

    </form>

</section>