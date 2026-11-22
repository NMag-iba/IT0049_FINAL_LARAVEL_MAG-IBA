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
                    <h1 class="text-3xl font-bold text-[#111111]">
                        Forgot Password
                    </h1>

                    <p class="mt-3 text-sm leading-6 text-[#756F68]">
                        Enter your email address and we will send you a password reset link.
                    </p>
                </div>

                @if (session('status'))
                    <div class="mb-5 rounded-2xl bg-[#AFC477] px-4 py-3 text-sm font-medium text-[#111111]">
                        {{ session('status') }}
                    </div>
                @endif

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
                      action="{{ route('password.email') }}"
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
                            autocomplete="email"
                            placeholder="Enter your email"
                            class="w-full rounded-2xl border-[#E6DDCF] bg-[#FAF4E8] px-4 py-3 text-[#111111] focus:border-[#111111] focus:ring-[#111111]"
                        >
                    </div>

                    <button
                        type="submit"
                        class="w-full rounded-full bg-[#111111] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#333333]">
                        Email Password Reset Link
                    </button>

                </form>

                <div class="mt-6 border-t border-[#EEE7DC] pt-6 text-center">
                    <a href="{{ route('login') }}"
                       class="text-sm font-bold text-[#111111] hover:underline">
                        Back to Login
                    </a>
                </div>

            </div>

        </div>
    </div>

</x-guest-layout>