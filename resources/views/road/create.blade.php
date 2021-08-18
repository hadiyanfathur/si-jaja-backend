<x-app-layout>
    <x-slot name="header">
        {{ __('Road Planning') }}
    </x-slot>

    <div class="py-6">
        <div class="flex flex-col sm:flex-row sm:space-x-4">
            <div class="flex-1 bg-white overflow-hidden shadow-xl py-6 px-4 mt-2 sm:px-6 lg:px-8 sm:max-w-full sm:rounded-lg">
                <x-auth-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('road.store') }}">
                    @csrf
                    <h1 class="font-bold text-lg pb-2">Road</h1>
                    <div class="mt-2">
                        <x-label for="name" value="{{ __('Road Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-2">
                        <x-label for="code" value="{{ __('Province') }}" />
                        <x-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" required autofocus autocomplete="code" />
                    </div>

                    <div class="mt-2">
                        <x-label for="code" value="{{ __('City') }}" />
                        <x-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" required autofocus autocomplete="code" />
                    </div>

                    <div class="mt-2">
                        <x-label for="code" value="{{ __('District') }}" />
                        <x-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" required autofocus autocomplete="code" />
                    </div>

                    <div class="mt-2">
                        <x-label for="code" value="{{ __('Pavement Type') }}" />
                        <x-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" required autofocus autocomplete="code" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Submit') }}
                        </x-button>
                    </div>
                </form>
            </div>

            <div class="flex-1 bg-white overflow-hidden shadow-xl mt-2 py-6 px-4 sm:px-6 lg:px-8 sm:max-w-full sm:rounded-lg">
                <x-auth-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('road.store') }}">
                    @csrf
                    <h1 class="font-bold text-lg pb-2">Road</h1>
                    <div class="mt-2">
                        <x-label for="name" value="{{ __('Road Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-2">
                        <x-label for="code" value="{{ __('Province') }}" />
                        <x-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" required autofocus autocomplete="code" />
                    </div>

                    <div class="mt-2">
                        <x-label for="code" value="{{ __('City') }}" />
                        <x-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" required autofocus autocomplete="code" />
                    </div>

                    <div class="mt-2">
                        <x-label for="code" value="{{ __('District') }}" />
                        <x-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" required autofocus autocomplete="code" />
                    </div>

                    <div class="mt-2">
                        <x-label for="code" value="{{ __('Pavement Type') }}" />
                        <x-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" required autofocus autocomplete="code" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Submit') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
