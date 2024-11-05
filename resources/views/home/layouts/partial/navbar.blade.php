<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__option">
        <div class="offcanvas__links">
            @if (auth()->check())
                @if (auth()->user()->role === 'superadmin')
                    <a>Halo, {{ auth()->user()->name }}</a>
                    <a href="{{ route('super-admin') }}">Dashboard</a>
                @elseif (auth()->user()->role === 'admin')
                    <a>Halo, {{ auth()->user()->name }}</a>
                    <a href="{{ route('admin') }}">Dashboard</a>
                @elseif (auth()->user()->role === 'pengguna')
                    <a>Halo, {{ auth()->user()->name }}</a>
                @endif
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            @else
                <a href="{{ route('login') }}">Sign in</a>
            @endif

        </div>
    </div>
    <div class="offcanvas__nav__option">
        <a href="#" class="search-switch"><img src="{{ asset('assets/home/img/icon/search.png') }}"
                alt=""></a>
        <a href="#"><img src="{{ asset('assets/home/img/icon/heart.png') }}" alt=""></a>
        <a href="{{ route('cart') }}"><img src="{{ asset('assets/home/img/icon/cart.png') }}" alt=""></a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__text">
        <p>Sistem Informasi Toko Rahmad Gorden</p>
    </div>
</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">
                        <p>Sistem Informasi Toko Rahmad Gorden</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        <div class="header__top__links">
                            @if (auth()->check())
                                @if (auth()->user()->role === 'superadmin')
                                    <a>Halo, {{ auth()->user()->name }}</a>
                                    <a href="{{ route('super-admin') }}">Dashboard</a>
                                @elseif (auth()->user()->role === 'admin')
                                    <a>Halo, {{ auth()->user()->name }}</a>
                                    <a href="{{ route('admin') }}">Dashboard</a>
                                @elseif (auth()->user()->role === 'pengguna')
                                    <a>Halo, {{ auth()->user()->name }}</a>
                                @endif
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            @else
                                <a href="{{ route('login') }}">Sign in</a>
                                <a href="{{ route('register') }}">Sign up</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="./index.html"><img src="{{ asset('assets/home/img/logo.png') }}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                        <li class="{{ Request::is('catalog') ? 'active' : '' }}"><a href="{{ route('catalog') }}">Catalog</a></li>
                        <li class="{{ Request::is('about-us') ? 'active' : '' }}"><a href="{{ route('about-us') }}">About Us</a></li>
                        <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="./contact.html">Contacts</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option">
                    <a href="#" class="search-switch"><img src="{{ asset('assets/home/img/icon/search.png') }}" alt="search"></a>
                    @auth
                        <a href="#"><img src="{{ asset('assets/home/img/icon/order.png') }}" alt="order"></a>
                        <a href="{{ route('cart') }}"><img src="{{ asset('assets/home/img/icon/cart.png') }}" alt="cart"></a>
                    @endauth
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
<!-- Header Section End -->
