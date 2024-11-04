@extends('dashboard.layouts.app')

@section('content-dashboard')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Product</li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <form action="{{ route('product-update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" class="form-control" id="name" name="nama"
                                    value="{{ $produk->nama }}" required>
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="kategori_id" required>
                                    <option value="" disabled>Select Category</option>
                                    @foreach ($kategori as $kat)
                                        <option value="{{ $kat->id }}"
                                            {{ $produk->kategori_id == $kat->id ? 'selected' : '' }}>{{ $kat->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="numberInput">Stock</label>
                                <input type="text" class="form-control" id="numberInput" name="stok"
                                    value="{{ $produk->stok }}" required>
                            </div>
                            <div class="form-group">
                                <label for="rupiahInput">Price</label>
                                <input type="text" class="form-control" id="rupiahInput" name="harga"
                                    value="{{ $produk->harga }}" required>
                            </div>
                            <div class="form-group">
                                <label for="images">Product Images</label>
                                <input type="file" class="form-control" id="images" name="gambar">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
