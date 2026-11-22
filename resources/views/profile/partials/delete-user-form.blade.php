<section>

    <header>
        <h2 class="text-2xl font-bold text-[#111111]">
            Delete Account
        </h2>

        <p class="mt-2 text-sm text-[#756F68]">
            Once your account is deleted, all account data will be permanently removed.
        </p>
    </header>

    <form method="POST"
          action="{{ route('profile.destroy') }}"
          class="mt-6 space-y-6">

        @csrf
        @method('DELETE')

        <div>
            <label for="delete_password"
                   class="mb-2 block text-sm font-semibold text-[#111111]">
                Confirm Your Password
            </label>

            <input
                id="delete_password"
                name="password"
                type="password"
                required
                autocomplete="current-password"
                class="w-full rounded-2xl border-[#E6DDCF] bg-[#FAF4E8] px-4 py-3 text-[#111111] focus:border-red-600 focus:ring-red-600"
            >

            @if ($errors->userDeletion->get('password'))
                <p class="mt-2 text-sm text-red-600">
                    {{ $errors->userDeletion->get('password')[0] }}
                </p>
            @endif
        </div>

        <button
            type="submit"
            onclick="return confirm('Are you sure you want to permanently delete your account?')"
            class="rounded-full bg-[#111111] px-6 py-3 text-sm font-semibold text-white hover:bg-red-700">
            Delete Account
        </button>

    </form>

</section>