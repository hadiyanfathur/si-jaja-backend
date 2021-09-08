<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <x-response-status />
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />
                <div class="input-group" id="show_hide_password">
                    <x-input id="password" class="form-control"
                                    type="password"
                                    name="password"
                             required autocomplete="new-password" />
                    <div class="input-group-append">
                        <button type="button" onclick="showPassword(this);" class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4 form-group">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                <div class="input-group" id="show_hide_password2">
                    <x-input id="password_confirmation" class="form-control"
                                    type="password"
                                    name="password_confirmation" required />
                    <div class="input-group-append">
                        <button type="button" onclick="showPassword(this);" class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <x-label for="level" :value="__('Level')" />

                <x-select name="level" id="level"  class="block mt-1 w-full">
                    @foreach (UserLevel::$statusTexts as $key => $level)
                        <option value="{{ $key }}">{{ $level }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="flex items-center justify-end mt-4">
                {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a> --}}

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
