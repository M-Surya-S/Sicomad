@extends('home.layouts.app')

@section('content')
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="{{ route('make-order') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="checkout__input">
                                <p>Nama Lengkap<span>*</span></p>
                                <input type="text" name="nama_lengkap" required>
                            </div>
                            <div class="checkout__input">
                                <p>Alamat<span>*</span></p>
                                <input type="text" name="alamat" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="checkout__input">
                                        <p>Kode Pos<span>*</span></p>
                                        <input type="text" name="kode_pos" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="checkout__input">
                                        <p>Kota<span>*</span></p>
                                        <input type="text" name="kota" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="checkout__input">
                                        <p>Provinsi<span>*</span></p>
                                        <input type="text" name="provinsi" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Negara<span>*</span></p>
                                <input type="text" name="negara" required>
                            </div>
                            <div class="checkout__input">
                                <p>Nomor Handphone<span>*</span></p>
                                <input type="text" name="nomor_hp" required>
                            </div>
                            <div class="checkout__input">
                                <p>Catatan Pesanan</p>
                                <input type="text" name="catatan_pesanan"
                                    placeholder="Catatan tentang pesanan Anda, misal. catatan khusus untuk pengiriman.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    @foreach ($item_keranjang as $item) 
                                        <li>{{ $item->produk->nama }} (x{{ $item->quantity }}) <span>Rp {{ number_format($item->total, 0, ',', '.') }}</span></li>
                                    @endforeach
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Total <span>Rp {{ number_format($total_harga, 0, ',', '.') }}</span></li>
                                </ul>
                                <button type="submit" class="site-btn">CHECKOUT</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
