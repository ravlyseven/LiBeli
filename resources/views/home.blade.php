@extends('layouts/sidebar')

@section('title')
<title>Selamat Datang di LiBeli</title>
@endsection

@section('content')
    <a href="{{ url('products') }}" class="btn btn-primary ml-3">Lihat Produk Kami</a>
@endsection

