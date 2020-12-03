@extends('layouts/sidebar')

@section('title')
<title>Libeli - Products</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
        
            <!-- Tampilan Produk -->
            @foreach($products as $product)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <img class="img-thumbnail" src="{{ asset('storage/'.$product->photo) }}">
                            </div>
                            <div class="col mr-2">
                                <a href="products/{{ $product->id }}">
                                <div class="h5 mb-1 text-s font-weight-bold text-primary">{{$product->name}}</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800" align="left">Rp. {{ number_format($product->price) }}</div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

