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
                <div class="card-header bg-dark text-light border border-light">{{ $user2->name }}</div>

                <div class="card-body bg-dark text-light border border-light" style="height: 350px; overflow: auto;">
                
                @foreach($chats as $chat)
                    @if($chat->status == 1)
                    <div class="header my-2 text-right">
                        <strong>{{ $user1->name }}</strong>
                    </div>
                    <div style="background-color: #099; padding: 10px; border-bottom-left-radius: 24px; border-bottom-right-radius: 24px; border-top-left-radius: 24px;">
                        {{ $chat->text }}
                        <div class="float-right ml-5">{{ $chat->created_at }}</div>
                    </div>

                    @elseif($chat->status == 2)
                    <div class="header my-2">
                        <strong>{{ $user2->name }}</strong>
                    </div>
                    <div style="background-color: #012; padding: 10px; border-bottom-left-radius: 24px; border-bottom-right-radius: 24px; border-top-right-radius: 24px;">
                        {{ $chat->text }}
                        <div class="float-right ml-5">{{ $chat->created_at }}</div>
                    </div>
                    @endif
                @endforeach

                </div>

                <div class="card-footer bg-dark text-light border border-light">
                    <form method="post" action="{{ url('chats') }}/{{ $user2->id }}">
                    @csrf
                        <div class="input-group">
                            <input type="text" name="text" class="form-control mr-1" placeholder="Ketik disini...">
                            <button class="btn btn-warning">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection