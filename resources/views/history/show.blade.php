@extends('layouts/sidebar')

@section('title')
<title>Libeli - Order Detail</title>
@endsection

@section('content')

<!-- DataTales Example -->
<div class="card shadow mx-4">
    <div class="card-header py-3 bg-gradient-primary">
        <h6 class="m-0 font-weight-bold text-light">Order Detail</h6>
    </div>

    <div class="mt-3">
    @if($order->status == 1)
        <h3 class="text-dark text-center font-weight-bold">Terimakasih Silahkan Lakukan Pembayaran</h3>
        <img class="rounded mx-auto d-block" width="30%;" src="{{ asset('images/rekening.jpeg') }}">
    
    @elseif($order->status == 2)
        <p class="text-center font-weight-bold">Terimakasih Atas Pembayarannya</p>
        <p class="text-center font-weight-bold">Kami Akan Cek Pembayaranmu Segera</p>

    @elseif($order->status == 3)
        <p class="text-center font-weight-bold">Terimakasih Atas Pembayarannya</p>
        <p class="text-center font-weight-bold">Paket Kamu Akan Segera Kami Kirimkan</p>

    @elseif($order->status == 4)
        <p class="text-center font-weight-bold">Paket Kamu Sedang Dalam Pengiriman</p>
    
    @elseif($order->status == 5)
        <p class="text-center font-weight-bold">Paket Kamu Telah Sampai</p>

    @endif
    </div>
            
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-gradient-light">
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($order_details as $order_detail)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            <img width="100px;" src="{{ asset('storage/'.$order_detail->product->photo) }}">
                        </td>
                        <td>{{ $order_detail->product->name }}</td>
                        <td>{{ $order_detail->quantity }}</td>
                        <td align="left">Rp. {{ number_format($order_detail->product->price) }}</td>
                        <td align="left">Rp. {{ number_format($order_detail->total_price) }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td class="font-weight-bold" colspan="5" align="right">Kode Unik</td>
                        <td class="font-weight-bold" align="left">Rp. {{ number_format($order->code) }}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold" colspan="5" align="right">Ongkir ({{ $order->total_weight }} gram)</td>
                        <td class="font-weight-bold" align="left">Rp. {{ number_format($order->ongkir) }}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold" colspan="5" align="right">Total Yang Harus Dibayar</td>
                        <td class="font-weight-bold" align="left">Rp. {{ number_format($order->total_price + $order->code + $order->ongkir) }}</td>
                    </tr>
                    @if(\Auth::user()->hasAnyRole('penjual'))
                    <tr>
                        <td class="font-weight-bold" colspan="5" align="right">Biaya Admin</td>
                        <td class="font-weight-bold" align="left">Rp. {{ number_format($order->total_price*5/105) }}</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="progress mb-4">
                                @if($order->status == 1)
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
                                @elseif($order->status == 2)
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%</div>
                                @elseif($order->status == 3)
                                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                                @elseif($order->status == 4)
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
                                @elseif($order->status == 5)
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                                @endif
                            </div>
                        </div>
                    </div>    
            
            <a class="btn btn-primary" href="{{ url('history') }}">Kembali</a>
            
            @if($order->status == 1)  
            <form action="{{ url('history') }}/{{ $order->id }}" method="post" class="d-inline">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Batal Order</button>
            </form>
            @endif

            <a class="btn btn-primary" href="{{ url('history') }}/{{ $order->id }}/{{ 'info' }}">Rincian Pembayaran</a>

            @if(\Auth::user()->hasAnyRole('penjual'))
                @if($order->status == 3)
                    <form action="{{ url('history') }}/{{ $order->id }}/{{ 'verifikasi-pengiriman' }}" method="post" class="d-inline">
                    @csrf
                        <button type="submit" class="btn btn-warning"><i class="fa fa-info mr-1"></i>Verifikasi Pengiriman</button>
                    </form>
                @endif  
            @endif

            @if(\Auth::user()->hasAnyRole('penjual'))
            @elseif(\Auth::user()->hasAnyRole('admin'))
            @elseif($order->status == 4)
                <form action="{{ url('history') }}/{{ $order->id }}/{{ 'verifikasi-selesai' }}" method="post" class="d-inline">
                @csrf
                    <button type="submit" class="btn btn-warning"><i class="fa fa-info mr-1"></i>Verifikasi Barang Telah Diterima</button>
                </form>
			@endif

        </div>
    </div>
    
</div>

@endsection