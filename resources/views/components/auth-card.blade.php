<div class="sm:w-1/2 w-full flex flex-col sm:justify-center items-center p-12 bg-gray-100 align-middle" style="background-image: url('{{asset('assets/img/bg.jpeg')}}'); background-size: 100% 100%;">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
