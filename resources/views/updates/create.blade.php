@extends('layouts/sidebar')

@section('title')
<title>Libeli - Create News</title>
@endsection

@section('content')
<div class="container">
		<div class="row">
			<div class="col-10">
				<h1 class="mt-3">Tambah Data News</h1>
                
                <form method="post" action="/updates" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="sumber">Sumber</label>
                        <input type="text" class="form-control" id="sumber" placeholder="sumber" name="sumber">
                    </div>
                    <div class="form-group">
                        <label for="photo">Foto Berita</label>
                        <input type="file" class="form-control" id="photo" placeholder="photo" name="photo" style="height:45px;">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea type="text" class="form-control" id="content" placeholder="content" name="content" style="height:100px;"></textarea>
                        <!-- <input type="text" class="form-control" id="content" placeholder="" name="content" style=""> -->
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
				
		
			</div>
		</div>
	</div>
@endsection