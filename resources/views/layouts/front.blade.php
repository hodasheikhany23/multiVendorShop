<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Vite CSS & JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Livewire Styles --}}
    @livewireStyles
    <link rel="shortcut icon" href="{{asset('assets/media/logos/logo-1.ico')}}" />


    <link href="{{asset('assets/fonts/fonts.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/fonts/iransans.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/admin/pages/general/login/login-3.rtl.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{asset('assets/css/front/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/front/demo10.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/front/rtl.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/front/responsive.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/css/front/plugins/animate.css')}}" />
{{--    <link rel="stylesheet" href="{{asset('assets/css/front/plugins/ecicons.min.css')}}" />--}}
    <link rel="stylesheet" href="{{asset('assets/css/front/plugins/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/front/plugins/jquery-ui.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/front/plugins/countdownTimer.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/front/plugins/nouislider.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/front/plugins/slick.min.')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/front/plugins/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/front/plugins/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/front/plugins/bootstrap.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!--end::Global Theme Styles -->


</head>
<body dir="rtl" class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

@livewire('front.header')

@if(\Illuminate\Support\Facades\Auth::check())
    <main class="bg-gray-100 kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper">
        {{ $slot ?? '' }}
        @else
            <main>
                @yield('content')
                @endif
            </main>

            <!-- begin:: Footer -->
            <div class="kt-footer kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
                <div class="kt-footer__copyright">
                    2025&nbsp;&copy;&nbsp;<a wire:navigate href="/admin/menu" target="_blank" class="kt-link">HodaWeb</a>
                </div>
                <div class="kt-footer__menu">
                    <a wire:navigate href="/admin/menu" target="_blank" class="kt-footer__menu-link kt-link">درباره ما</a>
                    <a wire:navigate href="/admin/menu" target="_blank" class="kt-footer__menu-link kt-link">تیم ما</a>
                    <a wire:navigate href="/admin/menu" target="_blank" class="kt-footer__menu-link kt-link">تماس با ما</a>
                </div>
            </div>

            <!-- end:: Footer -->

            @livewireScripts


            <!-- begin::Global Config(global config for global JS sciprts) -->
            <script>
                var KTAppOptions = {
                    "colors": {
                        "state": {
                            "brand": "#D5465C",
                            "dark": "#282a3c",
                            "light": "#ffffff",
                            "primary": "#d3522a",
                            "success": "#4CAF50",
                            "info": "#5C7AEA",
                            "warning": "#E09E45",
                            "danger": "#D54545"
                        },
                        "base": {
                            "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                            "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                        }
                    }
                };
            </script>

            <!-- end::Global Config -->

            <script src="https://kit.fontawesome.com/c0d1944c94.js" crossorigin="anonymous"></script>
            <!-- Vendor JS -->
            <script src="{{asset('assets/js/front/vendor/jquery-3.5.1.min.js')}}"></script>
            <script src="{{asset('assets/js/front/vendor/popper.min.js')}}"></script>
            <script src="{{asset('assets/js/front/vendor/bootstrap.min.js')}}"></script>
            <script src="{{asset('assets/js/front/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
            <script src="{{asset('assets/js/front/vendor/modernizr-3.11.2.min.js')}}"></script>

            <!--Plugins JS-->

            <script src="{{asset('assets/js/front/plugins/jquery.sticky-sidebar.js')}}"></script>
            <script src="{{asset('assets/js/front/plugins/swiper-bundle.min.js')}}"></script>
            <script src="{{asset('assets/js/front/plugins/countdownTimer.min.js')}}"></script>
            <script src="{{asset('assets/js/front/plugins/nouislider.js')}}"></script>
            <script src="{{asset('assets/js/front/plugins/jquery.zoom.min.js')}}"></script>
            <script src="{{asset('assets/js/front/plugins/slick.min.js')}}"></script>
            <script src="{{asset('assets/js/front/plugins/scrollup.js')}}"></script>
            <script src="{{asset('assets/js/front/plugins/owl.carousel.min.js')}}"></script>
            <script src="{{asset('assets/js/front/plugins/infiniteslidev2.js')}}"></script>
            <script src="{{asset('assets/js/front/plugins/click-to-call.js')}}"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

            <!-- Main Js -->
            <script src="{{asset('assets/js/front/vendor/index.js')}}"></script>
            <script>
                document.addEventListener('livewire:load', function () {
                    Livewire.on('language-changed', () => {
                        location.reload();
                    });
                });
            </script>
            <script src="{{asset('assets/js/front/demo-9.js')}}"></script>

</body>
</html>
