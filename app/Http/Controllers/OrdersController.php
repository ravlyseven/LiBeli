<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Order;
use App\Order_Detail;
use UxWeb\SweetAlert\SweetAlert;



class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        if($orders != null)
        {
            $order_details = Order_Detail::where('order_id', $orders->id)->get();
            return view('orders/index', compact('orders', 'order_details'));
        }
        return view('orders/index', compact('orders'));
    }

    public function pesan(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();
        
        // cek ketersediaan jumlah stok
        if ($request->total_order > $product->stock) 
        {
            alert()->warning('Jumlah stok melebihi ketersediaan', 'Warning !!!');
            return redirect('products/'.$id);
        }

        // cek validasi
        $orders_check = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        if($orders_check == null) 
        {
            // simpan ke database orders
            $orders = new Order;
            $orders->user_id = Auth::user()->id;
            $orders->status = 0;
            $orders->total_price = 0;
            $orders->code = mt_rand(0, 999);
            $orders->save();
        }

        // simpan ke database order_details
        $new_orders = Order::where('user_id', Auth::user()->id)->where('status',0)->first();

        // cek order detail apa sudah ada
        $order_details_check = Order_Detail::where('product_id', $product->id)->where('order_id', $new_orders->id)->first();
        if($order_details_check == null)
        {
            $order_details = new Order_Detail;
            $order_details->product_id = $product->id;
            $order_details->order_id = $new_orders->id;
            $order_details->quantity = $request->total_order;
            $order_details->total_price = $product->price*$order_details->quantity;
            $order_details->save();
        }
        else
        {
            $order_details = Order_Detail::where('product_id', $product->id)->where('order_id', $new_orders->id)->first();

            $order_details->quantity = $order_details->quantity+$request->total_order;
            $order_details->total_price = $product->price*$order_details->quantity;
            $order_details->update();
        }

        // jumlah total harga
        $orders = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        $orders->total_price = $orders->total_price+$product->price*$request->total_order;
        $orders->update();


        return redirect()->back();
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

    public function checkout()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        $order->status = 1;
        $order->update();

        $order_details = Order_Detail::where('order_id', $order->id)->get();
        foreach ($order_details as $order_detail)
        {
            $product = Product::where('id', $order_detail->product_id)->first();
            $product->stock = $product->stock-$order_detail->quantity;
            $product->update();
        }

        return redirect('history');
    }
}
