<x-app-layout>
    <x-slot name="header">
        {{ __('Road Execution') }}
    </x-slot>

    <div class="py-6">
        <form method="POST" action="{{ route('progressions.store', ['road' => $road->id]) }}">
            <div class="flex flex-col sm:flex-row sm:space-x-4">
                <div class="flex-1 bg-white overflow-hidden shadow-xl py-6 px-4 mt-2 sm:px-6 lg:px-8 sm:max-w-full sm:rounded-lg">
                    <x-auth-validation-errors class="mb-4" />
                    @csrf
                    <h1 class="font-bold text-lg pb-2">{{ __("Road Planning")}}</h1>
                    <div class="mt-2">
                        <x-label for="name" value="{{ __('Road Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? $road->name" disabled autofocus autocomplete="name" />
                    </div>

                    <div class="mt-2">
                        <x-label for="province" value="{{ __('Province') }}" />
                        <x-select id="province" class="block mt-1 w-full" name="province_id" disabled>
                            <option value="{{ $road->province->id }}">{{ $road->province->name }}</option>
                        </x-select>
                    </div>

                    <div class="mt-2">
                        <x-label for="city" value="{{ __('City') }}" />
                        <x-select id="city" class="block mt-1 w-full" name="city_id" disabled>
                            <option value="{{ $road->city->id }}">{{ $road->city->name }}</option>
                        </x-select>
                    </div>

                    <div class="mt-2">
                        <x-label for="district" value="{{ __('District') }}" />
                        <x-select id="district" class="block mt-1 w-full" name="district_id" disabled>
                            <option value="{{ $road->district->id }}">{{ $road->district->name }}</option>
                        </x-select>
                    </div>

                    <div class="mt-2">
                        <x-label for="village" value="{{ __('Village') }}" />
                        <x-select id="village" class="block mt-1 w-full" name="village_id" disabled>
                            <option value="{{ $road->village->id }}">{{ $road->village->name }}</option>
                        </x-select>
                    </div>

                    <div class="mt-2">
                        <x-label for="pavement_type" value="{{ __('Pavement Type') }}" />
                        <x-select id="pavement_type" class="block mt-1 w-full" name="pavement_type" disabled>
                            <option value="{{ $road->pavement_type }}">{{ \App\Constant\PavementType::$statusTexts[$road->pavement_type] }}</option>
                        </x-select>
                    </div>

                    {{--<div class="mt-2">
                        <x-label for="plan_width" value="{{ __('Road Width') }}" />
                        <div>
                            <x-input id="plan_width" class="inline-block mt-1 w-50" type="text" name="plan_width" :value="$road->latestProgression->width" disabled autofocus autocomplete="width" />
                            Meter
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label for="plan_length" value="{{ __('Road Length') }}" />
                        <div>
                            <x-input id="plan_length" class="inline-block mt-1 w-50" type="text" name="plan_length" :value="$road->latestProgression->length" disabled autofocus autocomplete="length" />
                            Meter
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label for="budget" value="{{ __('Budget') }}" />
                        <x-input id="budget" class="block mt-1 w-full" type="text" name="budget" :value="$road->budget" disabled autofocus autocomplete="budget" />
                    </div>--}}
                </div>

                <div class="flex-1 bg-white overflow-hidden shadow-xl mt-2 py-6 px-4 sm:px-6 lg:px-8 sm:max-w-full sm:rounded-lg">

                    <h1 class="font-bold text-lg pb-2">{{ __("Execution")}}</h1>

                    <div class="mt-2">
                        <x-label for="width" value="{{ __('Road Width') }}" />
                        <div>
                            <x-input id="width" class="inline-block mt-1 w-50" type="text" name="width" :value="old('width')" required autofocus autocomplete="width" />
                            Meter
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label for="length" value="{{ __('Road Length') }}" />
                        <div>
                            <x-input id="length" class="inline-block mt-1 w-50" type="text" name="length" :value="old('length')" required autofocus autocomplete="length" />
                            Meter
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label for="cost" value="{{ __('Contract Value') }}" />
                        <div>
                            <x-input id="cost" class="inline-block mt-1 w-full" type="text" name="cost" :value="old('cost')" required autofocus autocomplete="cost" />
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label for="executor" value="{{ __('Executor') }}" />
                        <div>
                            <x-input id="executor" class="inline-block mt-1 w-full" type="text" name="executor" :value="old('executor')" required autofocus autocomplete="executor" />
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label for="executor_contact" value="{{ __('Executor Contact') }}" />
                        <div>
                            <x-input id="executor_contact" class="inline-block mt-1 w-full" type="text" name="executor_contact" :value="old('executor_contact')" required autofocus autocomplete="executor_contact" />
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label for="start_at" value="{{ __('Start of Contract Date') }}" />
                        <div>
                            <x-input id="start_at" class="inline-block mt-1 w-50" type="date" name="start_at" :value="old('start_at')" required autofocus autocomplete="start_at" />
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label for="end_at" value="{{ __('End of Contract Date') }}" />
                        <div>
                            <x-input id="end_at" class="inline-block mt-1 w-50" type="date" name="end_at" :value="old('end_at')" required autofocus autocomplete="end_at" />
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label for="supervisor" value="{{ __('Supervisor Consultant') }}" />
                        <div>
                            <x-input id="supervisor" class="inline-block mt-1 w-full" type="text" name="supervisor" :value="old('supervisor')" required autofocus autocomplete="supervisor" />
                        </div>
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
</x-app-layout>

<script>

</script>
