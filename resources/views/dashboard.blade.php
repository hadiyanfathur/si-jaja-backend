<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SI BANG JAJA') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Anda telah login sebagai <strong> {{ UserLevel::normalizedText(Auth::user()->level) }} </strong>
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row sm:space-x-2 mt-5">
            <div class="flex-1 bg-white max-w-full overflow-hidden shadow-xl py-6 px-4 mt-2 sm:px-6 lg:px-8 md:w-1/2 sm:rounded-lg">
                <div class="text-center">
                    Jumlah Data Perencanaan
                </div>
                <div class="text-center text-primary content-header">
                    <h1>{{ $planning }}</h1>
                </div>
                <div class="text-center">
                    Jumlah Data Anggaran
                </div>
                <div class="text-center text-danger content-header">
                    <h1>{{ $budget }}</h1>
                </div>
            </div>
            <div class="flex-1 bg-white max-w-full overflow-hidden shadow-xl py-6 px-4 mt-2 sm:px-6 lg:px-8 md:w-1/2 sm:rounded-lg">
                <div class="text-center">
                    Jumlah Data yang telah Kontrak
                </div>
                <div class="text-center text-primary content-header">
                    <h1>{{ $ongoing }}</h1>
                </div>
                <div class="text-center">
                    Jumlah Anggaran yang telah Kontrak
                </div>
                <div class="text-center text-danger content-header">
                    <h1>{{ $cost }}</h1>
                </div>
            </div>
            <div class="flex-1 bg-white max-w-full overflow-hidden shadow-xl py-6 px-4 mt-2 sm:px-6 lg:px-8 md:w-1/2 sm:rounded-lg">
                <div class="text-center">
                    Jumlah Data yang telah Selesai
                </div>
                <div class="text-center text-primary content-header">
                    <h1>{{ $done }}</h1>
                </div>
                <div class="text-center">
                    Jumlah Anggaran yang telah Selesai
                </div>
                <div class="text-center text-danger content-header">
                    <h1>{{ $final_cost }}</h1>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
