<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="theme-fs-sm" data-bs-theme="light" data-bs-theme-color="default" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | @yield('title', 'Cocoo Nova')</title>
    

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/core/libs.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/qompac-ui.min.css?v=2.0.0') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/customizer.min.css?v=2.0.0') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/rtl.min.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet"/>

    @stack('styles')
    
    <style>
        /* Colocar el punto como badge absoluto sobre el icono y un poco más a la izquierda */
        #notification-drop {
            position: relative;
        }

        /* Estilo del badge cuando se activa */
        .dots.notification-badge-number {
            position: absolute;
            top: 6px;               /* ajustar verticalmente */
            right: -6px;            /* negativo para mover hacia la izquierda sobre el icono */
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 14px;
            height: 14px;
            padding: 0 2px;
            font-size: 8px;
            line-height: 1;
            border-radius: 999px;
            color: #fff;
            background: #dc3545;    /* asegura color rojo */
            box-shadow: 0 0 0 2px rgba(255,255,255,0.12);
            transform: none;
            z-index: 3;
        }

        /* Ocultar el punto cuando no hay notificaciones */
        .dots.notification-hidden {
            display: none !important;
        }
    </style>

    @livewireStyles

    @vite(['resources/js/app.js', 'resources/css/app.css'])

</head>
<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body ">
                <img src="{{ asset('assets/images/loader.webp') }}" alt="loader" class="image-loader img-fluid ">
            </div>
        </div>
    </div>
    <!-- loader END -->
    <aside class="sidebar sidebar-base sidebar-white sidebar-default navs-rounded-all " id="first-tour" data-toggle="main-sidebar" data-sidebar="responsive">
        <div class="sidebar-header d-flex align-items-center justify-content-start">
            <a href="{{ route('dashboard') }}" class="navbar-brand">
                <!--Logo start-->
                <div class="logo-main">
                    <div class="logo-normal">
                        <img src="{{ asset('assets/images/logo-2.png') }}" alt="Logo" class="img-fluid" style="width: 32px; height: auto;">
                    </div>
                    <div class="logo-mini">
                        <img src="{{ asset('assets/images/logo-2.png') }}" alt="Logo" class="img-fluid" style="width: 32px; height: auto;">
                    </div>
                </div>
                <!--logo End-->            
                <h4 class="logo-title" >{{ config('app.name') }}</h4>
            </a>
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                <i class="icon">
                    <svg class="icon-10" width="10" height="10" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.29853 8C7.11974 8 6.94002 7.93083 6.80335 7.79248L3.53927 4.50446C3.40728 4.37085 3.33333 4.18987 3.33333 4.00036C3.33333 3.81179 3.40728 3.63081 3.53927 3.4972L6.80335 0.207279C7.07762 -0.069408 7.52132 -0.069408 7.79558 0.209174C8.06892 0.487756 8.06798 0.937847 7.79371 1.21453L5.02949 4.00036L7.79371 6.78618C8.06798 7.06286 8.06892 7.51201 7.79558 7.79059C7.65892 7.93083 7.47826 8 7.29853 8Z" fill="white"/>
                        <path d="M3.96552 8C3.78673 8 3.60701 7.93083 3.47034 7.79248L0.206261 4.50446C0.0742745 4.37085 0.000325203 4.18987 0.000325203 4.00036C0.000325203 3.81179 0.0742745 3.63081 0.206261 3.4972L3.47034 0.207279C3.74461 -0.069408 4.18831 -0.069408 4.46258 0.209174C4.73591 0.487756 4.73497 0.937847 4.4607 1.21453L1.69649 4.00036L4.4607 6.78618C4.73497 7.06286 4.73591 7.51201 4.46258 7.79059C4.32591 7.93083 4.14525 8 3.96552 8Z" fill="white"/>
                    </svg>
                </i>
            </div>
        </div>
        <div class="sidebar-body pt-0 data-scrollbar">
            <div class="sidebar-list">
                <x-sidebar />                
            </div>
        </div>
        <div class="sidebar-footer"></div>
    </aside>
    <!-- Sidebar -->

    <!-- Main Content -->
    <main class="main-content">
        <div class="position-relative iq-banner">
            <x-navbar />
            <!-- Nav Header Component Start -->
            <div class="iq-navbar-header" style="height: 90px;">
                <div class="iq-header-img">
                    <img src="./assets/images/header/top-header.png" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
                    <img src="./assets/images/header/top-header1.png" alt="header" class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
                    <img src="./assets/images/header/top-header2.png" alt="header" class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
                    <img src="./assets/images/header/top-header3.png" alt="header" class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
                    <img src="./assets/images/header/top-header4.png" alt="header" class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
                    <img src="./assets/images/header/top-header5.png" alt="header" class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
                </div>
            </div>
            <!-- Nav Header Component End -->
        </div>

        <div class="content-inner container-fluid pb-0" id="page_layout">
            {{ $slot }}
        </div>
    </main>

    <!-- Customizer Offcanvas (Opcional) -->
    @include('layouts.customizer')

    <!-- Scripts -->
    <script src="{{ asset('assets/js/core/libs.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slider-tabs.js') }}"></script>
    <script src="{{ asset('assets/vendor/lodash/lodash.min.js') }}"></script>
    <script src="{{ asset('assets/js/iqonic-script/utility.min.js') }}"></script>
    <script src="{{ asset('assets/js/iqonic-script/setting.min.js') }}"></script>
    <script src="{{ asset('assets/js/setting-init.js') }}"></script>
    <script src="{{ asset('assets/js/core/external.min.js') }}"></script>
    <script src="{{ asset('assets/js/charts/widgetcharts.js?v=2.0.0') }}" defer></script>
    <script src="{{ asset('assets/js/charts/dashboard.js?v=2.0.0') }}" defer></script>
    <script src="{{ asset('assets/js/qompac-ui.js?v=2.0.0') }}" defer></script>
    <script src="{{ asset('assets/js/sidebar.js?v=2.0.0') }}" defer></script>
    
    @stack('scripts')
    @livewireScripts

    <script>
        document.addEventListener('livewire:init', () => {

            Livewire.on('alert', (param) => {
                const type = (param[0]?.type || '').toLowerCase();
                const message = param[0]?.message || '';

                toastr.options = {
                    closeButton: true,
                    progressBar: true
                };

                const toastrMap = {
                    error: toastr.error,
                    info: toastr.info,
                    warning: toastr.warning,
                    success: toastr.success
                };

                (toastrMap[type] || toastr.success)(message);
            });

            Livewire.on('destroyItem', (id) => {
            Swal.fire({
                title: 'Estas segro?',
                text: "¡Deseas Eliminar este Item!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminalo!'
                }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('deleteItem')
                }});
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const countEl = document.getElementById('notification-count');
            if (!countEl) {
                return;
            }

            const count = parseInt(countEl.textContent || '0', 10);
            const dot = document.querySelector('#notification-drop .dots');

            if (!dot) {
                return;
            }

            if (count > 0) {
                dot.classList.remove('notification-hidden');
                dot.classList.add('notification-badge-number');
                dot.textContent = count > 99 ? '99+' : String(count);
            } else {
                dot.classList.add('notification-hidden');
                dot.textContent = '';
            }
        });
    </script>
</body>
</html>
