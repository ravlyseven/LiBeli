@extends('layouts/sidebar')

@section('title')
<title>Libeli - Chat</title>
@endsection

@section('content')

<div id="wrapper">
    
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark">
        <div class="sidebar-brand-text text-white mx-3 my-2">Chat Dengan</div>
        @foreach($users as $user)
            @if($user1->id != $user->id)
                <hr class="sidebar-divider my-2">
                <div class="sidebar-brand-text mx-3">
                    <a class="text-light" href="{{ url('chats') }}/{{ $user->id }}">{{ $user->name }}</a>
                </div>
            @endif
        @endforeach
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
    
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header bg-dark text-light border border-light">Chat Box</div>

                <div class="card-body bg-dark text-light border border-light" style="height: 350px; overflow: auto;">
                    <div class="header my-2">
                        <strong>LiBeli</strong>
                    </div>
                    <div style="background-color: #099; padding: 10px; border-bottom-left-radius: 24px; border-bottom-right-radius: 24px; border-top-right-radius: 24px;">
                        Selamat Datang di Fitur Chat LiBeli
                        <div class="float-right ml-3">07.00</div>
                    </div>

                    <div class="header my-2">
                        <strong>LiBeli</strong>
                    </div>
                    <div style="background-color: #099; padding: 10px; border-bottom-left-radius: 24px; border-bottom-right-radius: 24px; border-top-right-radius: 24px;">
                        <-- Pilih lawan bicara kamu
                        <div class="float-right ml-3">07.00</div>
                    </div>

                    

                </div>

                <div class="card-footer bg-dark text-light border border-light">
                    <div class="input-group">
                        <input type="" class="form-control mr-1" placeholder="Ketik disini...">
                        <button class="btn btn-warning">Kirim</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection