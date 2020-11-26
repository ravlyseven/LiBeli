@extends('layouts/sidebar')

@section('title')
<title>Update Updates</title>
@endsection

@section('content')
<div class="container">
		<div class="row">
			<div class="col-10">
				<h1 class="mt-3">Update Data Updates</h1>
                
                <form method="post" action="/updates/{{ $update->id }}">
                @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" value="{{$update->title}}" name="title">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea type="text" class="form-control" id="content" value="" name="content" style="height:250px;">{{$update->content}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </form>
				
		
			</div>
		</div>
	</div>
@endsection