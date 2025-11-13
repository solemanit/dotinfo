<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('User Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">

            {{-- ✅ Success message --}}
            @if (session('status') === 'password-updated')
                <div class="p-4 text-sm text-green-700 bg-green-100 border border-green-400 rounded-lg">
                    {{ __('Password updated successfully!') }}
                </div>
            @elseif (session('status') === 'profile-updated')
                <div class="p-4 text-sm text-green-700 bg-green-100 border border-green-400 rounded-lg">
                    {{ __('Profile updated successfully!') }}
                </div>
            @elseif (session('status') === 'account-deleted')
                <div class="p-4 text-sm text-red-700 bg-red-100 border border-red-400 rounded-lg">
                    {{ __('Your account has been deleted successfully!') }}
                </div>
            @endif
            {{-- ✅ End success message --}}

            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('user.profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('user.profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('user.profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
