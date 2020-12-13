<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Chat;

class ChatsController extends Controller
{
    public function index()
    {
        $users = User::all();
        $user1 = User::where('id', Auth::user()->id)->first();
        return view('chat/index', compact('users', 'user1'));
    }
    
    public function show($id)
    {
        $users = User::all();
        $user1 = User::where('id', Auth::user()->id)->first();
        $user2 = User::where('id', $id)->first();

        $chats = Chat::where('user1_id', $user1->id)->where('user2_id', $user2->id)->get();

        return view('chat/show', compact('users', 'user1', 'user2', 'chats'));
    }
    
    public function send(Request $request, $id)
    {
        $users = User::all();
        $user1 = User::where('id', Auth::user()->id)->first();
        $user2 = User::where('id', $id)->first();

        $chats = Chat::where('user1_id', $user1)->where('user2_id', $user2)->get();

        $chat = new Chat();
        $chat->user1_id = $user1->id;
        $chat->user2_id = $user2->id;
        $chat->status = 1;
        $chat->text = $request->text;

        $chat->save();       
        
        $chat = new Chat();
        $chat->user1_id = $user2->id;
        $chat->user2_id = $user1->id;
        $chat->status = 2;
        $chat->text = $request->text;

        $chat->save();

        return redirect()->back();
    }
}
