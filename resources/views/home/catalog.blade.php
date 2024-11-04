@extends('home.layouts.app')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Catalog</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}">Home</a>
                            <span>Catalog</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        {{-- Search Bar --}}
                        <div class="shop__sidebar__search">
                            <form action="{{ route('catalog') }}" method="GET">
                                <input type="text" name="search" placeholder="Search..."
                                    value="{{ request('search') }}">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>

                        {{-- Category Column --}}
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    <li>
                                                        <a href="{{ route('catalog') }}">
                                                            Show All
                                                        </a>
                                                    </li>
                                                    @foreach ($kategori as $item)
                                                        <li>
                                                            <a href="{{ route('catalog', ['kategori' => $item->id]) }}">
                                                                {{ $item->nama }} ({{ $item->produk_count }})
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Showing Item Results --}}
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>Showing {{ $produk->firstItem() }}–{{ $produk->lastItem() }} of
                                        {{ $produk->total() }} results</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                            </div>
                        </div>
                    </div>

                    {{-- Produk Catalog --}}
                    <div class="row">
                        @if ($produk->isEmpty())
                            <div class="col-lg-12">
                                <p class="text-center">Produk tidak ditemukan</p>
                            </div>
                        @else
                            @foreach ($produk as $p)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg"
                                            data-setbg="{{ Storage::url($p->gambar) }}"></div>
                                        <div class="product__item__text">
                                            <h6>{{ $p->nama }}</h6>
                                            <a href="#" class="add-cart">+ Add To Cart</a>
                                            <h5>{{ $p->harga }}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    {{-- Pagination --}}
                    <div class="row">
                        <div class="col-lg-12">
                            @if ($produk->lastPage() > 1)
                                <div class="product__pagination">
                                    {{-- Tautan ke halaman pertama --}}
                                    <a href="{{ $produk->url(1) }}" class="{{ $produk->currentPage() == 1 ? 'active' : '' }}">1</a>
                    
                                    {{-- Tampilkan "..." jika halaman lebih dari 3 --}}
                                    @if ($produk->currentPage() > 3)
                                        <span>...</span>
                                    @endif
                    
                                    {{-- Tautan untuk halaman sebelum dan sesudah halaman saat ini --}}
                                    @foreach (range(max(2, $produk->currentPage() - 1), min($produk->lastPage() - 1, $produk->currentPage() + 1)) as $page)
                                        {{-- Pastikan tidak ada duplikasi halaman 1 atau halaman terakhir --}}
                                        @if ($page != 1 && $page != $produk->lastPage())
                                            <a href="{{ $produk->url($page) }}" class="{{ $produk->currentPage() == $page ? 'active' : '' }}">
                                                {{ $page }}
                                            </a>
                                        @endif
                                    @endforeach
                    
                                    {{-- Tampilkan "..." sebelum halaman terakhir jika belum mencapai halaman terakhir --}}
                                    @if ($produk->currentPage() < $produk->lastPage() - 2)
                                        <span>...</span>
                                    @endif
                    
                                    {{-- Tautan ke halaman terakhir --}}
                                    @if ($produk->lastPage() > 1)
                                        <a href="{{ $produk->url($produk->lastPage()) }}" class="{{ $produk->currentPage() == $produk->lastPage() ? 'active' : '' }}">
                                            {{ $produk->lastPage() }}
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
@endsection
