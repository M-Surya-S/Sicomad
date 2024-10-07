<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__option">
        <div class="offcanvas__links">
            @if (auth()->check())
                @if (auth()->user()->role === 'superadmin')
                    <a href="{{ route('super-admin') }}">Dashboard</a>
                @elseif (auth()->user()->role === 'admin')
                    <a href="{{ route('admin') }}">Dashboard</a>
                @elseif (auth()->user()->role === 'pengguna')
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
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
        <a href="#"><img src="{{ asset('assets/home/img/icon/cart.png') }}" alt=""> <span>0</span></a>
        <div class="price">$0.00</div>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__text">
        <p>Free shipping, 30-day return or refund guarantee.</p>
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
                        <p>Free shipping, 30-day return or refund guarantee.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        <div class="header__top__links">
                            @if (auth()->check())
                                @if (auth()->user()->role === 'superadmin')
                                    <a href="{{ route('super-admin') }}">Dashboard</a>
                                @elseif (auth()->user()->role === 'admin')
                                    <a href="{{ route('admin') }}">Dashboard</a>
                                @elseif (auth()->user()->role === 'pengguna')
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
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
                        <li class="active"><a href="./index.html">Home</a></li>
                        <li><a href="./shop.html">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="./about.html">About Us</a></li>
                                <li><a href="./shop-details.html">Shop Details</a></li>
                                <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                                <li><a href="./checkout.html">Check Out</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="./contact.html">Contacts</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option">
                    <a href="#" class="search-switch"><img src="{{ asset('assets/home/img/icon/search.png') }}"
                            alt=""></a>
                    <a href="#"><img src="{{ asset('assets/home/img/icon/heart.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('assets/home/img/icon/cart.png') }}" alt="">
                        <span>0</span></a>
                    <div class="price">$0.00</div>
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
<!-- Header Section End -->
