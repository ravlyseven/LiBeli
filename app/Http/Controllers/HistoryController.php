<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Order;
use App\Order_Detail;
use App\Role_User;
use Illuminate\Support\Facades\Storage;

class HistoryController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();
        
        $role_users = Role_User::where('user_id', Auth::user()->id)->get();
        
        if ($role_users != null)
        {
            foreach ($role_users as $role_user) 
            {
                if ($role_user->role_id == 2)
                {
                    $orders = Order::where('seller_id', Auth::user()->id)->where('status', '!=', 0)->get();
                }
            }
        }
        
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
    
    public function info($id)
    {
        $order = Order::where('id', $id)->first();
        return view ('history/edit', compact('order'));
    }
    
    
    public function update(Request $request, $id)
    {
        $order = Order::where('id', $id)->first();
        $order_details = Order_Detail::where('order_id', $order->id)->get();

        if($request->hasFile('photo'))
        {
            $this->validate($request, ['photo' => 'required|image|mimes:jpeg,jpg,png,gif']);
            if ($order->photo && file_exists(storage_path('app/public/'.$order->photo))) {
                Storage::delete('public', $order->photo);
            }
            $photo = $request->file('photo')->store('orders', 'public');
            $order->photo = $photo;
            $order->status = 2;
        }
        $order->update();
        return view('history/show', compact('order', 'order_details'));
    }

    public function verifikasi(Request $request, $id)
    {
        $order = Order::where('id', $id)->first();
        $order_details = Order_Detail::where('order_id', $order->id)->get();
        $order->status = 3;
        $order->update();
        return view('history/show', compact('order', 'order_details'));
    }
    
    public function pengiriman(Request $request, $id)
    {
        $order = Order::where('id', $id)->first();
        $order_details = Order_Detail::where('order_id', $order->id)->get();
        $order->status = 4;
        $order->update();
        return view('history/show', compact('order', 'order_details'));
    }
    
    public function selesai(Request $request, $id)
    {
        $order = Order::where('id', $id)->first();
        $order_details = Order_Detail::where('order_id', $order->id)->get();
        $order->status = 5;
        $order->update();
        return view('history/show', compact('order', 'order_details'));
    }
}
