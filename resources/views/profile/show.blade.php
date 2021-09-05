<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('profile.update') }}">
                <div class="flex flex-col sm:flex-row sm:space-x-4">
                    @csrf
                    @method('PUT')
                    <div class="flex-1 bg-white overflow-hidden shadow-xl py-6 px-4 mt-4 sm:px-6 lg:px-8 sm:max-w-full sm:rounded-lg">

                        <x-auth-validation-errors class="mb-4" />

                        <h1 class="font-bold text-lg pb-2">{{ __('Profile')}}</h1>

                        <div class="mt-2">
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? Auth::user()->name" required autofocus autocomplete="name" />
                        </div>

                        <div class="mt-2">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email') ?? Auth::user()->email" required autofocus autocomplete="email" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Submit') }}
                            </x-button>
                        </div>
                    </div>
                </div>
            </form>

            <form method="POST" action="{{ route('profile.updatepassword') }}">
                <div class="flex flex-col sm:flex-row sm:space-x-4">
                    @csrf
                    @method('PUT')
                    <div class="flex-1 bg-white overflow-hidden shadow-xl py-6 px-4 mt-4 sm:px-6 lg:px-8 sm:max-w-full sm:rounded-lg">

                        <h1 class="font-bold text-lg pb-2">{{ __('Password Change')}}</h1>

                        <div class="mt-2">
                            <x-label for="old_password" value="{{ __('Old Password') }}" />
                            <x-input id="old_password" class="block mt-1 w-full" type="password" name="old_password" required autofocus/>
                        </div>

                        <div class="mt-2">
                            <x-label for="password" value="{{ __('New Password') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autofocus/>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Submit') }}
                            </x-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
