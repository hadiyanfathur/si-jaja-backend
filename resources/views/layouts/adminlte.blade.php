@extends('adminlte::page')

@section('css')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <style>
        .user-image {
            display: inline;
        }
    </style>
@stop

@section('content_header')
    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $header }}
                </h2>
            </div>
        </header>
    @endif
@stop

@section('content')
    <!-- Page Content -->

    {{ $slot }}

    @stack('modals')

    @stop

@section('js')
<script type="text/javascript">
    $('div.alert').not('.alert-important').delay(2500).fadeOut(1000);

    function csrf_token(){
        return "{{csrf_token()}}";
    }
</script>

<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/dialog.js') }}"></script>
@stop