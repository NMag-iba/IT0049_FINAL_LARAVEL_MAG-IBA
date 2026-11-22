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
                <div class="mb-8 text-center">
                    <h1 class="text-4xl font-bold text-[#111111]">
                        IT0049 POS System
                    </h1>
                </div>

                @if (session('status'))
                    <div class="mb-5 rounded-2xl bg-[#AFC477] px-4 py-3 text-sm font-medium text-[#111111]">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-5 rounded-2xl bg-[#F3EEE5] p-4 text-red-600">
                        <p class="font-bold">Please check your information.</p>

                        <ul class="mt-2 list-disc pl-5 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST"
                      action="{{ route('login') }}"
                      class="space-y-6">

                    @csrf

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
                            autofocus
                            autocomplete="username"
                            class="w-full rounded-2xl border-[#E6DDCF] bg-[#FAF4E8] px-4 py-3 text-[#111111] focus:border-[#111111] focus:ring-[#111111]"
                            placeholder="Enter your email"
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
                            autocomplete="current-password"
                            class="w-full rounded-2xl border-[#E6DDCF] bg-[#FAF4E8] px-4 py-3 text-[#111111] focus:border-[#111111] focus:ring-[#111111]"
                            placeholder="Enter your password"
                        >
                    </div>

                    <div class="flex items-center justify-between">

                        <label class="flex items-center gap-2 text-sm text-[#756F68]">
                            <input
                                type="checkbox"
                                name="remember"
                                class="rounded border-[#E6DDCF] text-[#111111] focus:ring-[#111111]"
                            >

                            Remember me
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="text-sm font-semibold text-[#756F68] hover:text-[#111111]">
                                Forgot password?
                            </a>
                        @endif

                    </div>

                    <button
                        type="submit"
                        class="w-full rounded-full bg-[#111111] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#333333]">
                        Log In
                    </button>

                </form>

                <div class="mt-6 border-t border-[#EEE7DC] pt-6 text-center text-sm text-[#756F68]">
                    Do not have an account?

                    <a href="{{ route('register') }}"
                       class="font-bold text-[#111111] hover:underline">
                        Register here
                    </a>
                </div>

            </div>

        </div>
    </div>

</x-guest-layout>