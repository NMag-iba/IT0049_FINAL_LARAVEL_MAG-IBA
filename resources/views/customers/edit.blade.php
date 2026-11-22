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
                    Edit Customer
                </h1>
            </div>

            <div class="rounded-[28px] bg-white p-8 shadow-sm">

                @if ($errors->any())
                    <div class="mb-6 rounded-2xl bg-[#E9A8C7] p-4 text-[#111111]">
                        <p class="font-bold">Please fix the following errors:</p>

                        <ul class="mt-2 list-disc pl-5 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('customers.update', $customer) }}"
                      method="POST"
                      class="space-y-6">

                    @csrf
                    @method('PUT')

                    <div>
                        <label for="full_name"
                               class="mb-2 block text-sm font-semibold text-[#111111]">
                            Full Name
                        </label>

                        <input
                            id="full_name"
                            type="text"
                            name="full_name"
                            value="{{ old('full_name', $customer->full_name) }}"
                            required
                            class="w-full rounded-2xl border-[#E6DDCF] bg-[#FAF4E8] px-4 py-3 focus:border-[#111111] focus:ring-[#111111]"
                        >

                        @error('full_name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email"
                               class="mb-2 block text-sm font-semibold text-[#111111]">
                            Email Address
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email', $customer->email) }}"
                            required
                            class="w-full rounded-2xl border-[#E6DDCF] bg-[#FAF4E8] px-4 py-3 focus:border-[#111111] focus:ring-[#111111]"
                        >

                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone"
                               class="mb-2 block text-sm font-semibold text-[#111111]">
                            Phone Number
                            <span class="font-normal text-[#756F68]">(Optional)</span>
                        </label>

                        <input
                            id="phone"
                            type="text"
                            name="phone"
                            value="{{ old('phone', $customer->phone) }}"
                            class="w-full rounded-2xl border-[#E6DDCF] bg-[#FAF4E8] px-4 py-3 focus:border-[#111111] focus:ring-[#111111]"
                        >

                        @error('phone')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-3 pt-4 sm:flex-row">
                        <button
                            type="submit"
                            class="rounded-full bg-[#111111] px-6 py-3 text-sm font-semibold text-white hover:bg-[#333333]">
                            Update Customer
                        </button>

                        <a href="{{ route('customers.index') }}"
                           class="rounded-full bg-[#F5DB58] px-6 py-3 text-center text-sm font-semibold text-[#111111]">
                            Cancel
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>

</x-app-layout>