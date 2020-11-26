@extends('layouts/sidebar')

@section('title')
<title>Create Products</title>
@endsection

@section('content')
<div class="container">
		<div class="row">
			<div class="col-10">
				<h1 class="mt-3">Tambah Data Products</h1>
                
                <form method="post" action="/products" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Produk</label>
                        <input type="text" class="form-control" id="name" placeholder="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="price">Harga Produk</label>
                        <input type="text" class="form-control" id="price" placeholder="price" name="price">
                    </div>
                    <div class="form-group">
                        <label for="photo">Foto Produk</label>
                        <input type="file" class="form-control" id="photo" placeholder="photo" name="photo" style="height:45px;">
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea type="text" class="form-control" id="description" placeholder="description" name="description" style="height:250px;"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
				
		
			</div>
		</div>
	</div>
@endsection