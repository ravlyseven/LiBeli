<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Order;
use App\Order_Detail;

class HistoryController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();
        return view('history/index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where('id', $id)->first();
        $order_details = Order_Detail::where('order_id', $order->id)->get();

        return view('history/show', compact('order', 'order_details'));
    }

    public function delete($id)
    {
        $order = Order::where('id', $id)->first();
        $order_detail = Order_Detail::where('order_id', $order->id)->first();

        $order->delete();
        $order_detail->delete();
        return redirect('history');
    }
}
