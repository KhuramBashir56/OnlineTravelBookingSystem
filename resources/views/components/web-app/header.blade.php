<header class="header-area">
    <div class="top-header-area">
        <div class="container">
            <div class="row align-items-center" style="min-height: 57px;">
                <div class="col-xl-6 col-lg-7">
                    <div class="contact-info">
                        <div class="content">
                            <i class="bx bx-phone"></i>
                            <a href="tel:+0123456987">+0123 456 987</a>
                        </div>
                        <div class="content">
                            <i class="bx bx-envelope"></i>
                            <a href="">abc@abc.com</a>
                        </div>
                        <div class="content">
                            <i class="bx bx-map"></i>
                            <a href="#">Mon-Fri: 8 AM – 7 PM</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5">
                    <div class="side-option">
                        @guest
                            <div class="item">
                                <a href="{{ route('register') }}" class="btn-secondary"> Register </a>
                            </div>
                            <div class="item">
                                <a href="{{ route('login') }}" class="btn-secondary"> Login </a>
                            </div>
                        @endguest
                        <div class="item">
                            <a href="#searchBox" id="searchButton" class="btn-search" data-effect="mfp-zoom-in">
                                <i class="bx bx-search-alt"></i>
                            </a>
                            <div id="searchBox" class="search-box mfp-with-anim mfp-hide">
                                <form class="search-form">
                                    <input class="search-input" name="search" placeholder="Search" type="text" />
                                    <button class="btn-search">
                                        <i class="bx bx-search-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-navbar-area">
        <div class="main-responsive-nav">
            <div class="container">
                <div class="main-responsive-menu">
                    <div class="logo">
                        <a href="{{ route('welcome') }}">
                            <img src="{{ asset('assets/web-app/img/logo1.png') }}" class="logo1" alt="Logo" />
                            <img src="{{ asset('assets/web-app/img/logo2.png') }}" class="logo2" alt="Logo" />
                        </a>
                    </div>
                    @auth
                        <div class="cart responsive" title="{{ Auth::user()->name }}">
                            <a href="{{ route('login') }}" class="cart-btn"><i class="bx bx-user"></i></a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
        <div class="main-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="{{ route('welcome') }}">
                        <img src="{{ asset('assets/web-app/img/logo1.png') }}" class="logo1" alt="Logo" />
                        <img src="{{ asset('assets/web-app/img/logo2.png') }}" class="logo2" alt="Logo" />
                    </a>
                    <div class="collapse navbar-collapse mean-menu">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a href="{{ route('welcome') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('destinations') }}" class="nav-link {{ request()->is('destinations') ? 'active' : '' }}">Destinations</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('packages') }}" class="nav-link {{ request()->is('packages') ? 'active' : '' }}">Tour Packages</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('contact_us') }}" class="nav-link {{ request()->is('contact-us') ? 'active' : '' }}">Contact</a>
                            </li>
                            @auth
                                @can('user')
                                    <li class="nav-item d-block d-xl-none">
                                        <a href="{{ route('history') }}" class="nav-link {{ request()->is('panel/user/tour-history') ? 'active' : '' }}">My Tour History</a>
                                    </li>
                                    <li class="nav-item d-block d-xl-none">
                                        <a href="{{ route('password.change') }}" class="nav-link {{ request()->is('password') ? 'active' : '' }}">Change Password</a>
                                    </li>
                                @endcan
                                <li class="nav-item d-block d-xl-none">
                                    <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">Logout</button>
                                </li>
                            @endauth
                            @auth
                                <li class="nav-item dropdown">
                                    <a href="javascript:void(0)" class="cart-btn" role="button"><i class="bx bx-user"></i></a>
                                    <ul class="dropdown-menu">
                                        @can('user')
                                            <li><a class="px-4 dropdown-item" href="{{ route('history') }}">My Tour History</a></li>
                                            <li><a class="px-4 dropdown-item" href="{{ route('password.change') }}">Change Password</a></li>
                                        @endcan
                                        <hr class="dropdown-divider">
                                        <li><a class="px-4 dropdown-item" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                    </ul>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<form id="logout-formo" class="d-none" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

