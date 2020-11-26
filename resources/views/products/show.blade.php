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
                <img class="rounded mx-auto d-block mt-4" style="height:80%; width:90%" src="{{ asset('images/'.$product->photo) }}">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h3 font-weight-bold text-gray-900 mb-2">{{$product->name}}</h1>
                    <h1 class="h4 mb-0 font-weight-bold text-gray-800">Rp. {!! Str::words($product->price) !!}</h1>
                    <hr>
                    <h1 class="h4 mb-0 font-weight-bold text-gray-800">Deskripsi Produk</h1>
                    <p class="mb-4">{{$product->description}}</p>
                    <hr>
                    <a class="btn btn-warning" href="">Tambah Ke Keranjang</a>
                    <a class="btn btn-primary" href="{{ url('products') }}">Kembali</a>
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