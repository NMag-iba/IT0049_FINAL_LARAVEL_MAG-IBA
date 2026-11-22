<x-app-layout>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap');

        .pos-customers {
            font-family: 'DM Sans', sans-serif;
        }
    </style>

    <div class="pos-customers min-h-screen bg-[#FAF4E8] px-6 py-8">
        <div class="mx-auto max-w-3xl">

            <div class="mb-8">
                <h1 class="text-4xl font-bold text-[#111111]">
                    Customer Details
                </h1>
            </div>

            <div class="rounded-[28px] bg-white p-8 shadow-sm">

                <div class="border-b border-[#EEE7DC] pb-8">
                    <h2 class="text-3xl font-bold text-[#111111]">
                        {{ $customer->full_name }}
                    </h2>

                    <p class="mt-2 text-[#756F68]">
                        Customer
                    </p>
                </div>

                <div class="space-y-5 py-7">

                    <div class="grid grid-cols-1 gap-2 sm:grid-cols-3">
                        <span class="font-bold text-[#111111]">
                            Email
                        </span>

                        <span class="break-all text-[#756F68] sm:col-span-2">
                            {{ $customer->email }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 gap-2 sm:grid-cols-3">
                        <span class="font-bold text-[#111111]">
                            Phone
                        </span>

                        <span class="text-[#756F68] sm:col-span-2">
                            {{ $customer->phone ?? 'Not provided' }}
                        </span>
                    </div>

                </div>

                <div class="mt-10 flex flex-col gap-3 border-t border-[#EEE7DC] pt-8 sm:flex-row">

                    <a href="{{ route('customers.edit', $customer) }}"
                    class="rounded-full bg-[#F5DB58] px-6 py-3 text-center text-sm font-semibold text-[#111111]">
                        Edit Customer
                    </a>

                    <a href="{{ route('customers.index') }}"
                    class="rounded-full bg-[#A8C0E8] px-6 py-3 text-center text-sm font-semibold text-[#111111]">
                        Back to Customers
                    </a>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>