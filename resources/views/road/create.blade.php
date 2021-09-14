<x-app-layout>
    <x-slot name="header">
        {{ __('Road Planning') }}
    </x-slot>

    <div class="py-6">
        <form method="POST" action="{{ route('roads.store') }}">
            <div class="flex flex-col sm:flex-row sm:space-x-4">
                <div class="flex-1 bg-white overflow-hidden shadow-xl py-6 px-4 mt-2 sm:px-6 lg:px-8 sm:max-w-full sm:rounded-lg">
                    <x-auth-validation-errors class="mb-4" />
                    @csrf
                    <h1 class="font-bold text-lg pb-2">{{ __('Road')}}</h1>
                    <div class="mt-2">
                        <x-label for="name" value="{{ __('Road Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-2">
                        <x-label for="province" value="{{ __('Province') }}" />
                        <x-select id="province" class="block mt-1 w-full" name="province_id">

                        </x-select>
                    </div>

                    <div class="mt-2">
                        <x-label for="city" value="{{ __('City') }}" />
                        <x-select id="city" class="block mt-1 w-full" name="city_id">

                        </x-select>
                    </div>

                    <div class="mt-2">
                        <x-label for="district" value="{{ __('District') }}" />
                        <x-select id="district" class="block mt-1 w-full" name="district_id">

                        </x-select>
                    </div>

                    <div class="mt-2">
                        <x-label for="village" value="{{ __('Village') }}" />
                        <x-select id="village" class="block mt-1 w-full" name="village_id">

                        </x-select>
                    </div>

                    <div class="mt-2">
                        <x-label for="pavement_type" value="{{ __('Pavement Type') }}" />
                        <x-select id="pavement_type" class="block mt-1 w-full" name="pavement_type">
                            @foreach(App\Constant\PavementType::$statusTexts as $key=>$text)
                                <option value="{{ $key }}">{{ $text }}</option>
                            @endforeach
                        </x-select>
                    </div>
                </div>

                <div class="flex-1 bg-white overflow-hidden shadow-xl mt-2 py-6 px-4 sm:px-6 lg:px-8 sm:max-w-full sm:rounded-lg">
                    <x-auth-validation-errors class="mb-4" />

                    <h1 class="font-bold text-lg pb-2">&nbsp;</h1>
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
                        <x-label for="budget" value="{{ __('Budget') }}" />
                        <x-input id="budget" class="block mt-1 w-50 input-rupia" type="text" name="budget" :value="old('budget')" required autofocus autocomplete="budget" />
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
    $(document).ready(function(){
        $('#village').select2({
            placeholder: "Choose Village...",
            minimumInputLength: 1,
            width: '100%',
            ajax: {
                delay: 350,
                url: '/village/autocomplete',
                dataType: 'json',
                data: function (params) {
                    return {
                        name: $.trim(params.term),
                        district: document.getElementById('district').value,
                    };
                },
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                error: function (error) {
                    alert(error.responseJSON.message);
                },
                cache: true
            }
        });

        $('#district').select2({
            placeholder: "Choose District...",
            minimumInputLength: 1,
            width: '100%',
            ajax: {
                delay: 350,
                url: '/district/autocomplete',
                dataType: 'json',
                data: function (params) {
                    return {
                        name: $.trim(params.term),
                        city: document.getElementById('city').value,
                    };
                },
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                error: function (error) {
                    alert(error.responseJSON.message);
                },
                cache: true
            }
        });

        $('#city').select2({
            placeholder: "Choose City...",
            minimumInputLength: 1,
            width: '100%',
            ajax: {
                delay: 350,
                url: '/city/autocomplete',
                dataType: 'json',
                data: function (params) {
                    return {
                        name: $.trim(params.term),
                        province: document.getElementById('province').value,
                    };
                },
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                error: function (error) {
                    alert(error.responseJSON.message);
                },
                cache: true
            }
        });

        $('#province').select2({
            placeholder: "Choose Province...",
            minimumInputLength: 1,
            width: '100%',
            ajax: {
                delay: 350,
                url: '/province/autocomplete',
                dataType: 'json',
                data: function (params) {
                    return {
                        name: $.trim(params.term),
                    };
                },
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                error: function (error) {
                    alert(error.responseJSON.message);
                },
                cache: true
            }
        });
    });
</script>
