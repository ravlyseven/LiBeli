@extends('layouts/sidebar')

@section('title')
<title>LiBeli - Bukti Pembayaran</title>
@endsection

@section('content')
<div class="container">
		<div class="row">
			<div class="col-10">
				<h1 class="mt-3">Bukti Pembayaran</h1>

                <div class="col-lg-6 d-none d-lg-block bg-dark mb-3">
                    <img class="rounded mx-auto d-block mt-4" style="height:80%; width:90%" src="{{ asset('storage/'.$order->photo) }}" alt="Upload Bukti Transfer">
                </div>
                
                @if(\Auth::user()->hasAnyRole('penjual'))
                @elseif(\Auth::user()->hasAnyRole('admin'))
                @else
                <form method="post" action="{{ url('history') }}/{{ $order->id }}" enctype="multipart/form-data" class="d-inline">
                    @csrf
                    <div class="form-group">
                        <label for="photo">Upload Bukti Pembayaran</label>
                        <input type="file" class="form-control" id="photo" placeholder="photo" name="photo" style="height:45px;">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Selesai</button>
                </form>
				@endif

                <a class="btn btn-warning" href="{{ url('history') }}/{{ $order->id }}">Kembali</a>

                @if(\Auth::user()->hasAnyRole('penjual'))
                    @if($order->status == 2)
                        <form action="{{ url('history') }}/{{ $order->id }}/{{ 'verifikasi-pembayaran' }}" method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-primary"><i class="fa fa-info mr-1"></i>Verifikasi Pembayaran</button>
                        </form>
                    @endif  
                @endif
		
			</div>
		</div>
	</div>
@endsection