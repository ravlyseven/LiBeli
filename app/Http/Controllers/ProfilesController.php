<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Product;

class ProfilesController extends Controller
{
    public function toko($id)
    {
        $toko = User::where('id', $id)->first();
        $products = Product::where('user_id', $id)->get();

        return view('profiles/toko', compact('toko', 'products'));
    }
}
