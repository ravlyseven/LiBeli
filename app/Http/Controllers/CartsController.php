<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Cart;

class CartsController extends Controller
{
    public function index()
    {
        $carts = Cart::all();
        return view('carts/index', compact('carts'));
    }
}
