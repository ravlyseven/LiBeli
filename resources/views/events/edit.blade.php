@extends('layouts/sidebar')

@section('title')
<title>Update Events</title>
@endsection

@section('content')
<div class="container">
		<div class="row">
			<div class="col-10">
				<h1 class="mt-3">Update Data Events</h1>
                
                <form method="post" action="/events/{{ $event->id }}">
                @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" value="{{$event->title}}" name="title">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea type="text" class="form-control" id="content" value="" name="content" style="height:250px;">{{$event->content}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </form>
				
		
			</div>
		</div>
	</div>
@endsection