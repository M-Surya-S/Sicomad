@extends('home.layouts.app')

@section('content')
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($item_keranjang->isEmpty())
                                    <tr>
                                        <td colspan="4" style="text-align: center;">There are no items in the cart</td>
                                    </tr>
                                @else
                                    @foreach ($item_keranjang as $item) 
                                        <tr>
                                            <td class="product__cart__item">
                                                <div class="product__cart__item__pic">
                                                    <img src="{{ Storage::url($item->produk->gambar) }}" alt="" style=" width: 90px; height: 90px; object-fit: cover;">
                                                </div>
                                                <div class="product__cart__item__text">
                                                    <h6>{{ $item->produk->nama }}</h6>
                                                    <h5>{{ $item->produk->harga }}</h5>
                                                </div>
                                            </td>
                                            <td class="quantity__item">
                                                <div class="quantity">
                                                    <div class="pro-qty-2">
                                                        <input type="text" value="{{ $item->quantity }}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__price">Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                                            <td class="cart__close">
                                                <form action="{{ route('cart-delete', $item->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="background: none; border: none; cursor: pointer;">
                                                        <i class="fa fa-close"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{ route('catalog') }}">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Total <span>Rp {{ number_format($total_harga, 0, ',', '.') }}</span></li>
                        </ul>
                        <a href="{{ route('checkout') }}" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
