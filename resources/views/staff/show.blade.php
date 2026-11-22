<x-app-layout>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap');

        .pos-staff {
            font-family: 'DM Sans', sans-serif;
        }
    </style>

    <div class="pos-staff min-h-screen bg-[#FAF4E8] px-6 py-8">
        <div class="mx-auto max-w-3xl">

            <div class="mb-8">
                <h1 class="text-4xl font-bold text-[#111111]">
                    Staff Details
                </h1>
            </div>

            <div class="rounded-[28px] bg-white p-8 shadow-sm">

                <div class="flex flex-col gap-6 border-b border-[#EEE7DC] pb-8 sm:flex-row sm:items-center">

                    @if ($staff->avatar)
                        <img
                            src="{{ asset('storage/' . $staff->avatar) }}"
                            alt="{{ $staff->full_name ?? $staff->name }}"
                            class="h-24 w-24 rounded-2xl object-cover"
                        >
                    @else
                        <div class="flex h-24 w-24 items-center justify-center rounded-2xl bg-[#A8C0E8] text-3xl font-bold text-[#111111]">
                            {{ strtoupper(substr($staff->full_name ?? $staff->name, 0, 1)) }}
                        </div>
                    @endif

                    <div>
                        <h2 class="text-3xl font-bold text-[#111111]">
                            {{ $staff->full_name ?? $staff->name }}
                        </h2>

                        <p class="mt-2 text-[#756F68]">
                            Authorized Staff Member
                        </p>
                    </div>

                </div>

                <div class="space-y-5 py-7">

                    <div class="grid grid-cols-1 gap-2 sm:grid-cols-3">
                        <span class="font-bold text-[#111111]">
                            Email
                        </span>

                        <span class="break-all text-[#756F68] sm:col-span-2">
                            {{ $staff->email }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 gap-2 sm:grid-cols-3">
                        <span class="font-bold text-[#111111]">
                            Password
                        </span>

                        <span class="text-[#756F68] sm:col-span-2">
                            Securely hashed
                        </span>
                    </div>

                </div>

                <div class="flex flex-col gap-3 border-t border-[#EEE7DC] pt-8 sm:flex-row">

                    <a href="{{ route('staff.edit', $staff) }}"
                       class="rounded-full bg-[#F5DB58] px-6 py-3 text-center text-sm font-semibold text-[#111111]">
                        Edit Staff
                    </a>

                    <a href="{{ route('staff.index') }}"
                       class="rounded-full bg-[#A8C0E8] px-6 py-3 text-center text-sm font-semibold text-[#111111]">
                        Back to Staff
                    </a>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>