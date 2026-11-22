<x-app-layout>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap');

        .pos-customers {
            font-family: 'DM Sans', sans-serif;
        }
    </style>

    <div class="pos-customers min-h-screen bg-[#FAF4E8] px-6 py-8">
        <div class="mx-auto max-w-7xl">

            <!-- Header -->
            <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">
                <div>
                    <h1 class="text-4xl font-bold text-[#111111]">
                        Customers
                    </h1>
                </div>

                <a href="{{ route('customers.create') }}"
                   class="rounded-full bg-[#111111] px-6 py-3 text-center text-sm font-semibold text-white hover:bg-[#333333]">
                    Add Customer
                </a>
            </div>

            @if (session('success'))
                <div class="mb-6 rounded-2xl bg-[#AFC477] px-5 py-4 font-medium text-[#111111]">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Table -->
            <div class="overflow-hidden rounded-[28px] bg-white shadow-sm">
                <div class="overflow-x-auto">

                    <table class="w-full min-w-[1050px] table-fixed text-left">

                        <thead class="bg-[#E9A8C7] text-sm text-[#111111]">
                            <tr>
                                <th class="w-[23%] px-6 py-5 font-bold">
                                    Customer
                                </th>

                                <th class="w-[27%] px-6 py-5 font-bold">
                                    Email
                                </th>

                                <th class="w-[15%] px-6 py-5 font-bold">
                                    Phone
                                </th>

                                <th class="w-[35%] whitespace-nowrap px-6 py-5 font-bold">
                                    Actions
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-[#EEE7DC]">

                            @forelse ($customers as $customer)
                                <tr class="hover:bg-[#FAF4E8]">

                                    <td class="px-6 py-6 align-middle">
                                        <p class="font-bold text-[#111111]">
                                            {{ $customer->full_name }}
                                        </p>
                                    </td>

                                    <td class="break-all px-6 py-6 align-middle text-sm text-[#756F68]">
                                        {{ $customer->email }}
                                    </td>

                                    <td class="px-6 py-6 align-middle text-sm text-[#756F68]">
                                        {{ $customer->phone ?? 'Not provided' }}
                                    </td>

                                    <td class="min-w-[300px] whitespace-nowrap px-6 py-6 align-middle">
                                        <div class="flex flex-nowrap items-center gap-2">

                                            <a href="{{ route('customers.show', $customer) }}"
                                               class="whitespace-nowrap rounded-full bg-[#A8C0E8] px-5 py-2 text-sm font-semibold text-[#111111] hover:opacity-80">
                                                View
                                            </a>

                                            <a href="{{ route('customers.edit', $customer) }}"
                                               class="whitespace-nowrap rounded-full bg-[#F5DB58] px-5 py-2 text-sm font-semibold text-[#111111] hover:opacity-80">
                                                Edit
                                            </a>

                                            <form action="{{ route('customers.destroy', $customer) }}"
                                                  method="POST"
                                                  class="m-0">

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    onclick="return confirm('Delete this customer?')"
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
                                        No customers found.
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