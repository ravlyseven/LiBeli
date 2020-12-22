@extends('layouts/sidebar')

@section('title')
<title>Libeli - Update News</title>
@endsection

@section('content')
<div class="container">
		<div class="row">
			<div class="col-10">
				<h1 class="mt-3">Update Data News</h1>
                
                <form method="post" action="/updates/{{ $update->id }}" enctype="multipart/form-data">
                @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" value="{{$update->title}}" name="title">
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
                        <textarea type="text" class="form-control" id="content" value="" name="content" style="height:100px;">{{$update->content}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </form>
				
		
			</div>
		</div>
	</div>
@endsection