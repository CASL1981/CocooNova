<!doctype html>
<html lang="es" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'COCOO NOVA') }}</title>

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />

    {{-- Estilos de Qompac UI --}}
    <link rel="stylesheet" href="{{ asset('assets/css/core/libs.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/qompac-ui.min.css?v=2.0.0') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css?v=2.0.0') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/rtl.min.css?v=2.0.0') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/customizer.min.css?v=2.0.0') }}">

    {{-- Fuente --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;900&display=swap" rel="stylesheet">

    @vite(['resources/js/app.js']) {{-- Vite Bootstrap --}}
    @livewireStyles
</head>
<body>
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body">
                <img src="{{ asset('assets/images/loader.webp') }}" alt="loader" class="image-loader img-fluid" />
            </div>
        </div>
    </div>

    <div class="wrapper">
        {{-- @yield('content') --}}
        {{ $slot }}
    </div>

    {{-- Scripts --}}
    <script src="{{ asset('assets/js/core/libs.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slider-tabs.js') }}"></script>
    <script src="{{ asset('assets/vendor/lodash/lodash.min.js') }}"></script>
    <script src="{{ asset('assets/js/iqonic-script/utility.min.js') }}"></script>
    <script src="{{ asset('assets/js/iqonic-script/setting.min.js') }}"></script>
    <script src="{{ asset('assets/js/setting-init.js') }}"></script>
    <script src="{{ asset('assets/js/core/external.min.js') }}"></script>
    <script src="{{ asset('assets/js/qompac-ui.js?v=2.0.0') }}"></script>
    <script src="{{ asset('assets/js/sidebar.js?v=2.0.0') }}"></script>
    @livewireScripts
</body>
</html>