@extends('home.layouts.app')

@section('content')
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Tanggal Pesan</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($item_pesanan->isEmpty())
                                    <tr>
                                        <td colspan="5" style="text-align: center;">You have not placed any orders yet
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($item_pesanan as $item)
                                        <tr>
                                            <td class="product__cart__item">
                                                <div class="product__cart__item__pic">
                                                    <img src="{{ Storage::url($item->produk->gambar) }}" alt=""
                                                        style=" width: 90px; height: 90px; object-fit: cover;">
                                                </div>
                                                <div class="product__cart__item__text">
                                                    <h6>{{ $item->produk->nama }}</h6>
                                                    <h5>{{ $item->produk->harga }}</h5>
                                                </div>
                                            </td>
                                            <td class="cart__price text-center">{{ $item->quantity }}</td>
                                            <td class="cart__price text-center">Rp
                                                {{ number_format($item->total, 0, ',', '.') }}</td>
                                            <td class="cart__price text-center">
                                                {{ \Carbon\Carbon::parse($item->pesanan->created_at)->format('d M Y') }}
                                            </td>
                                            <td class="cart__price text-center">{{ $item->pesanan->status }}</td>
                                            <td class="cart__price text-center">
                                                <a href="{{ route('cart-add-again', $item->produk->id) }}"
                                                    class="btn btn-secondary"
                                                    style="background-color: black; color: #fff; padding: 5px 10px; text-decoration: none; display: inline-block;">
                                                    <i class="fa fa-cart-plus"></i> Add To Cart
                                                </a>                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
