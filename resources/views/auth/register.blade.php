<x-guest-layout>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap');

        .pos-auth {
            font-family: 'DM Sans', sans-serif;
        }
    </style>

    <div class="pos-auth flex min-h-screen items-center justify-center bg-[#FAF4E8] px-6 py-12">

        <div class="w-full max-w-md">

            <div class="rounded-[28px] bg-white p-8 shadow-sm">

                <!-- Registration Header -->
                <div class="mb-8 text-center">
                    <h1 class="text-4xl font-bold text-[#111111]">
                        Create account
                    </h1>
                </div>

                @if ($errors->any())
                    <div class="mb-5 rounded-2xl bg-[#F3EEE5] p-4 text-red-600">
                        <p class="font-bold">
                            Please fix the following errors:
                        </p>

                        <ul class="mt-2 list-disc pl-5 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST"
                      action="{{ route('register') }}"
                      class="space-y-6">

                    @csrf

                    <div>
                        <label for="name"
                               class="mb-2 block text-sm font-semibold text-[#111111]">
                            Full Name
                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Enter your full name"
                            class="w-full rounded-2xl border-[#E6DDCF] bg-[#FAF4E8] px-4 py-3 text-[#111111] focus:border-[#111111] focus:ring-[#111111]"
                        >
                    </div>

                    <div>
                        <label for="email"
                               class="mb-2 block text-sm font-semibold text-[#111111]">
                            Email
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="username"
                            placeholder="Enter your email"
                            class="w-full rounded-2xl border-[#E6DDCF] bg-[#FAF4E8] px-4 py-3 text-[#111111] focus:border-[#111111] focus:ring-[#111111]"
                        >
                    </div>

                    <div>
                        <label for="password"
                               class="mb-2 block text-sm font-semibold text-[#111111]">
                            Password
                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="Create a password"
                            class="w-full rounded-2xl border-[#E6DDCF] bg-[#FAF4E8] px-4 py-3 text-[#111111] focus:border-[#111111] focus:ring-[#111111]"
                        >
                    </div>

                    <div>
                        <label for="password_confirmation"
                               class="mb-2 block text-sm font-semibold text-[#111111]">
                            Confirm Password
                        </label>

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Confirm your password"
                            class="w-full rounded-2xl border-[#E6DDCF] bg-[#FAF4E8] px-4 py-3 text-[#111111] focus:border-[#111111] focus:ring-[#111111]"
                        >
                    </div>

                    <button
                        type="submit"
                        class="w-full rounded-full bg-[#111111] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#333333]">
                        Create Account
                    </button>

                </form>

                <div class="mt-6 border-t border-[#EEE7DC] pt-6 text-center text-sm text-[#756F68]">
                    Already have an account?

                    <a href="{{ route('login') }}"
                       class="font-bold text-[#111111] hover:underline">
                        Log in here
                    </a>
                </div>

            </div>

        </div>
    </div>

</x-guest-layout>