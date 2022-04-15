<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;
use App\Models\Orders;
use App\Models\User;
use DateTime;
use DateTimeZone;

class OrderController extends Controller
{
    public function viewCheckout() {
        if(!session('shipment_type')) {
            return redirect()->route('app.cart');
        }
        if(Auth::check()) {
            $items = json_decode(Auth::user()->cart);
        } else {
            $items = json_decode(session('cart'));
        }
        if(count($items) != 0) {
            $total = array_sum(array_map(function ($e) { return $e->price; }, $items));
            if(session('shipment_type') == 1) {
                $delivery_tax = Store::where('name', 'delivery_tax')->first()->value;
            } else {
                $delivery_tax = 0;
            }
            return view('pages.checkout', compact(['total', 'delivery_tax']));
        }
    }

    public function checkoutPost(OrderRequest $request) {
        if($request->validated()) {
            $sub_total = json_decode(session('cart'));
            $total = array_sum(array_map(function ($e) { return $e->price; }, $sub_total));
            $date = new DateTime("now", new DateTimeZone('Europe/Bucharest') );
            if(session('shipment_type') == 1) {
                $delivery = Store::where('name', 'delivery_tax')->first()->value;
                $order = new Orders;
                if(Auth::check()) {
                    $order->user_id = Auth::id();
                } else {
                    $order->user_id = 0;
                }
                $order->user_phone_number = $request->user_phone_number;
                $order->user_name = $request->user_name;
                $order->user_address = $request->user_address;
                $order->user_email = $request->user_email;
                $order->payment_type = $request->payment;
                if($request->notes == null) {
                    $order->notes = 'NULL';
                } else {
                    $order->notes = $request->notes;
                }
                $order->city = $request->city;
                $order->shipping_type = session('shipment_type');
                $order->sub_total = $total;
                $order->delivery_cost = $delivery;
                $order->placed_time = $date->format('Y-m-d H:i:s');
                $order->status = 1;
                $order->cart = session('cart');
                $order->save();
                event(new \App\Events\Orders("A aparut o noua comanda cu id-ul {$order->id}"));
                session()->forget(['cart', 'shipment_type']);
                session(['cart' => '[]']);
                if(Auth::check()) {
                    $user = User::where('id', Auth::id())->first();
                    $user->cart = '[]';
                    $user->save();
                }
                if(session('orders')) {
                    $orders = json_decode(session('orders'));
                    array_push($orders, $order->id);
                    session(['orders' => json_encode($orders)]);
                } else {
                    session(['orders' => json_encode([$order->id])]);
                }
                return redirect()->route('app.order', ['id' => $order->id]);
            } else {
                $order = new Orders;
                if(Auth::check()) {
                    $order->user_id = Auth::id();
                } else {
                    $order->user_id = 0;
                }
                $order->user_phone_number = $request->user_phone_number;
                $order->user_name = $request->user_name;
                $order->user_email = $request->user_email;
                $order->payment_type = $request->payment;
                $order->shipping_type = session('shipment_type');
                $order->sub_total = $total;
                $order->delivery_cost = 0;
                $order->placed_time = $date->format('Y-m-d H:i:s');
                $order->status = 1;
                $order->cart = session('cart');
                $order->save();
                event(new \App\Events\Orders("A aparut o noua comanda cu id-ul {$order->id}"));
                session()->forget(['cart', 'shipment_type']);
                session(['cart' => '[]']);
                if(session('orders')) {
                    $orders = json_decode(session('orders'));
                    array_push($orders, $order->id);
                    session(['orders' => json_encode($orders)]);
                } else {
                    session(['orders' => json_encode([$order->id])]);
                }
                return redirect()->route('app.order', ['id' => $order->id]);
            }
        }
        return redirect()->back();
    }

    public function cartPost(Request $request) {
        session(['shipment_type' => $request->shipment]);
        return redirect()->route('app.cart.checkout');
    }

    public function viewOrder($id) {
        $orders = json_decode(session('orders'));
//        return dd($orders);
        if(in_array($id, $orders)) {
            $order = Orders::where('id', $id)->firstOrFail();
            return view('pages.view_order', compact('order'));
        } else {
            return redirect()->route('app.home');
        }
    }

    public static function getSessionOrders() {
        $sessionOrders = json_decode(session('orders'));
        $orders = array();
        foreach($sessionOrders as $key => $sessionOrder) {
            $order = Orders::where('id', $sessionOrders[$key])->first();
            $orders[$key] = $order;
        }
        return $orders;
    }

    public function viewSessionOrders() {
        return dd($this->getSessionOrders());
    }
}
