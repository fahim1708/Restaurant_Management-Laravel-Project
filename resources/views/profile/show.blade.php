<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight" style="color: #f78029;">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div style="background-color: #181824; color: #f78029; min-height: 100vh;" class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 shadow-sm sm:rounded-lg p-6" style="background-color: #181824; border: 2px solid #f78029;">
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold" style="color: #f78029;">{{ __('Update Profile Information') }}</h3>
                        @livewire('profile.update-profile-information-form')
                    </div>

                    <x-jet-section-border />
                @endif

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    <div class="mt-10 sm:mt-0 mb-8">
                        <h3 class="text-lg font-semibold" style="color: #f78029;">{{ __('Update Password') }}</h3>
                        @livewire('profile.update-password-form')
                    </div>

                    <x-jet-section-border />
                @endif

                @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                    <div class="mt-10 sm:mt-0 mb-8">
                        <h3 class="text-lg font-semibold" style="color: #f78029;">{{ __('Two-Factor Authentication') }}</h3>
                        @livewire('profile.two-factor-authentication-form')
                    </div>

                    <x-jet-section-border />
                @endif

                <div class="mt-10 sm:mt-0 mb-8">
                    <h3 class="text-lg font-semibold" style="color: #f78029;">{{ __('Logout Other Browser Sessions') }}</h3>
                    @livewire('profile.logout-other-browser-sessions-form')
                </div>

                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    <x-jet-section-border />

                    <div class="mt-10 sm:mt-0">
                        <h3 class="text-lg font-semibold" style="color: #f78029;">{{ __('Delete Account') }}</h3>
                        @livewire('profile.delete-user-form')
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
