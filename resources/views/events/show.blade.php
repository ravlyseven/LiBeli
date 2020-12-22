@extends('layouts/sidebar')

@section('title')
<title>Show Events</title>
@endsection

@section('content')
<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="row">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h3 font-weight-bold text-gray-900 mb-2">{{$event->title}}</h1>
                    <hr>
                    <p class="mb-4">{{$event->penyelenggara}}</p>
                    <a href="{{ $event->link }}">{{ $event->link }}</a>
                    <hr>
                    <img class="img-thumbnail" src="{{ asset('storage/'.$event->photo) }}">
                    <hr>
                    <p class="mb-4">{{$event->content}}</p>
                    <hr>
                    <a class="btn btn-primary" href="{{ url('events') }}">Kembali</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>

</body>
@endsection