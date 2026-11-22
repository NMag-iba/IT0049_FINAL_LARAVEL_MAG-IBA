<section>

    <header>
        <h2 class="text-2xl font-bold text-[#111111]">
            Profile Information
        </h2>

        <p class="mt-2 text-sm text-[#756F68]">
            Update your account name and email address.
        </p>
    </header>

    <form method="POST"
          action="{{ route('profile.update') }}"
          class="mt-6 space-y-6">

        @csrf
        @method('PATCH')

        <div>
            <label for="name"
                   class="mb-2 block text-sm font-semibold text-[#111111]">
                Name
            </label>

            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
                class="w-full rounded-2xl border-[#E6DDCF] bg-[#FAF4E8] px-4 py-3 text-[#111111] focus:border-[#111111] focus:ring-[#111111]"
            >

            @error('name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email"
                   class="mb-2 block text-sm font-semibold text-[#111111]">
                Email
            </label>

            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
                class="w-full rounded-2xl border-[#E6DDCF] bg-[#FAF4E8] px-4 py-3 text-[#111111] focus:border-[#111111] focus:ring-[#111111]"
            >

            @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <button
                type="submit"
                class="rounded-full bg-[#111111] px-6 py-3 text-sm font-semibold text-white hover:bg-[#333333]">
                Save Changes
            </button>

            @if (session('status') === 'profile-updated')
                <p class="text-sm font-medium text-[#5F7830]">
                    Profile updated successfully.
                </p>
            @endif
        </div>

    </form>

</section>