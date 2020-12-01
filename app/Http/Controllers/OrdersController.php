<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Order;
use App\Order_Detail;



class OrdersController extends Controller
{
    public function index()
    {
        
        $orders = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        $order_details = Order_Detail::where('order_id', $orders->id)->get();
        return view('orders/index', compact('orders', 'order_details'));
    }

    public function pesan(Request $request, $id)
    {
        $products = Product::where('id', $id)->first();
        
        // cek validasi
        $orders_check = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        if($orders_check == null) 
        {
            // simpan ke database orders
            $orders = new Order;
            $orders->user_id = Auth::user()->id;
            $orders->status = 0;
            $orders->total_price = 0;
            $orders->save();
        }

        

        // simpan ke database order_details
        $new_orders = Order::where('user_id', Auth::user()->id)->where('status',0)->first();

        // cek order detail apa sudah ada
        $order_details_check = Order_Detail::where('product_id', $products->id)->where('order_id', $new_orders->id)->first();
        if($order_details_check == null)
        {
            $order_details = new Order_Detail;
            $order_details->product_id = $products->id;
            $order_details->order_id = $new_orders->id;
            $order_details->quantity = $request->total_order;
            $order_details->total_price = $products->price*$order_details->quantity;
            $order_details->save();
        }
        else
        {
            $order_details = Order_Detail::where('product_id', $products->id)->where('order_id', $new_orders->id)->first();

            $order_details->quantity = $order_details->quantity+$request->total_order;
            $order_details->total_price = $products->price*$order_details->quantity;
            $order_details->update();
        }

        // jumlah total harga
        $orders = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        $orders->total_price = $orders->total_price+$products->price*$request->total_order;
        $orders->update();


        return redirect('orders');
    }
    
    public function delete($id)
    {
        $order_detail = Order_Detail::where('id', $id)->first();
        $order = Order::where('id', $order_detail->order_id)->first();

        $order->total_price = $order->total_price-$order_detail->total_price;
        $order->update();

        $order_detail->delete();
        return redirect('orders');
    }
}
