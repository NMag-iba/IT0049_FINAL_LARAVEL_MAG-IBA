<x-app-layout>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap');

        .pos-profile {
            font-family: 'DM Sans', sans-serif;
        }
    </style>

    <div class="pos-profile min-h-screen bg-[#FAF4E8] px-6 py-8">
        <div class="mx-auto max-w-5xl">

            <div class="mb-8">
                <p class="mb-2 text-sm font-medium text-[#756F68]">
                    Account Management
                </p>

                <h1 class="text-4xl font-bold text-[#111111]">
                    Profile
                </h1>

                <p class="mt-2 text-[#756F68]">
                    Update your account information and password.
                </p>
            </div>

            <div class="space-y-6">

                <div class="rounded-[28px] bg-white p-8 shadow-sm">
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div class="rounded-[28px] bg-white p-8 shadow-sm">
                    @include('profile.partials.update-password-form')
                </div>

                <div class="rounded-[28px] bg-white p-8 shadow-sm">
                    @include('profile.partials.delete-user-form')
                </div>

            </div>

        </div>
    </div>

</x-app-layout>