@extends('dashboard.layouts.app')

@section('content-dashboard')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Orders Table</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Orders</li>
                            <li class="breadcrumb-item active">Table</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Full Name</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pesanan as $p)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $p->nama_lengkap }}</td>
                                                <td>{{ $p->item_pesanan->sum('quantity') }}</td>
                                                <td>Rp {{ number_format($p->total, 0, ',', '.') }}</td>
                                                <td>{{ $p->status }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-secondary btn-view"
                                                        data-id="{{ $p->id }}" data-toggle="modal"
                                                        data-target="#orderDetailModal"
                                                        data-nama_lengkap="{{ $p->nama_lengkap }}"
                                                        data-alamat="{{ $p->alamat }}"
                                                        data-nomor_hp="{{ $p->nomor_hp }}"
                                                        data-total="Rp {{ number_format($p->total, 0, ',', '.') }}"
                                                        data-status="{{ $p->status }}"
                                                        data-catatan_pesanan="{{ $p->catatan_pesanan }}"
                                                        data-bukti="{{ Storage::url($p->bukti) }}">
                                                        <i class="fas fa-eye fa-sm"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Full Name</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="orderDetailModal" tabindex="-1" aria-labelledby="orderDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="updateStatusForm" action="{{ route('update-orders-status', $p->id) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="orderDetailModalLabel">Order Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Full Name</th>
                                <td id="nama_lengkap"></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td id="alamat"></td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td id="nomor_hp"></td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td id="total"></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <select name="status" id="status" class="form-control">
                                        <option value="Diproses">Diproses</option>
                                        <option value="Dikemas">Dikemas</option>
                                        <option value="Dalam Perjalanan">Dalam Perjalanan</option>
                                        <option value="Selesai">Selesai</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Order Notes</th>
                                <td id="catatan_pesanan"></td>
                            </tr>
                            <tr>
                                <th>Proof of Payment</th>
                                <td>
                                    <img id="bukti" src="" alt="Proof of Payment"
                                        style="max-width: 30%; height: auto;" />
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @push('script')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const buttons = document.querySelectorAll('.btn-view');

                buttons.forEach(button => {
                    button.addEventListener('click', function() {
                        const form = document.getElementById('updateStatusForm');
                        const orderId = this.dataset.id;

                        // Update action form dengan ID
                        form.action = `/admin-dashboard/orders/update-status/${orderId}`;

                        // Isi data lainnya ke dalam modal
                        document.getElementById('nama_lengkap').textContent = this.dataset.nama_lengkap;
                        document.getElementById('alamat').textContent = this.dataset.alamat;
                        document.getElementById('nomor_hp').textContent = this.dataset.nomor_hp;
                        document.getElementById('total').textContent = this.dataset.total;
                        document.getElementById('status').value = this.dataset.status;
                        document.getElementById('catatan_pesanan').textContent = this.dataset
                            .catatan_pesanan || '-';
                        document.getElementById('bukti').src = this.dataset.bukti;
                    });
                });
            });
        </script>
    @endpush
@endsection
