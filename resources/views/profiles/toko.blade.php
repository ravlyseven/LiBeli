@extends('layouts/sidebar')

@section('title')
<title>Libeli - Toko</title>
@endsection

@section('content')
    <div class="row ml-3 mr-3">
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Informasi Toko</h5>
                    <div class="position-relative form-group">
                        <div class="h5 mb-1 text-s font-weight-bold text-primary">Nama : {{$toko->name}}</div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    <div class="row ml-3 mr-3">
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
                                <a href="/products/{{ $product->id }}">
                                <div class="h5 mb-1 text-s font-weight-bold text-primary">{{$product->name}}</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800" align="left">Rp. {{ number_format($product->price) }}</div>
                                </a>

                                @if(\Auth::user()->hasAnyRole('penjual'))
                                <a class="btn btn-primary" href="products/{{ $product->id }}/edit" class="card-link">Ubah</a>
                                <form action="products/{{ $product->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
    </div>

@endsection