<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png" />
    <title>{{ request()->is('/') ? config('app.name') : $title . ' | ' . config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/web-app/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/web-app/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/web-app/css/boxicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/web-app/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/web-app/css/bootstrap-datepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/web-app/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/web-app/css/magnific-popup.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/web-app/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/web-app/css/meanmenu.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/web-app/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/web-app/css/responsive.css') }}" />
    @stack('styles')
    @livewireStyles
</head>

<body>

    @include('components.web-app.header')
    {{ $slot }}
    @include('components.web-app.footer')
    <script src="{{ asset('assets/web-app/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/web-app/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/web-app/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/web-app/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/web-app/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/web-app/js/jquery.filterizr.min.js') }}"></script>
    <script src="{{ asset('assets/web-app/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/web-app/js/meanmenu.min.js') }}"></script>
    <script src="{{ asset('assets/web-app/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('assets/web-app/js/script.js') }}"></script>
    @stack('scripts')
    @livewireScripts
</body>

</html>
