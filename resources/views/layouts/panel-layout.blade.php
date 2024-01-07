@props(['title'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initialD-scale=1.0" />
    <meta name="keywords" content="event, unica, creative, html" />
    <meta name="description" content="Unica University Template" />
    <link href="{{ asset('favicon.ico') }}" rel="shortcut icon" />
    <title>{{ $title . ' | ' . config('app.name') }}</title>
    <link href="{{ asset('assets/panel/dist/css/style.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/panel/src/scss/select2/select2.min.css') }}" rel="stylesheet" />
    @stack('styles')
    @livewireStyles
</head>

<body>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                        <b class="logo-icon ps-2">
                            <img src="{{ asset('logo.webp') }}" alt="{{ config('app.name') }}" class="light-logo" width="25" />
                        </b>
                        <h3 class="logo-text ms-3 my-auto">
                            {{ config('app.name') }}
                        </h3>
                    </a>
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" title="Menu Toggler" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-start me-auto">
                        <li class="nav-item d-none d-md-block" title="menu collapse">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav float-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('assets/panel/assets/images/users/1.jpg') }}" alt="user" class="rounded-circle" width="31" />
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-account me-1 ms-1"></i> My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-email me-1 ms-1"></i> Inbox</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-settings me-1 ms-1"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off me-1 ms-1"></i> Logout</a>
                            </ul>
                            <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        @can('admin')
                            <x-panel-app.admin.menu-bar />
                        @endcan
                        @can('agency')
                            <x-panel-app.agency.menu-bar />
                        @endcan
                        <li class="sidebar-item d-block d-md-none" title="{{ $title }}">
                            <a class="sidebar-link waves-effect waves-dark" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i><span class="hide-menu">Logout</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">{{ $title }}</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid py-0">
                {{ $slot }}
            </div>
            <footer class="footer text-center">
                All Rights Reserved by
                <a href="{{ route('welcome') }}" class="text-main">{{ config('app.name') }}</a>.
            </footer>
        </div>
    </div>
    <script src="{{ asset('assets/panel/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/panel/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/panel/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/panel/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <script src="{{ asset('assets/panel/dist/js/waves.js') }}"></script>
    <script src="{{ asset('assets/panel/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/panel/dist/js/custom.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/panel/src/scss/select2/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-select').select2({
                selectionCssClass: "form-select shadow-none",
                theme: "default"
            });
        });
    </script>
    @stack('scripts')
    @livewireScripts
</body>

</html>
