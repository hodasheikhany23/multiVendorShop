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

    {{-- استایل‌های اضافه شما --}}
    <link rel="shortcut icon" href="{{asset('assets/media/logos/logo-1.ico')}}" />

    <link href="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/fonts/fonts.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/fonts/iransans.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/admin/pages/general/login/login-3.rtl.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/admin/pages/general/wizard/wizard-3.rtl.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/vendors/general/tether/dist/css/tether.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/select2/dist/css/select2.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/nouislider/distribute/nouislider.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/summernote/dist/summernote.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/animate.css/animate.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/toastr/build/toastr.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/morris.js/morris.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/sweetalert2/dist/sweetalert2.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/socicon/css/socicon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css" />

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{asset('assets/css/admin/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
{{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />--}}


    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{asset('assets/css/admin/skins/header/base/light.rtl.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/admin/skins/header/menu/light.rtl.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/admin/skins/brand/light.rtl.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/admin/skins/aside/light.rtl.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />

</head>
<body dir="rtl" class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
@auth
    @if(auth()->user()->role === 1)
        @livewire('sidebar', ['locale' => session('locale'),'title' => $title ?? 'نام صفحه ','header_left'=> $header_left ?? ''])
    @else
        @livewire('front.header')
    @endif
@endauth
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
                "primary": "#D5465C",
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

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
{{--        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}

        <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });
        </script>
        <!-- end::Global Config -->
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>--}}
{{--<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>--}}

<!--begin:: Global Mandatory Vendors -->
<script src="{{asset('assets/vendors/general/jquery/dist/jquery.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/coreui.bundle.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/popper.js/dist/umd/popper.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/js-cookie/src/js.cookie.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/moment/min/moment.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/sticky-js/dist/sticky.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/wnumb/wNumb.js')}}" type="text/javascript"></script>


<!--begin:: Global Optional Vendors -->
<script src="{{asset('assets/vendors/general/jquery-form/dist/jquery.form.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/block-ui/jquery.blockUI.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/js/vendors/bootstrap-datepicker.init.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/js/vendors/bootstrap-timepicker.init.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/js/vendors/bootstrap-switch.init.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/select2/dist/js/select2.full.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/typeahead.js/dist/typeahead.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/handlebars/dist/handlebars.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/nouislider/distribute/nouislider.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/owl.carousel/dist/owl.carousel.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/autosize/dist/autosize.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/clipboard/dist/clipboard.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/dropzone/dist/dropzone.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/summernote/dist/summernote.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/markdown/lib/markdown.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/js/vendors/bootstrap-markdown.init.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/js/vendors/bootstrap-notify.init.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/jquery-validation/dist/jquery.validate.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/jquery-validation/dist/additional-methods.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/js/vendors/jquery-validation.init.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/toastr/build/toastr.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/raphael/raphael.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/morris.js/morris.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/chart.js/dist/Chart.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/waypoints/lib/jquery.waypoints.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/counterup/jquery.counterup.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/es6-promise-polyfill/promise.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/sweetalert2/dist/sweetalert2.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/js/vendors/sweetalert2.init.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/jquery.repeater/src/lib.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/jquery.repeater/src/jquery.input.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/jquery.repeater/src/repeater.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/dompurify/dist/purify.js')}}" type="text/javascript"></script>

<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="{{asset('assets/js/demo1/scripts.bundle.js')}}" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors(used by this page) -->
<script src="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>
<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/gmaps/gmaps.js')}}" type="text/javascript"></script>

<!--end::Page Vendors -->

<!--begin::Page Scripts(used by this page) -->
<script src="{{asset('assets/js/demo1/pages/dashboard.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/demo1/pages/crud/forms/widgets/bootstrap-touchspin.js')}}" type="text/javascript"></script>

<script src="https://unpkg.com/dropzone"></script>


<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('language-changed', () => {
            location.reload();
        });
    });
</script>
@stack('scripts')
</body>
</html>
