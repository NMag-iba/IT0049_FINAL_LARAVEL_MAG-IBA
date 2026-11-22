<x-app-layout>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap');

        .pos-staff {
            font-family: 'DM Sans', sans-serif;
        }
    </style>

    <div class="pos-staff min-h-screen bg-[#FAF4E8] px-6 py-8">
        <div class="mx-auto max-w-7xl">

            <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">
                <div>
                    <h1 class="text-4xl font-bold text-[#111111]">
                        Staff
                    </h1>
                </div>

                <a href="{{ route('staff.create') }}"
                   class="rounded-full bg-[#111111] px-6 py-3 text-center text-sm font-semibold text-white hover:bg-[#333333]">
                    Add Staff
                </a>
            </div>

            @if (session('success'))
                <div class="mb-6 rounded-2xl bg-[#AFC477] px-5 py-4 font-medium text-[#111111]">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 rounded-2xl bg-[#F3EEE5] px-5 py-4 font-medium text-red-600">
                    {{ session('error') }}
                </div>
            @endif

            <div class="overflow-hidden rounded-[28px] bg-white shadow-sm">
                <div class="overflow-x-auto">

                    <table class="w-full min-w-[1050px] table-fixed text-left">

                        <thead class="bg-[#AFC477] text-sm text-[#111111]">
                            <tr>
                                <th class="w-[23%] px-6 py-5 font-bold">
                                    Staff
                                </th>

                                <th class="w-[25%] px-6 py-5 font-bold">
                                    Email
                                </th>

                                <th class="w-[17%] px-6 py-5 font-bold">
                                    Avatar
                                </th>

                                <th class="w-[35%] whitespace-nowrap px-6 py-5 font-bold">
                                    Actions
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-[#EEE7DC]">

                            @forelse ($staff as $member)
                                <tr class="hover:bg-[#FAF4E8]">

                                    <td class="px-6 py-6 align-middle">
                                        <p class="font-bold text-[#111111]">
                                            {{ $member->full_name ?? $member->name }}
                                        </p>
                                    </td>

                                    <td class="break-all px-6 py-6 align-middle text-sm text-[#756F68]">
                                        {{ $member->email }}
                                    </td>

                                    <td class="px-6 py-6 align-middle">
                                        @if ($member->avatar)
                                            <img
                                                src="{{ asset('storage/' . $member->avatar) }}"
                                                alt="{{ $member->full_name ?? $member->name }}"
                                                class="h-14 w-14 rounded-xl object-cover"
                                            >
                                        @else
                                            <span class="inline-block whitespace-nowrap rounded-xl bg-[#A8C0E8] px-3 py-3 text-xs font-semibold text-[#111111]">
                                                No avatar
                                            </span>
                                        @endif
                                    </td>

                                    <td class="min-w-[300px] whitespace-nowrap px-6 py-6 align-middle">
                                        <div class="flex flex-nowrap items-center gap-2">

                                            <a href="{{ route('staff.show', $member) }}"
                                               class="whitespace-nowrap rounded-full bg-[#A8C0E8] px-5 py-2 text-sm font-semibold text-[#111111] hover:opacity-80">
                                                View
                                            </a>

                                            <a href="{{ route('staff.edit', $member) }}"
                                               class="whitespace-nowrap rounded-full bg-[#F5DB58] px-5 py-2 text-sm font-semibold text-[#111111] hover:opacity-80">
                                                Edit
                                            </a>

                                            <form action="{{ route('staff.destroy', $member) }}"
                                                  method="POST"
                                                  class="m-0">

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    onclick="return confirm('Delete this staff account?')"
                                                    class="whitespace-nowrap rounded-full bg-[#111111] px-5 py-2 text-sm font-semibold text-white hover:bg-[#333333]">
                                                    Delete
                                                </button>
                                            </form>

                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4"
                                        class="px-6 py-12 text-center text-[#756F68]">
                                        No staff accounts found.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>