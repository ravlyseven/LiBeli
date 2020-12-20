@extends('layouts/sidebar')

@section('title')
<title>Libeli - Events</title>
@endsection

@section('content')

    @if(\Auth::user()->hasAnyRole('admin'))
    <a href="events/create"class="btn btn-primary ml-3 mb-3">Tambah Data</a>
    @endif
    
    @foreach($events as $event)
        <div class="container">
            <div class="row">
                <div class="card mb-3" style="width: 100rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$event->title}}</h5>
                        <p class="card-text">{!! Str::words($event->content) !!}
                        <a href="events/{{ $event->id }}">selengkapnya</a></p>

                        @if(\Auth::user()->hasAnyRole('admin'))
                        <a class="btn btn-primary" href="events/{{ $event->id }}/edit" class="card-link">Ubah</a>
                        <!-- <form action="{{ route('events.destroy',$event->id) }}" method="post" class="d-inline"> -->
                        <form action="events/{{ $event->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
