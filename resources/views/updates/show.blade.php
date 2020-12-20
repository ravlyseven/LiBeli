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
                    <h1 class="h3 font-weight-bold text-gray-900 mb-2">{{$update->title}}</h1>
                    <p>Sumber : {{$update->sumber}}</p>
                    <hr>
                    <p class="mb-4">{{$update->content}}</p>
                    <hr>
                    <a class="btn btn-primary" href="{{ url('updates') }}">Kembali</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>

</body>
@endsection