<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\User;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $products = Product::all();
        return view('home', ['products' => $products]);
    }
     
    public function dashboard()
    {
        $users = User::all();
        return view('dashboard', compact('users'));
    }
}
