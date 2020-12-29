@extends('layouts/sidebar')

@section('title')
<title>Show Product</title>
@endsection

@section('content')
<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-dark">
                <img class="rounded mx-4 my-4" style="width:90%" src="{{ asset('storage/'.$product->photo) }}">
                <div class="card-body">
                  <h5 class="card-title text-light">Informasi Toko</h5>
                  <div class="position-relative form-group">
                    <div class="h5 mb-1 text-s font-weight-bold text-light">Nama Toko : 
                      <a href="{{ url('profile') }}/{{ $product->user_id }}" class="h5 mb-1 text-s font-weight-bold text-light">
                      {{$product->user->name}}</a>
                    </div>
                    
                    <p class="text-warning">note : sementara pengiriman hanya berlaku untuk area terdekat max 5km</p>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h3 font-weight-bold text-gray-900 mb-2">{{$product->name}}</h1>
                    <h1 class="h4 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($product->price) }}</h1>
                    <h1 class="h4 mb-0 font-weight-bold text-gray-800">Stok : {{ $product->stock }}</h1>
                    <h1 class="h4 mb-0 font-weight-bold text-gray-800">Berat : {{ $product->weight }} gram</h1>
                    <hr>
                    <h1 class="h4 mb-0 font-weight-bold text-gray-800">Deskripsi Produk</h1>
                    <p class="mb-4">{{$product->description}}</p>
                    <hr>
                    <p>Masukkan Jumlah Pesanan :</p>
                    <form action="{{ url('orders') }}/{{ $product->id }}" method="post" class="d-inline">
                      @csrf
                      <input type="number" name="total_order" class="form-control mb-3">
                      <button type="submit" class="btn btn-warning">
                      <i class="fa fa-shopping-cart"></i>Tambah Ke Keranjang</button>
                    </form>

                    @guest
                      <a class="btn btn-primary" href="{{ url('home') }}">Kembali</a>
                    @else
                      @if(\Auth::user()->hasAnyRole('penjual'))
                      <a class="btn btn-primary" href="{{ url('products') }}">Kembali</a>
                      @else
                      <a class="btn btn-primary" href="{{ url('home') }}">Kembali</a>
                      @endif
                    @endguest
                    
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</body>
@endsection