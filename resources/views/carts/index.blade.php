@extends('layouts/sidebar')

@section('title')
<title>Libeli - Carts</title>
@endsection

@section('content')
    <div class="container">
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td>Nama Produk</td>
                        <td>Harga</td>
                        <td>Jumlah</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carts as $cart)
                    <tr>
                        <td>{{ $cart->product_name }}</td>
                        <td>Rp {{ $cart->price }}</td>
                        <td>1</td>
                        <td>Rp {{ $cart->price*$cart->quantity }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection