@extends('home.layouts.app')

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="{{ asset('assets/home/img/hero/hero-1.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-6">
                            <div class="hero__text">
                                <h2>Transform Your Space with Elegant Curtains</h2>
                                <p>Discover premium curtains and accessories, designed to enhance your home's
                                    beauty and functionality. Crafted with care, for style and comfort that lasts.</p>
                                <a href="{{ route('catalog') }}" class="primary-btn">Shop now <span
                                        class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Section Begin -->
    <section class="about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="about__pic">
                        <img src="{{ asset('assets/home/img/about/testimonial-pic.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="about__item">
                        <h4>Who We Are?</h4>
                        <p>We are a dedicated provider of premium curtains and home accessories, committed to delivering
                            elegance and functionality to every space.</p>
                    </div>
                    <div class="about__item">
                        <h4>What We Do?</h4>
                        <p>We design and offer a curated selection of high-quality curtains, blinds, and accessories to
                            transform your windows into stylish focal points.</p>
                    </div>
                    <div class="about__item">
                        <h4>Why Choose Us?</h4>
                        <p>Our products combine exceptional quality, innovative designs, and tailored solutions to perfectly
                            fit your home’s unique style and needs.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active">New Arrivals</li>
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
                @foreach ($new_arrivals as $p)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ Storage::url($p->gambar) }}">
                                <span class="label">New</span>
                            </div>
                            <div class="product__item__text">
                                <h6>{{ $p->nama }}</h6>
                                @auth
                                    <a href="{{ route('cart-add', $p->id) }}" class="add-cart">+ Add To Cart</a>
                                @endauth
                                @guest
                                    <a href="{{ route('login') }}" class="add-cart">Login To Add To Cart</a>
                                @endguest
                                <h5>{{ $p->harga }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->
@endsection
