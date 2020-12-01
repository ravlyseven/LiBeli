@extends('layouts/sidebar')

@section('title')
<title>Libeli - Orders</title>
@endsection

@section('content')

<!-- DataTales Example -->
<div class="card shadow mx-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Keranjang Belanja</h6>
    </div>
    @if($orders != null)            
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($order_details as $order_detail)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $order_detail->product_id }}</td>
                        <td>{{ $order_detail->quantity }}</td>
                        <td align="left">Rp. {{ number_format($order_detail->product_id) }}</td>
                        <td align="left">Rp. {{ number_format($order_detail->total_price) }}</td>
                        <td>
                            <form action="{{ url('orders') }}/{{ $order_detail->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" align="right">Total Harga</td>
                        <td align="left">Rp. {{ number_format($orders->total_price) }}</td>
                        <td>
                            <a href="{{ url('checkout') }}" class="btn btn-success">
                                <i class="fa fa-shopping-cart"></i>Checkout
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>    
        </div>
    </div>
    @endif
</div>

@endsection