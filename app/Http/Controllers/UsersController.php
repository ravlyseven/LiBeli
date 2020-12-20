<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use UxWeb\SweetAlert\SweetAlert;

class UsersController extends Controller
{
    public function show()
    {
        return view('/profiles/index');
    }

    public function update(Request $request)
    {
        $users = User::all();
        foreach($users as $user)
        {
            if($user->id != Auth::user()->id)
            {
                if($request->email == $user->email)
                {
                    alert()->warning('Email telah digunakan pengguna lain', 'Warning !!!');
                    return back();
                }
            }
        }
        
        if($request->name == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return back();
        }
        elseif($request->email == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return back();
        }
        elseif($request->phone == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return back();
        }
        elseif($request->kecamatan == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return back();
        }
        elseif($request->address == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return back();
        }
        elseif($request->gender == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return back();
        }


        $id = Auth::user()->id;
        $data = User::findOrFail($id);
        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $data->phone = $request->get('phone');
        $data->kecamatan = $request->get('kecamatan');
        $data->address = $request->get('address');
        $data->gender = $request->get('gender');
        $data->save();

        alert()->success('Data Berhasil Diperbarui', 'Sukses');
        return back();
    }

    public function update_password(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::findOrFail($id);
        $data->password = bcrypt($request->get('password'));
        $data->save();

        alert()->success('Password Berhasil Diperbarui', 'Sukses');
        return back();
    }
}
