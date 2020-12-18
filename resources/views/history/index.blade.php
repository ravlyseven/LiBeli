@extends('layouts/sidebar')

@section('title')
<title>Libeli - History</title>
@endsection

@section('content')

<!-- DataTales Example -->
<div class="card shadow mx-4">
    <div class="card-header py-3 bg-gradient-primary">
        <h6 class="m-0 font-weight-bold text-light">Riwayat Pesanan</h6>
    </div>
            
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-gradient-light">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Toko</th>
                        <th>Nama Pelanggan</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $order->updated_at }}</td>
                        <td>{{ $order->seller->name }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td align="left">Rp. {{ number_format($order->total_price+$order->code) }}</td>
                        <td>
                            @if($order->status == 1)
                            Belum Dibayar
                            @elseif($order->status == 2)
                            Sudah Dibayar
                            @elseif($order->status == 3)
                            Pembayaran Valid
                            @elseif($order->status == 4)
                            Barang Dalam Pengiriman
                            @elseif($order->status == 5)
                            Selesai
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('history') }}/{{ $order->id }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-info mr-1"></i>Detail</a>
                        </td>
                    </tr>
                    
                    @endforeach
                </tbody>

            </table>    
        </div>
    </div>
    
</div>

@endsection