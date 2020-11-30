<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsersController extends Controller
{
    public function show()
    {
        return view('/profiles/index');
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::findOrFail($id);
        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $data->save();
        return back();
    }

    public function update_password(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::findOrFail($id);
        $data->password = bcrypt($request->get('password'));
        $data->save();
        return back();
    }
}
